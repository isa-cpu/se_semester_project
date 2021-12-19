<?php
//declaring dabase connection variables

$sername = "localhost";
$username = "root";
$password = "";
$dbname = "minimart";

// connecting now...  
$conn = mysqli_connect($sername,$username,$password,$dbname);
if(!$conn){
 die("database connection fail");
}