<?php
session_start();
include('config1.php');
include('../includes/connect2.php');
$a = $_POST['invoice'];
$b = $_POST['bar_code'][0];
$c = $_POST['qty'];
$w = $_POST['pt'];
//$asasa = $_POST['price'];
$car=$_SESSION['SESS_FIRST_NAME'];
$date = $_POST['date'];
$new_Date = date("Y/m/d", strtotime($date));
$discount = $_POST['discount'];
$result = $db->prepare("SELECT * FROM product WHERE bar_code= :userid");
$result->bindParam(':userid', $b);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$asasa=$row['sale_price'];
$code=$row['product_id'];
$name=$row['name'];
$ql=$row['unit'];
}
//edit qty
if ($ql<=0){
	echo "<script>alert('Please this Product is out of stock');</script>";
	echo "<script type='text/javascript'> document.location = 'creditSales.php?id=$w&invoice=$a'; </script>";
	} else{
if ($ql<$c)
{
	echo "<script>alert('The Requested Quantity is more than The Quantity in Stock');</script>";
	echo "<script type='text/javascript'> document.location = 'creditSales.php?id=$w&invoice=$a'; </script>";
		} else{
$sql = "UPDATE product
        SET unit=unit-?
		WHERE bar_code=?";
$q = $db->prepare($sql);
$q->execute(array($c,$b));
$dis=$discount/100;
$np=$c*$asasa;
$discou=$np*$dis;
$fffffff=$np-$discou;
$d=$fffffff;
// query
$tqty = $ql - $c ;
$st = 'Credit-Sales';
$f = date('Y/m/d');

// query
$sql = "INSERT INTO sales_ordercredit (invoice,product,qty,amount,name,cashier,price,product_code,discount,rdate) VALUES (:a,:b,:c,:d,:e,:x,:f,:i,:j,:k)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$code,':c'=>$c,':d'=>$d,':e'=>$name,':x'=>$car,':f'=>$asasa,':i'=>$b,':j'=>$discount,':k'=>$new_Date));
header("location: creditSales.php?id=$w&invoice=$a");

}
}
?>