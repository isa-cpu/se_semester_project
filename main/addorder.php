<?php
session_start();
include('config.php');
include('../includes/connect2.php');
$a = $_POST['invoice'];
$b = $_POST['bar_code'][0];
$c = $_POST['name'][0];
$w = $_POST['pt'];
//$asasa = $_POST['price'];
$car=$_SESSION['firstname']." ".$_SESSION['lastname'];
$date = $_POST['date'];
$new_Date = date("Y/m/d", strtotime($date));
$discount = $_POST['discount'];

//edit qty


$st = 'Waiting';
$f = date('Y/m/d');
$j=0;
// query
$sql = "INSERT INTO orderproduct (invoice,bar_code,name,sales_person,tdate,status,qty) VALUES (:f,:a,:b,:c,:d,:h,:j)";
$q = $db->prepare($sql);
$q->execute(array(':f'=>$a,':a'=>$b,':b'=>$c,':c'=>$car,':d'=>$f,':h'=>$st,':j'=>$j));
header("location: orderproduct.php?id=$w&invoice=$a");



?>