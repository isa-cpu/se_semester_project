<?php
	include('../includes/connect2.php');
	include("config.php");
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM product WHERE bar_code= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />

<form action="saveeditp.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Edit/Alter Product</h4></center>
<hr>
<div id="ac"  style="background-color: lightblue; width:500px; margin: auto;border: 3px solid green;padding: 10px;">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Barcode : </span><input type="text" style="width:265px; height:30px;" name="name" value="<?php echo $row['bar_code']; ?>"  /><br>
<span>Product Name : </span><input type="text" style="width:265px; height:30px;" name="address" value="<?php echo $row['name']; ?>" /><br>
<span>Category Name: </span><select name="cat" id="cat" class="form-control" style="width:265px; height:30px;">
							<option value="<?php echo $row['cat']; ?>"><?php echo $row['cat']; ?></option>
							<?php $sqlP = $conn->query("SELECT * FROM category ORDER BY name ASC");
							while($rowP = $sqlP->fetch_array()){?>
							<option value="<?php echo $rowP['cat']?>"><?php echo $rowP['cat'];?></option>
							<?php }?>
						</select><br>
<span>Qty : </span><input type="text" style="width:265px; height:30px;" name="unit" value="<?php echo $row['unit']; ?>"  readonly/><br>
<span>Price : </span><input type="text" style="width:265px; height:30px;" name="price" value="<?php echo $row['sale_price']; ?>" readonly /><br>
<span> </span><input type="hidden" style="width:265px; height:30px;" name="id" value="<?php echo $row['id']; ?>" /><br>
<div style="float:center;">

<button class="btn btn-success btn-block btn-large" style="width:150px; margin-left:100px;height:40px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
<a href="products.php"><button class="btn btn-success btn-block btn-small" style="width:130px; margin-left:10px;height:40px;"><i class="icon icon-save icon-large"></i> Back</button></a>
</div>
</div>
</form>
<?php
}
?>