<?php
	include('../includes/connect2.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT
				product.bar_code,
				product.product_id,
				product.name,
				product.sale_price
				FROM
				product
WHERE
product.product_id = :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++){
		$dsdsd1=$rows['bar_code'];
		
		
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditprice.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Edit Sales Price  </h4></center>
<hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<input type="hidden" name="bar" value="<?php echo $dsdsd1;?>" />
<span>Product : </span>
<select name="product" style="width:250px; "class="chzn-select" required readonly>
<option value="<?php echo $rows['product_id']; ?>"><?php echo $rows['bar_code']; ?> - <?php echo $rows['name']; ?></option>

	<?php
	$result = $db->prepare("SELECT * FROM product");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option value="<?php echo $row['product_id'];?>"><?php echo $row['bar_code']; ?> - <?php echo $row['name']; ?></option>
	<?php
				}
			?>
</select><br>

<span>Price : </span><input type="text" value="<?php echo $rows['sale_price']; ?>" style="width:250px; height:30px;" name="price" placeholder="Price"/><br>
<div style="float:right; margin-right:10px;">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>