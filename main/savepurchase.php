<?php session_start();
include("../includes/connect.php");

if(isset($_POST['submit'])){

 $purchase_date = $_POST['purchase_date'];
 $invoice_number = $_POST['invoice_number'];
 $supplier = $_POST['supplier'];
 $remarks = $_POST['remarks'];

 //checking if invoice is already in inventory
 $stmtckinvoice = $conn->prepare("SELECT * FROM purchases WHERE invoice_number ='$invoice_number'");
 $stmtckinvoice->execute();
 $stmtckinvoice->store_result();

 if($stmtckinvoice->num_rows >0){
  echo "<script>alert('Please this invoice number already exist');</script>";
	 echo "<script type='text/javascript'> document.location = 'stock.php'; </script>";
	exit;
 }else{
   $stmt = $conn->prepare("INSERT INTO purchases (invoice_number,purchase_date,supplier,remarks) VALUES(?,?,?,?)");
 $stmt->bind_param("ssss",$invoice_number,$purchase_date,$supplier,$remarks);
 $stmt->execute();


 if($stmt->affected_rows >0){
  header("Location: mainproductadd.php?invoice=$invoice_number");
 }else{
  echo "<script>alert('not not not');</script>";


 }
 }


}