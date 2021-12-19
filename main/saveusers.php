<?php session_start();
include("../includes/connect.php");

if(isset($_POST['submit'])){

 $firstname = $_POST['firstname'];
 $lastname = $_POST['lastname'];
 $username = $_POST['username'];
 $pwd = $_POST['pwd'];
 $accountType = $_POST['accountType'];

 //checking if invoice is already in inventory
 $stmtckinvoice = $conn->prepare("SELECT * FROM users WHERE username ='$username'");
 $stmtckinvoice->execute();
 $stmtckinvoice->store_result();

 if($stmtckinvoice->num_rows >0){
  echo "<script>alert('Please this username already exist');</script>";
	 echo "<script type='text/javascript'> document.location = 'users.php'; </script>";
	exit;
 }else{
   $stmt = $conn->prepare("INSERT INTO users (firstname,lastname,username,pwd,accountType) VALUES(?,?,?,?,?)");
 $stmt->bind_param("ssssi",$firstname,$lastname,$username,$pwd,$accountType);
 $stmt->execute();


 if($stmt->affected_rows >0){
  header("Location: users.php?username=$username");
 }else{
  echo "<script>alert('not not not');</script>";


 }
 }


}