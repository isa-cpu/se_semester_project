<?php
session_start();
include('../includes/connect2.php');
//$z = $_POST['time'];
$a = $_POST['invoice'];
$b = $_POST['cashier'];
$c = $_POST['date'];
$d = $_POST['ptype'];
$e = $_POST['amount'];
$z = $_POST['type'];
$new_Date = date("Y/m/d", strtotime($c));

$z=date("h:i:sa");
$h='Sales';
if($d=='credit') {
$f = $_POST['due'];
$sql = "INSERT INTO sales (invoice_number,sales_person,sales_date,type,amount,due_date,salestime,sales_type) VALUES (:a,:b,:c,:d,:e,:z,:f,:z,:h)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$new_Date,':d'=>$d,':e'=>$e,':f'=>$f,':g'=>$cname,':h'=>$h,':z'=>$z));
header("location: receipt.php?invoice=$a");
exit();
}
if($d=='cash') {
$f = $_POST['cash'];
$sql = "INSERT INTO sales (invoice_number,sales_person,sales_date,type,amount,due_date,salestime,sales_type) VALUES (:a,:b,:c,:d,:e,:f,:z,:h)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$new_Date,':d'=>$d,':e'=>$e,':f'=>$f,':h'=>$h,':z'=>$z));
header("location: receipt.php?invoice=$a");
exit();
}
// query



?>