<?php
	include('../includes/connect2.php');
	$id=$_GET['id'];
	$c=$_GET['invoice'];
	$sdsd=$_GET['dle'];
	$qty=$_GET['qty'];
	$wapak=$_GET['code'];
	$pcode=$_GET['pcode'];
	//edit qty
	$sql = "UPDATE product 
			SET unit=unit+?
			WHERE bar_code=?";
	$q = $db->prepare($sql);
	$q->execute(array($qty,$pcode));

	$result = $db->prepare("DELETE FROM sales_order WHERE transaction_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	header("location: sales.php?id=$sdsd&invoice=$c");
?>