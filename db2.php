<?php
    $server="localhost";
    $user = "root";
    $pass = "";
    $db = "quest";

    $conn = mysqli_connect($server,$user,$pass,$db);
    
if(!$conn){
    die("connection failed".mysqli_error());
}
?>