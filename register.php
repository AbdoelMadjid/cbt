<?php
include('db2.php');
if(isset($_POST['sub'])){
    if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['password_again'])){
        echo "please fill in the form completely";
    }
    else{
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = $_POST['password'];
        $password_again = $_POST['password_again'];
        if($password != $password_again){
            echo "<div class='btn btn-danger'>Password not Match</div>";
        }
        else{
            $pass_hash = md5(mysqli_real_escape_string($conn,$_POST['password']));
            $query = "SELECT * FROM `user` WHERE username = '$username'";
            $sql_run = mysqli_query($conn,$query);
            if(mysqli_num_rows($sql_run)>0){
                echo 'Username Exist';
            }
            else{
                $query ="INSERT INTO user (username,password) VALUES ('$username','$pass_hash')";
                if(mysqli_query($conn,$query)){
                echo 'Testing complete';
                    header('Location:login2.php'); 
                }
                else{
                    echo 'error';
                }
            }
        }
        
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Exam</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        body,html{margin:0;padding:0px;font-family:segoe ui;background:#dd4c4c}
        #nav{background-color:white;height:60px;display:block;line-height:60px;margin:0;padding:0;width:100%;box-shadow:0px 2px 5px 0px rgba(0,0,0,0.09)}
        #nav a{text-decoration:none;color:white;color:#dd4c4c;}
        #nav .menu{float:left;margin-left:.5em;font-size:40px;font-weight:bold}
        #nav p{float:right;padding:0.75em 2.5em;margin:15px;font-size:14px;font-weight:100;border:solid #dd4c4c 1px; border-radius:100px;
                margin-right:2em;margin-bottom:3px;line-height:14px;}
        #bdy{background-color:#dd4c4c;height:100vh;padding:0;margin:0;text-align:center;color:white}
        #bdy h1{clear:both;margin-top:10;padding:2.25em 0 0 0;box-shadow:0px 2px 5px 0px rgba(0,0,0,0.09);}
        #bdy a{background-color:white;}
        #bdy a p{background-color:white;width:180px;margin:auto;border-radius:100px;padding:0.75em 0;}
        .bdy_btn{text-decoration:none;color:#dd4c4c;border-radius:5px;border:none;height:30}
        
    </style>

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Register an account</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div> 
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password Again" name="password_again" type="password" value="">
                                </div>
                               
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="sub" class="btn btn-lg btn-success btn-block" style="background:#dd4c4c;border:none" value="Register">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>
