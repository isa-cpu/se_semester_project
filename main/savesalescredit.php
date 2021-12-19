<?php
session_start();
include('../includes/connect2.php');
$a = $_POST['invoice'];
$b = $_POST['cashier'];
$c = $_POST['date'];
$d = $_POST['ptype'];
$e = $_POST['amount'];
//$z = $_POST['type'];
$new_Date = date("Y/m/d", strtotime($c));
$cname = $_POST['cname'];
$z=date("h:i:sa");
$h='Credit-Sale';
if($d=='credit') {
$f = $_POST['due'];
$sql = "INSERT INTO sales (invoice_number,sales_person,sales_date,type,amount,due_date,salestime,sales_type) VALUES (:a,:b,:c,:d,:e,:z,:f,:z,:h)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$new_Date,':d'=>$d,':e'=>$e,':f'=>$f,':h'=>$h,':z'=>$z));
alert("done");
header("location: preview2.php?invoice=$a");
exit();
}
if($d=='cash') {
$f = $_POST['cash'];
$m="credit";
$sql = "INSERT INTO sales (invoice_number,sales_person,sales_date,type,amount,due_date,salestime,sales_type) VALUES (:a,:b,:c,:d,:e,:f,:h,:z)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$new_Date,':d'=>$m,':e'=>$e,':f'=>$f,':h'=>$h,':z'=>$z));
//header("location: preview2.php?invoice=$a");
//exit();
}

$sql = "UPDATE customer
        SET cus_balance=cus_balance+?
		WHERE cus_name=?";
$q = $db->prepare($sql);
$q->execute(array($e,$cname));

$result = $db->prepare("SELECT cus_balance FROM customer WHERE cus_name= :userid");
$result->bindParam(':userid', $cname);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){

$name=$row['cus_balance'];

}



$y = "credit";
$sqll = "INSERT INTO credit_sales (invoice_number,sales_person,credit_date,type,amount,name,sales_type,balance) VALUES (:a,:b,:c,:d,:e,:g,:h,:l)";
$q = $db->prepare($sqll);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$y,':e'=>$e,':g'=>$cname,':h'=>$h,':l'=>$name));


header("location: creditpreview.php?invoice=$a");
exit();
// query



?>