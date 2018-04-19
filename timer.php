<?php
include('db2.php');
$sql = "SELECT * FROM `timer` WHERE `id`=1";
$sql_con = mysqli_query($conn,$sql);
$rows = mysqli_fetch_assoc($sql_con);
$time = $rows['time'];
/*if(isset($_POST["sub"])){
    $times = $_POST["times"];
     $sqli ="UPDATE `timer` SET `time` = $times WHERE `timer`.`id` = 1";
    mysqli_query($conn,$sqli);
}*/
?>

<html>
<head>
    
</head>
    
<body> 

<script>
var seconds = 3600;
times = document.getElementById("times");
times2 = document.getElementById("times2");
function secondPassed(){
    var minutes = Math.round((seconds -30) / 60);
    var remainingSeconds = seconds % 60;
    
    if(remainingSeconds < 10){
        remainingSeconds = "0" + remainingSeconds;
    }
    time =document.getElementById("time");
    time.innerHTML = minutes +": "+remainingSeconds;
    
    if(seconds == 0){
        clearInterval(countdownTimer);
        time.innerHTML = "hmmm";
    }
    else{
          seconds--;
        
    }}
    var countdownTimer = setInterval('secondPassed()',1000);
    </script>
    
</body>

</html>