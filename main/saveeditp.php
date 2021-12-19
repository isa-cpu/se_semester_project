<?php
// configuration
include('../includes/connect2.php');

// new data
//$id = $_POST['memi'];
$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['unit'];
$d = $_POST['price'];
$cat = $_POST['cat'];
$e = $_POST['id'];
//$c = $_POST['contact'];
// query
$sql = "UPDATE product 
        SET name=?, brand=?, unit=?, sale_price=?, cat=?, bar_code=?
		WHERE product_id=?";
$q = $db->prepare($sql);
$q->execute(array($b,$b,$c,$d,$cat,$a,$e));
header("location: products.php");

?>