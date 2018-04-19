<?php
session_start();
include('db2.php');
echo $year = $_SESSION['quest'];
$sql_num = "SELECT * FROM `section`";
$result_num = mysqli_query($conn,$sql_num);
$rows_num = mysqli_fetch_assoc($result_num);
$i = $rows_num['num'];
$z=0;
include('db2.php');
$sum = "SELECT SUM(`mark`) AS value_sum FROM ans";
$summ = mysqli_query($conn,$sum);
$row_sum = mysqli_fetch_assoc($summ);


$ans ="SELECT * FROM `ans`";
$result_num = mysqli_query($conn,$ans);
$num = $rows_num = mysqli_fetch_all($result_num);
$read = count($num);


if(isset($_POST['opt'])){
    $i = $_POST['opt'];
    //echo $i;
    $ins ="UPDATE `section` SET num = '$i'";
    mysqli_query($conn,$ins);
}

if(isset($_POST['sub'])){
    $i += 1;
    if($i>100){header("Location:submit.php");}    
    else if($i<100){
    $ins ="UPDATE `section` SET num = '$i'";
    mysqli_query($conn,$ins);    
    }
}?>

<html>
<head>
  <title>Exam</title> 
    <link href="css/index.css" rel="stylesheet">
</head>

    
<body>
   <div id="main">
        <div id="nav">
            <a class="menu" href="#"><?php echo 'Score: '.$row_sum['value_sum'].'/'.$read;?></a>
       </div>
       <div id="bdy">
           <p><?php $sql = "SELECT * FROM `$year` WHERE id=$i";
        $result = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_assoc($result);
            $sql_a = "SELECT * FROM `ans` WHERE ans_id=$i";
            $result_a = mysqli_query($conn,$sql_a);
            $rows_a = mysqli_fetch_assoc($result_a);
            $final = $rows['ans'];
            $finaly = $rows_a['ans_opt'];
               echo $rows['quest'].'<br>';
                if(($rows['q_img'])==''){
                    echo '';
                }else{
                    echo '<img src="images/'.$rows['q_img'].'"><br>';
                }
               echo'
                 <form method="post" action="answer.php" style="padding-left:20px;">
                           <input type="radio" name="option" disabled value="'.$rows['opt1'].'"';if($rows['opt1']==$final){echo 'checked'; $z=1;}echo'>'.$rows['opt1'].'<br><br>
                           <input type="radio" name="option" disabled value="'.$rows['opt2'].'"';if($rows['opt2']==$final){echo 'checked';$z=1;}echo'>'.$rows['opt2'].'<br><br>
                           <input type="radio" name="option" disabled value="'.$rows['opt3'].'"';if($rows['opt3']==$final){echo 'checked';$z=1;}echo'>'.$rows['opt3'].'<br><br>
                           <input type="radio" name="option" disabled value="'.$rows['opt4'].'"';if($rows['opt4']==$final){echo 'checked';$z=1;}echo'>'.$rows['opt4'].'<br><br>
                            <input type="submit" name="sub" value="Next">
                       </form>
                         ';?></p>
           
           <?php $sql_opt = "SELECT * FROM `$year`";
            $result_opt = mysqli_query($conn,$sql_opt);
                if($finaly==$rows['ans']){
                        echo "right";
                    }
                else if($finaly==NUll){
                        echo 'Not answered';
                }
                else{
                        echo "wrong";
                    }
          
           
            echo '<form method="post" action="answer.php" id="opt">';
                //if($rows['opt1']!=NULL || $rows['opt2']!=NULL|| $rows['opt3']!=NULL|| $rows['opt4']!=NULL){
                while($rowsd = mysqli_fetch_assoc($result_opt)){
                        $w = $rowsd['id'];
                    
                     $sql_a = "SELECT * FROM `ans` WHERE ans_id=$w";
                    $result_a = mysqli_query($conn,$sql_a);
                    $rows_a = mysqli_fetch_assoc($result_a);
                    
                    echo'
                <input type="submit" name="opt" value="'.$rowsd['id'].'"';if($rows_a['mark']!=NULL){echo 'id="me"';} echo'>';
                }echo '</form>';
           ?>
       </div>
    
    
    
    </div> 
    
</body>
</html>