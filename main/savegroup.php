<?php
session_start();
include('../includes/connect2.php');
$a = $_POST['code'];
$b = $_POST['name'];

// query
$sql = "INSERT INTO category (name,cat) VALUES (:a,:b)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b));
///////////////////

header("location: products.php");


?>