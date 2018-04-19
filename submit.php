<?php
include('db2.php');
$sql_num = "SELECT * FROM `ans`";
$result_num = mysqli_query($conn,$sql_num);
$num = $rows_num = mysqli_fetch_all($result_num);
$read = count($num);  
$sql_num1 = "SELECT * FROM `ans` WHERE `ans_opt`!=''";
$result_num1 = mysqli_query($conn,$sql_num1);
$num1 = $rows_num1 = mysqli_fetch_all($result_num1);
$read1 = count($num1);
//echo $read1.'/'.$read.' answered';
$sum = "SELECT SUM(`mark`) AS value_sum FROM ans";
$summ = mysqli_query($conn,$sum);
$row_sum = mysqli_fetch_assoc($summ);
//echo $row_sum['value_sum'];
//echo $sm; 

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
        
    </style>
</head>

    
<body>
   <div id="main">
        <div id="nav">
            
       </div>
       <div id="bdy">
           <h1><?php echo $read1.'/'.$read.' answered ';?></h1>
           <p>Always Prepare</p>
           <!--<a class="bdy_btn" href="que.php"><p>Go Back</p></a><br>-->
           <a class="bdy_btn" href="answer.php"><p>Check Score</p></a>
       </div>
    
    
    
    </div> 
    
</body>
</html>