<?php
include('../includes/connect2.php');
 ?>
	
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
	  <script src="vendors/jquery-1.7.2.min.js"></script>
    <script src="vendors/bootstrap.js"></script>
<form action="#" method="post">
<center><h4><i class="fa fa-plus-sign"></i> Add Price</h4></center>
<hr>
<div id="ac">
<span>Product : </span>
<select name="product" style="width:250px; "class="chzn-select" required>
<option value="">Select Product</option>
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

<span>Price : </span><input type="text" style="width:250px; height:30px;" name="price" placeholder="Price"/><br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>