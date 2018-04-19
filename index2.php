<?php
include('db2.php');
$sql_num = "SELECT * FROM `section`";
$result_num = mysqli_query($conn,$sql_num);
$rows_num = mysqli_fetch_assoc($result_num);
$i = $rows_num['num'];
if(isset($_POST['opt'])){
    $i = $_POST['opt'];
    echo $i;
    $ins ="UPDATE `section` SET num = '$i'";
    mysqli_query($conn,$ins);
}
if(isset($_POST['sub'])){
    $i += 1;
    if($i>100){header("Location:submit.php");}    
    else if($i<100){
    $ins ="UPDATE `section` SET num = '$i'";
    mysqli_query($conn,$ins);    
    $ans ="SELECT * FROM `ans`";
    mysqli_query($conn,$ans);
    $anss = $_POST['option'];
        echo $anss;
    //$ans_sql = "INSERT INTO ans (ans_opt,mark) VALUES('$anss',1)";
        $x = $i-1;
        //check ans
        $sql = "SELECT * FROM `2008` WHERE id=$x";
        $result = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_assoc($result);
        if($rows['ans']==$anss){
            $y = 1;}
        else{$y=0;}
        //update ans
      $ans_sql=  "UPDATE `ans` SET `ans_opt`= '$anss', `mark` = '$y' WHERE `ans`.`ans_id` = '$x'";
   mysqli_query($conn,$ans_sql);
    }
}
   
     $sql = "SELECT * FROM `2008` WHERE id=$i";
        $result = mysqli_query($conn,$sql);
            $rows = mysqli_fetch_assoc($result);
            $sql_a = "SELECT * FROM `ans` WHERE ans_id=$i";
            $result_a = mysqli_query($conn,$sql_a);
            $rows_a = mysqli_fetch_assoc($result_a);
            $final = $rows_a['ans_opt'];
                echo $rows['quest'].'<br>';
                echo '<img src="images/'.$rows['q_img'].'"><br>';
                 echo '<form method="post" action="index2.php">
                           <input type="radio" name="option" value="'.$rows['opt1'].'"';if($rows['opt1']==$final){echo 'checked';}echo'>'.$rows['opt1'].'<br>
                           <input type="radio" name="option" value="'.$rows['opt2'].'"';if($rows['opt2']==$final){echo 'checked';}echo'>'.$rows['opt2'].'<br>
                           <input type="radio" name="option" value="'.$rows['opt3'].'"';if($rows['opt3']==$final){echo 'checked';}echo'>'.$rows['opt3'].'<br>
                           <input type="radio" name="option" value="'.$rows['opt4'].'"';if($rows['opt4']==$final){echo 'checked';}echo'>'.$rows['opt4'].'<br>
                            <input type="submit" name="sub" value="Next">
                       </form>
                         ';
            $sql_opt = "SELECT * FROM `2008`";
            $result_opt = mysqli_query($conn,$sql_opt);
            echo '<form method="post" action="index2.php">';
                while($rowsd = mysqli_fetch_assoc($result_opt)){
                    echo'
                <input type="submit" name="opt" value="'.$rowsd['id'].'">';
                }echo '</form>';
            

?>
