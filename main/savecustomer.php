<?php
session_start();
include('../includes/connect2.php');
$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['contact'];
$d = $_POST['balance'];
//$d = 0;
// query
$sql = "INSERT INTO customer (cus_name,cus_address,cus_contact,cus_balance) VALUES (:a,:b,:c,:d)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d));
header("location: creditors.php");


?>