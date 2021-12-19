<?php
session_start();
include('../includes/connect2.php');
$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['contact'];
$d = $_POST['cperson'];
$e = $_POST['description'];
// query
$sql = "INSERT INTO suppliers (supplier_name,supplier_address,supplier_contact,supplier_con_person,description) VALUES (:a,:b,:c,:d,:e)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e));
if($q->rowCount() >0){
  $_SESSION['message'] = "Registration successful";
  $_SESSION['msgType'] = "success";
 header("location: suppliers.php");
}else{
  $_SESSION['message'] = "Registration successful";
  $_SESSION['msgType'] = "danger";
}

?>