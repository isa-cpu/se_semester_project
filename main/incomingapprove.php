<?php
session_start();
include('config.php');
include('../includes/connect2.php');
$a = $_POST['invoice'];
$b = $_POST['name'];
//$c = $_POST['qty'];
$w = $_POST['pt'];
$c = $_POST['contact'];
$inv = $_POST['memi'];
$myinv = $_POST['inv'];
//$asasa = $_POST['price'];
$car=$_SESSION['firstname']." ".$_SESSION['lastname'];
$date = $_POST['date'];
$new_Date = date("Y/m/d", strtotime($date));
$discount = $_POST['discount'];
$result = $db->prepare("SELECT * FROM pro WHERE bar_code= :userid");
$result->bindParam(':userid', $b);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$asasa=$row['sale_price'];
$code=$row['id'];
$name=$row['name'];
$ql=$row['unit'];

}

$result2 = $db->prepare("SELECT * FROM product WHERE bar_code= :userid");
$result2->bindParam(':userid', $b);
$result2->execute();
for($i=0; $row = $result2->fetch(); $i++){
$asasa1=$row['sale_price'];
$code1=$row['id'];
$name1=$row['name'];
$ql1=$row['unit'];

}
//edit qty
if ($ql<=0){
	echo "<script>alert('Please this Product is out of stock');</script>";
	echo "<script type='text/javascript'> document.location = 'approveproduct.php'; </script>";
	exit();
	} else{
if ($ql<$c)
{
	echo "<script>alert('The Requested Quantity is more than The Quantity in Stock');</script>";
	echo "<script type='text/javascript'> document.location = 'approveproduct.php'; </script>";
	exit();
		} else{
$sql = "UPDATE productwhole
        SET unit=unit-?
		WHERE bar_code=?";
$q = $db->prepare($sql);
$q->execute(array($c,$b));

	$sql1 = "UPDATE product
        SET unit=unit+?
		WHERE bar_code=?";
$q1 = $db->prepare($sql1);
$q1->execute(array($c,$b));


$dd='Approve';
$sql2 = "UPDATE orderproduct
        SET status=?
		WHERE bar_code=? AND invoice=?";
$q2 = $db->prepare($sql2);
$q2->execute(array($dd,$b,$inv));

$sql3 = "UPDATE orderproduct
        SET qty=qty+?
		WHERE bar_code=? AND invoice=?";
$q3 = $db->prepare($sql3);
$q3->execute(array($c,$b,$inv));


$sql4 = "UPDATE orderproduct
        SET officer=?
		WHERE bar_code=? AND invoice=?";
$q4 = $db->prepare($sql4);
$q4->execute(array($car,$b,$inv));
//$dis=$discount/100;

$tqty = $ql - $c ;
$st = 'Transfer to retail';
//$stat = 'Transfers-Source';
$std = 'Transfers-Destination';
$sts = 'Transfers-Source';
$stt = 'Transfers to wholesale';
$stat = 'Transfers-RETAIL';
$st1 = 'Transfers from wholesale';
$f = date('Y/m/d');
$sql = "INSERT INTO bincardwhole(product_id,pre_qty,qty,total_qty,status,date,csr,narration2) VALUES (:a,:b,:c,:d,:e,:f,:g,:h)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$b,':b'=>$ql,':c'=>$c,':d'=>$tqty,':e'=>$sts,':f'=>$f,':g'=>$myinv,':h'=>$st));
// query
$tqty1 = $ql1 + $c ;
$st1 = 'Transfer from wholesale';
//$stat = 'Transfers-Source';
$f1 = date('Y/m/d');
$sql1 = "INSERT INTO bincard(product_id,pre_qty,qty,total_qty,status,date,csr,narration2) VALUES (:a,:b,:c,:d,:e,:f,:g,:h)";
$q1 = $db->prepare($sql1);
$q1->execute(array(':a'=>$b,':b'=>$ql1,':c'=>$c,':d'=>$tqty1,':e'=>$std,':f'=>$f1,':g'=>$myinv,':h'=>$st1));
// query
header("location: approveproduct.php");

}
}
?>