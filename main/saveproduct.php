<?php
session_start();
include('../includes/connect2.php');

if(isset($_POST['submit'])){
$a = $_POST['code'];
$b = $_POST['name'];
$m = $_POST['cat'];
$c = $_POST['price'];
$d = $_POST['qty'];
$e = $_POST['o_price'];
$g = 0;
$h = 0;
$i = 0;
$s = '';
$dat=date("Y/m/d");
$des="opening bal";
$pre=0;
$retqty=0;
// query
$name1='';
$name='';
$result = $db->prepare("SELECT * FROM product WHERE name= :userid");
$result->bindParam(':userid', $b);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
//$asasa=$row['sale_price'];
//$code=$row['id'];
$name=$row['name'];
//$ql=$row['unit'];
}

$result1 = $db->prepare("SELECT * FROM product WHERE bar_code= :userid1");
$result1->bindParam(':userid1', $a);
$result1->execute();
for($i=0; $row1 = $result1->fetch(); $i++){
//$asasa=$row['sale_price'];
//$code=$row['id'];
$name1=$row1['bar_code'];
//$ql=$row['unit'];
}
if ($name !="" || $name1 !=""){
	echo "<script>alert('Please this Product or Code already exist');</script>";
	echo "<script type='text/javascript'> document.location = 'products.php'; </script>";
	exit;
	}else{


///////////////////
$sql4 = "INSERT INTO product (bar_code,name,brand,sale_price,unit,mrp,alias,cat,cgst,sgst,igst,status) VALUES (:a,:b,:f,:c,:d,:e,:m,:n,:g,:h,:i,:s)";
$q4 = $db->prepare($sql4);
$q4->execute(array(':a'=>$a,':b'=>$b,':f'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':m'=>$m,'n'=>$m,'g'=>$g,'h'=>$h,'i'=>$i,'s'=>$s));
///////////////////
$b = 1;
//$a = product_id($a);
$sql = "INSERT INTO price (productid,sales_type,price) VALUES (:a,:b,:c)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c));

$sql1 = "INSERT INTO new_purchase(tdate,code,name,description,qty,price) VALUES (:a,:b,:c,:d,:e,:f)";
$q = $db->prepare($sql1);
$q->execute(array(':a'=>$dat,':b'=>$a,':c'=>$b,':d'=>$des,':e'=>$d,':f'=>$c));

header("Location: mainproductadd.php");
	}

}
?>