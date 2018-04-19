<?php
include("db2.php");

 if(isset($_POST["csvup"])){
     $year = $_POST["year"];
    $handle = fopen($_FILES['file']['tmp_name'],'r');
     $i=0;
     $sql="CREATE TABLE `$year` (
              `id` int(11) NOT NULL,
              `quest` text,
              `opt1` text,
              `opt2` text,
              `opt3` text,
              `opt4` text,
              `ans` text,
              `explanation` text,
              `q_img` text,
              `a_img` text
            )";
         mysqli_query($conn,$sql);
         $idd= "ALTER TABLE `$year` ADD PRIMARY KEY (`id`)";
         mysqli_query($conn,$idd);
        $aut = "ALTER TABLE `$year` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1";
         mysqli_query($conn,$aut);
     while(($data = fgetcsv($handle,100000,','))!==FALSE){
         $i++;
         if($i==1){
             continue;
         }
         
         $sqll = "INSERT INTO `$year` (`quest`,`opt1`,`opt2`,`opt3`,`opt4`,`ans`,`explanation`,`q_img`,`a_img`) VALUES ('".$data[1]."','".$data[2]."','".$data[3]."','".$data[4]."','".$data[5]."','".$data[6]."','".$data[7]."','".$data[8]."','".$data[9]."')";
         if(mysqli_query($conn,$sqll)){
            echo "win";
     }else{
             echo "not";
         }
 }}

?>

<!DOCTYPE html>
<html>
    <head></head>

    
    
<body>
    <center>
        <form method="post" action="csv.php" enctype="multipart/form-data">
            <h1>Csv to sql</h1>
            <p>import the file</p>
            <input type="file" name="file" required>
            <input type="text" name="year" placeholder="year">
            <br><br><br>
            <button type="submit" name="csvup">
                Submit
            </button>
        </form>
    
    </center>
    
    
</body>
</html>
