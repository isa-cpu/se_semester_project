<?php
// configuration
include('../includes/connect2.php');

// new data
$id = $_POST['memi'];
$a = $_POST['name'];
$b = $_POST['date'];
$c = $_POST['contact'];
$f = $_POST['cashier'];
$g= 55555;
$new_Date = date("Y/m/d", strtotime($b));
// query


$sql = "UPDATE customer 
        SET cus_balance=cus_balance-?
		WHERE cus_id=?";
$q = $db->prepare($sql);
$q->execute(array($c,$id));

$result = $db->prepare("SELECT cus_balance FROM customer WHERE cus_name= :userid");
$result->bindParam(':userid', $a);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){

$name=$row['cus_balance'];

}

$y = "payment";
$h= "credit paid";
$sqll = "INSERT INTO credit_sales (invoice_number,sales_person,credit_date,type,amount,name,sales_type,balance) VALUES (:a,:b,:c,:d,:e,:g,:h,:l)";
$q = $db->prepare($sqll);
$q->execute(array(':a'=>$g,':b'=>$f,':c'=>$new_Date,':d'=>$y,':e'=>$c,':g'=>$a,':h'=>$h,':l'=>$name));
header("location: creditors.php");

?>