<?php 
include('config.php');
include('../includes/connect2.php');
$b = $_POST['bar_code'][0];
$a = $_POST['quantity'][0];
$h = $_POST['sale_price_org'][0];
$dat=date("Y/m/d");
session_start();
$tr=$_SESSION['tr'];
$id=$_SESSION['idd'];
$position= $_SESSION['firstname'];
$des="purchase";
if(isset($_POST['bar_code']) AND !empty($_POST['bar_code'])){
	    
		
		//$b = $_POST['product'];
		//$c = $_POST['qty'];
		$result = $db->prepare("SELECT * FROM product WHERE bar_code= :userid");
		$result->bindParam(':userid', $b);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		$asasa=$row['mrg'];
		$qty=$row['unit'];
		}
	    $sql = "UPDATE product 
					SET unit=$qty + :c
					WHERE bar_code=:a";
			$q = $db->prepare($sql);
			$q->bindParam(':a', $b);
			$q->bindParam(':c', $a);
			$q->execute();
			//echo $b;
			
			$sql1 = "INSERT INTO new_purchase(Invoice_number,tdate,sales_person,code,description,qty,price) VALUES (:f,:a,:g,:b,:d,:e,:h)";
			$q = $db->prepare($sql1);
			$q->execute(array(':f'=>$id,':a'=>$dat,':g'=>$position,':b'=>$b,':d'=>$des,':e'=>$a,':h'=>$h));
		
			header("location:  mainproductadd.php");
			
}

?>