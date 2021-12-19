<?php
/* Database config */
$db_host		= 'localhost';
$db_user		= 'root';
$db_pass		= '';
$db_database	= 'minimart'; 

/* End config 
uoolo_22001365_zanfa 
tumalana 
uoolo_22001365 
sql311.ihostfull.com*/

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//////////////////////////////////////////////////////////////////D
function createRandomPassword() {
	$pass = '' ;
	global $msg, $db;
	$result = $db->prepare("SELECT
	Max(sales.sales_id) AS MAXi
	FROM
	sales");
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
	$dsdsd=$row['MAXi'];
	$_SESSION['in_on']=$dsdsd;
	if($dsdsd==0){
		$csr = 1;
		$pass = $csr;
	}elseif($dsdsd>=1){
		$csr = $dsdsd;
		$pass = $csr;
	}elseif($dsdsd>=10){
		$csr = $dsdsd;
		$pass = $csr;
	}elseif($dsdsd>=100){
		$csr = $dsdsd;
		$pass = $csr;
	}elseif($dsdsd>=1000){
		$csr = $dsdsd;
		$pass = $csr;
	}
	}
	return $pass;
}

/*
function createRandomPassword2() {
	$pass = '' ;
	global $msg, $db;
	$result = $db->prepare("SELECT
	Max(orderproduct.id) AS MAXi
	FROM
	orderproduct");
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
	$dsdsd=$row['MAXi'];
	$_SESSION['in_on']=$dsdsd;
	if($dsdsd==0){
		$csr = 1;
		$pass1 = $csr;
	}else{
		$pass1=$dsdsd;
	}
	
	}
	return $pass1;
}
function createRandomPasswordggg() {
	$pass = '' ;
	global $msg, $db;
	
	
	$result = $db->prepare("SELECT id,num FROM `invoiceno` ORDER BY num ASC LIMIT 1");
	$result->execute();
	$row = $result->fetch();
	//for($i=0; $row = $result->fetch(); $i++){
	$dsdsd=$row['num'];
	$oo=$row['id'];
	$_SESSION['SESS']=$dsdsd;
	$pass=$dsdsd;
	
	
	//if($dsdsd  $pass){
		//$result1 = $db->prepare("DELETE FROM invoiceno LIMIT 1");
	//$result1->bindParam(':memid', $dsdsd);
	//$result1->execute();
	//}
	
	//for($i=1; $i<=10000; $i++){
	//$sql = "INSERT INTO invoiceno (num) VALUES (:a)";
//$q = $db->prepare($sql);
//$q->execute(array(':a'=>$i));
	//}
		

	//}
	//$eee=createRandomPassword();
	
	
	return $pass;
	
	
}


$result = $db->prepare("SELECT id,num FROM `invoiceno` ORDER BY num ASC LIMIT 1");
	$result->execute();
	$row = $result->fetch();
	//for($i=0; $row = $result->fetch(); $i++){
	$dsdsd=$row['num'];
	$oo=$row['id'];
	if ($dsdsd==createRandomPassword()){
		$result1 = $db->prepare("DELETE FROM invoiceno LIMIT 1");
	//$result1->bindParam(':memid', $dsdsd);
	$result1->execute();
	
	$result = $db->prepare("SELECT id,num FROM `invoiceno` ORDER BY num ASC LIMIT 1");
	$result->execute();
	$row = $result->fetch();
	//for($i=0; $row = $result->fetch(); $i++){
	$dsdsd=$row['num'];
	$oo=$row['id'];
		//$finalcode=$dsdsd
	}

*/

function createRandomPasswordold() {
	$pass = '' ;
	global $msg, $db;
	$pass=rand(1,500);
	return $pass;
}

$z=date("his");



//$finalcode2='CSR'.$z.'-'.createRandomPassword2();
$finalcode='CSR'.$z.'-'.createRandomPassword();
//////////////////////////////////////////////////////////////////D
/*	
function price_exist($pid,$tid){
	global $msg, $db, $error;
 
	$sql_select = "SELECT
					tbltypeprice.price
					FROM
					tbltypeprice
					WHERE
					tbltypeprice.product_id = ". $db->quote($pid) . " AND
					tbltypeprice.saletype = " . $db->quote($tid) . "
				   LIMIT 1";
	$stmt = $db->query($sql_select);
	if($stmt === false){
		return NULL;
	}
	$r = $stmt->fetch(PDO::FETCH_ASSOC);
	if($r !== false){
		return true;
	}else
		return false;
}
//////////////////////////////////////////////////////////////////D

	function product_id($pid){
		global $msg, $db;
		$sql_select = "SELECT
products.product_id
FROM
products
WHERE
products.product_code = " . $db->quote($pid) . "
				   LIMIT 1";
		$stmt = $db->query($sql_select);
		if($stmt === false){
			return NULL;
		}
		$r = $stmt->fetchAll(PDO::FETCH_OBJ);
		if($r !== false){
			foreach($r as $result)
		{
			$posnam = $result->product_id;
		}
			return $posnam;
		}else
			return null;
}
//////////////////////////////////////////////////////////////////D
	function get_Price($pid,$tid){
		global $msg, $db;
		$sql_select = "SELECT
tbltypeprice.price
FROM
tbltypeprice
WHERE
tbltypeprice.product_id = ". $db->quote($pid) . " AND
tbltypeprice.saletype = " . $db->quote($tid) . "
				   LIMIT 1";
		$stmt = $db->query($sql_select);
		if($stmt === false){
			return NULL;
		}
		$r = $stmt->fetchAll(PDO::FETCH_OBJ);
		if($r !== false){
			foreach($r as $result)
		{
			$posnam = $result->price;
		}
			return $posnam;
		}else
			return null;
}
*/
//////////////////////////////////////////////////////////////////D
			function formatMoney($number, $fractional=false) {
					if ($fractional) {
						$number = sprintf('%.2f', $number);
					}
					while (true) {
						$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
						if ($replaced != $number) {
							$number = $replaced;
						} else {
							break;
						}
					}
					return $number;
				}
//////////////////////////////////////////////////////////////////D


?>
