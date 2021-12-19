<?php
	include('../includes/connect2.php');
	$id=$_GET['id'];
	$c=$_GET['invoice'];
	$sdsd=$_GET['dle'];
	$qty=$_GET['qty'];
	$wapak=$_GET['code'];
	$pcode=$_GET['pcode'];
	//edit qty
	
	$result = $db->prepare("DELETE FROM orderproduct WHERE invoice= :memid AND bar_code = :id LIMIT 1");
	$result->bindParam(':memid', $c);
	$result->bindParam(':id', $pcode);
	$result->execute();
	header("location: approverequest.php");
?>