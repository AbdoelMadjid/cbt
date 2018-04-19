<?php session_start();
include('db2.php');
echo $year = $_SESSION['year'];
$sql_num = "SELECT * FROM `section`";
$result_num = mysqli_query($conn,$sql_num);
$rows_num = mysqli_fetch_assoc($result_num);
$i = $rows_num['num'];
$z=0;

if(isset($_POST['opt'])){
    $times = $_POST["times"];
     $sqli ="UPDATE `timer` SET `time` = $times WHERE `timer`.`id` = 1";
    mysqli_query($conn,$sqli);
    $i = $_POST['opt'];
    echo $i;
    $ins ="UPDATE `section` SET num = '$i'";
    mysqli_query($conn,$ins);
}
if(isset($_POST['nxt'])){
    $times = $_POST["times"];
     $sqli ="UPDATE `timer` SET `time` = $times WHERE `timer`.`id` = 1";
    mysqli_query($conn,$sqli);
    $i += 1;
    echo $i;
    if($i>100){header("Location:submit.php");}    
    else if($i<100){
    $ins ="UPDATE `section` SET num = '$i'";
    mysqli_query($conn,$ins);    
    $ans ="SELECT * FROM `ans`";
    mysqli_query($conn,$ans);
    
    //$ans_sql = "INSERT INTO ans (ans_opt,mark) VALUES('$anss',1)";
        if(!empty($_POST['option'])){
            $anss = $_POST['option'];
        //echo $anss;
        $x = $i-1;
        //check ans
        $sql = "SELECT * FROM `$year` WHERE id=$x";
        $result = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_assoc($result);
        if($rows['ans']==$anss){
            $y = 1;}
        else{$y=0;}
        //update ans
      $ans_sql=  "UPDATE `ans` SET `ans_opt`= '$anss', `mark` = '$y' WHERE `ans`.`ans_id` = '$x'";
   if(mysqli_query($conn,$ans_sql)){
       echo 'amen';
   };}
    }
}
if(isset($_POST['pre'])){
    $times = $_POST["times"];
     $sqli ="UPDATE `timer` SET `time` = $times WHERE `timer`.`id` = 1";
    mysqli_query($conn,$sqli);
    $i -= 1;
    echo $i;
    if($i<=0){header("Location:que.php");}    
    else if($i<100){
    $ins ="UPDATE `section` SET num = '$i'";
    mysqli_query($conn,$ins);    
    $ans ="SELECT * FROM `ans`";
    mysqli_query($conn,$ans);
    }
}?>
<html>
<head>
  <title>Exam</title> 
    <link href="css/index.css" rel="stylesheet">
    <style>
        #time{float:right;margin-right:90px;}
        #sub{margin-right:25%;float:left;}
        #sub button{margin-left:10px;border-radius:2px;width:150px;height:30px;color:white;padding:10px;cursor:pointer;background-color:#dd4c4c;text-align:center;font-weight:bold;border:none;}
        #time{color:#dd4c4c;font-size:50px;width:auto}
        #me{color:green;}
    </style>
</head>

    
<body>
   <div id="main">
        <div id="nav">
            <!--countdown-->
            <div id="time"></div> 
            
            <div id="sub">
            <button>Use of English</button>
            <button>Biology</button>
            <button>Physics</button>
            <button>Mathematics</button></div>
       </div>
       <div id="bdy">
           <p><?php $sql = "SELECT * FROM `$year` WHERE id=$i";
        $result = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_assoc($result);
            $sql_a = "SELECT * FROM `ans` WHERE ans_id=$i";
            $result_a = mysqli_query($conn,$sql_a);
            $rows_a = mysqli_fetch_assoc($result_a);
            $final = $rows_a['ans_opt'];
                echo $rows['quest'].'<br>';
                if(($rows['q_img'])==''){
                    echo '';
                }else{
                    echo '<img src="images/'.$rows['q_img'].'"><br>';
                }
               echo'
                 
                 <form method="post" action="que.php" style="padding-left:20px;">
                           <input type="radio" name="option" value="'.$rows['opt1'].'"';if($rows['opt1']==$final){echo 'checked'; $z=1;}echo'>'.$rows['opt1'].'<br><br>
                           <input type="radio" name="option" value="'.$rows['opt2'].'"';if($rows['opt2']==$final){echo 'checked';$z=1;}echo'>'.$rows['opt2'].'<br><br>
                           <input type="radio" name="option" value="'.$rows['opt3'].'"';if($rows['opt3']==$final){echo 'checked';$z=1;}echo'>'.$rows['opt3'].'<br><br>
                           <input type="radio" name="option" value="'.$rows['opt4'].'"';if($rows['opt4']==$final){echo 'checked';$z=1;}echo'>'.$rows['opt4'].'<br><br>
                           <input type="text"  id="times" hidden="hidden" name="times">
                            <input type="submit" name="pre" value="Previous"';if($i<=1){echo 'disabled';}echo'><input type="submit" name="nxt" value="Next">
                       </form>
                         ';?></p>
           
           <?php $sql_opt = "SELECT * FROM `$year`";
            $result_opt = mysqli_query($conn,$sql_opt);
           
            echo '<form method="post" action="que.php" id="opt">
            <input type="text" hidden="hidden"  id="times2" name="times">';
                while($rowsd = mysqli_fetch_assoc($result_opt)){
                        $w = $rowsd['id'];
                    
                     $sql_a = "SELECT * FROM `ans` WHERE ans_id=$w";
                    $result_a = mysqli_query($conn,$sql_a);
                    $rows_a = mysqli_fetch_assoc($result_a);
                    
                    echo'
                <input type="submit" name="opt" value="'.$rowsd['id'].'"';if($rows_a['mark']!=NULL){echo 'id="me"';} echo'>';
                }echo '</form>';
           ?>
                   <div id="final">Submit</div>
                   <div id="popy">
                    <div id='pop'>
                    <span id='spp'>CLOSE</span>    
                    <div id='asp'><p>Are you sure you want to submit?</p>
                        <a href="submit.php" ><p id="yes">Yes</p></a><br>
                        <a><p id="no">NO</p></a>
                        </div>
                </div>
                </div>
       </div>
    
    
    
    </div> 
    <?php include('timer.php')?>
   <script src=js/jquery.min.js></script>
   <script src=js/jquery_ui.min.js></script>
    <script src=js/js.js></script>
    
   
    
    
</body>
</html>