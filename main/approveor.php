<?php
	include('../includes/connect2.php');
	$id=$_GET['id'];
	$idd=$_GET['invoice'];
	$result = $db->prepare("SELECT * FROM orderproduct WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<?php
session_start();
$position=$_SESSION['SESS_LAST_NAME'];

?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="#" method="post">
<center><h4><i class="icon-edit icon-large"></i> Approve Request</h4></center>
<hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $row['invoice']; ?>" />
<input type="hidden" name="inv" value="<?php echo $idd; ?>" />
<span>Bar Code : </span><input type="text" style="width:265px; height:30px;" name="name" value="<?php echo $row['bar_code']; ?>" readonly/><br>
<span>Product Name: <br></span><input type="text" style="width:265px; height:30px;" name="date"  value="<?php echo $row['name']; ?>" readonly/><br>
<span>Qty : </span><input type="text" style="width:265px; height:30px;" name="contact" value="" required/><br>
<span> </span><input type="hidden" name="cashier" value="<?php echo $position; ?>" />
<div style="float:right; margin-right:10px;">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Final Approval</button>
</div>
</div>
</form>
<?php
}
?>