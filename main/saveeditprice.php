<?php
// configuration
include('../includes/connect2.php');

// new data
$id = $_POST['memi'];
$a = $_POST['product'];
$b = $_POST['type'];
$c = $_POST['price'];
$c1 = $_POST['bar'];

// query


$sql1 = "UPDATE product 
        SET sale_price=?
		WHERE bar_code=?";
$q = $db->prepare($sql1);
$q->execute(array($c,$c1));
header("location: price.php");

?>