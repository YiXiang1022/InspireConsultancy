<?php


$servername = "localhost:3306";
$username = "root";
$pass = "";
$dbname = "inspire";


$con = mysqli_connect($servername,$username,$pass,$dbname);
mysqli_set_charset($con,'utf8mb4');
date_default_timezone_set("Asia/Kuala_Lumpur");
?>




