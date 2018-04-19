<?php session_start();
include('db2.php');
  if(isset($_POST['ent'])){
      $year= $_SESSION['year'] = $_POST['year'];
      $sql_del = "TRUNCATE `ans`";
      mysqli_query($conn,$sql_del);
      $sql_fnd = "SELECT * FROM `$year`";
      $result = mysqli_query($conn,$sql_fnd);
      
        while(mysqli_fetch_assoc($result)){
         $sql_add ="INSERT INTO `ans` (`ans_id`, `ans_opt`, `mark`) VALUES (NULL, NULL, NULL)";
            mysqli_query($conn,$sql_add);
         $ins ="UPDATE `section` SET num = 1";
            mysqli_query($conn,$ins);
        $sqli ="UPDATE `timer` SET `time` = 3600 WHERE `timer`.`id` = 1";
           mysqli_query($conn,$sqli);
            
        }
        header("Location:que.php");
        
  }

?>

<html>
<head>
  <title>Exam</title> 

    <style>
        body,html{margin:0;padding:0px;font-family:segoe ui}
        #nav{background-color:white;height:60px;display:block;line-height:60px;margin:0;padding:0;width:100%;box-shadow:0px 2px 5px 0px rgba(0,0,0,0.09)}
        #nav a{text-decoration:none;color:white;color:#dd4c4c;}
        #nav .menu{float:left;margin-left:.5em;font-size:40px;font-weight:bold}
        #nav p{float:right;padding:0.75em 2.5em;margin:15px;font-size:14px;font-weight:100;border:solid #dd4c4c 1px; border-radius:100px;
                margin-right:2em;margin-bottom:3px;line-height:14px;}
        #bdy{background-color:#dd4c4c;height:100vh;padding:0;margin:0;text-align:center;color:white}
        #bdy h1{clear:both;margin-top:10;padding:2.25em 0 0 0;box-shadow:0px 2px 5px 0px rgba(0,0,0,0.09);}
        #bdy a{background-color:white;}
        #bdy a p{background-color:white;width:180px;margin:auto;border-radius:100px;padding:0.75em 0;}
        .bdy_btn{text-decoration:none;color:#dd4c4c;}
        input[type=submit]{color:#dd4c4c;background-color:white;width:180px;margin:auto;border-radius:100px;padding:0.75em 0;border:none;outline-style:none;cursor:pointer;}
        
    </style>
</head>

    
<body>
   <div id="main">
        <div id="nav">
            <a class="menu" href="#">&#8801</a>
            <a class="cnt" href="#"><p>Register</p></a>
       </div>
       <div id="bdy">
           <h1>Life like a rainbow always beautiful from angle</h1>
           <p>Only the pure in heart can see the light</p>
            <form method="post" action="index.php">
                <select name="year" >
                    <option name="2010" selected>2011</option>    
                    <option name="2011">2010</option>    
                    <option name="2011">2009</option>    
                    <option name="2011">2008</option>    
                    <option name="2011">2007</option>    
                </select>
                <input type="submit" class="bdy_btn" name="ent" value="Enter">
           </form>
           
       </div>
    
    
    
    </div> 
    
</body>
</html>