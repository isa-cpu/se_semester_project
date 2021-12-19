<?php
	include('../includes/connect2.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM customer WHERE cus_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<?php
session_start();
$position=$_SESSION['SESS_LAST_NAME'];

?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="savecustomerpay.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Make Payment</h4></center>
<hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Full Name : </span><input type="text" style="width:265px; height:30px;" name="name" value="<?php echo $row['cus_name']; ?>" /><br>
<span>Date: <br></span><input type="date" style="width:265px; height:30px;" name="date" placeholder="MM/DD/YYYY" required/><br>
<span>Amount : </span><input type="text" style="width:265px; height:30px;" name="contact" value="" required/><br>
<span> </span><input type="hidden" name="cashier" value="<?php echo $position; ?>" />
<div style="float:right; margin-right:10px;">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>