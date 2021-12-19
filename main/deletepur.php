<?php
	include('../includes/connect2.php');
	$id=$_GET['id'];
	//$c=$_GET['invoice'];
	$sdsd=$_GET['dle'];
	$qty=$_GET['qty'];
	$wapak=$_GET['code'];
	session_start();
$tr=$_SESSION['tr'];
	//edit qty
	$sql = "UPDATE product 
			SET unit=unit-?
			WHERE bar_code=?";
	$q = $db->prepare($sql);
	$q->execute(array($qty,$id));

	$result = $db->prepare("DELETE FROM new_purchase WHERE new_purchase_id= :memid");
	$result->bindParam(':memid', $wapak);
	$result->execute();
	
	
	
	header("location: mainproductadd.php?invoice=$sdsd");
?>