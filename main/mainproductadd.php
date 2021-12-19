<?php 
//session_start();
include('../includes/connect2.php');
include("config.php");
/*if(empty($_SESSION['user_id']) OR $_SESSION['role'] != 'cashier'){
	header("Location:index.php");
}*/
include("head.php");
;?>
<head>
 

</head>
<style type="text/css">
td:nth-child(2) {
    width: 30%;
}
</style>
<body class="animsition " onload="default_focus()">
<?php include('navfixed.php');?>


  
  <?php //include("sidebar_top_menu.php");?>
  <!-- Page -->
  <div class="page" style="margin:auto;">
	
    <div class="page-header">
      <h1 class="page-title"><a href="purchaseslist.php" class="pull-right" ><h3>Go To Product List</h3></a></h1>
      <?php
$id=$_GET['invoice'];
$resultaz = $db->prepare("SELECT * FROM purchases WHERE invoice_number= :xzxz");
$resultaz->bindParam(':xzxz', $id);
$resultaz->execute();
for($i=0; $rowaz = $resultaz->fetch(); $i++){
echo 'Transaction ID : TR-'.$rowaz['purchase_id'].'<br>';
echo 'Invoice Number : '.$rowaz['invoice_number'].'<br>';
echo 'Date : '.$rowaz['purchase_date'].'<br>';
echo 'Supplier : '.$rowaz['supplier'].'<br>';

session_start();
$_SESSION['idd']=$rowaz['invoice_number'];
$_SESSION['tr']=$rowaz['purchase_id'];
}

?>
    </div>

    <div class="page-content container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <!-- Panel Standard Mode -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Add Product</h3>
            </div>
            <div class="panel-body">
			<?php if(!empty($_SESSION['flash_msg'])) { echo $_SESSION['flash_msg']; $_SESSION['flash_msg'] = ''; } ?>
    <form class="form-horizontal00 billingForm"  method="POST" name="billingForm" id="dd" autocomplete="off">
				<input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['user_id'];?>" />
				<input type="hidden" id="invoice_id" name="invoice_id" value="<?php echo $invoice_id;?>" />
				
				<table id="app">
					<thead>
						<th>Barcode</th>
						<th>Name</th>
						<th>Alias</th>
						<th>MRP</th>
						<th>Quantity</th>
						<th>Available Quantity</th>
						<th>Sale Price</th>
					</thead>
					<tbody>
					<tr id="1">
						<td>
							<input type="text" id="bar_code_1" required class="form-control" onkeypress="return RestrictSpace()" onchange="get_detail(this.value,1)" name="bar_code[]" />
						</td>
					<td>
						<select name="name[]" id="name_1" class="form-control" onchange="get_detail_name(this.value,1)">
							<option value="">Choose Product</option>
							<?php $sqlP = $conn->query("SELECT * FROM product ORDER BY name ASC");
							while($rowP = $sqlP->fetch_array()){?>
							<option value="<?php echo $rowP['name']?>"><?php echo $rowP['name'];?></option>
							<?php }?>
						</select>
					</td>
					<td>
							<input type="text" id="alias_1" class="form-control" onkeypress="return RestrictSpace()" onchange="get_detail_alias(this.value,1)" name="alias[]" />
						</td>
					<td>
						<input type="text" required class="form-control" readonly id="mrp_1" name="mrp[]" />
					</td>
					<td>	
						<input type="number" class="form-control" onkeyup="calculate_price(this.value,1)" step="1" id="quantity_1" name="quantity[]" />
					</td>
					<td>
						<input type="text" readonly class="form-control" id="av_quantity_1" name="av_quantity[]" />
					</td>
					<td>
						<input type="number" required class="form-control" onkeyup="get_quantity(this.value,1)" step="0.01" id="sale_price_1" name="sale_price[]" />
						<input type="hidden" class="form-control" id="sale_price_org_1" name="sale_price_org[]" />
						<input type="hidden" class="form-control" id="igst_1" name="igst[]" />
					</td>
				</tr>
				</tbody>
				
				</table>
                 <div class="text-right">
                  <button type="submit" name="make_print" class="btn btn-primary" id="validateButton2">Add</button>
                </div>
              </form> <br/><br/>
					<!-- when product is new in the system -->
								<button class="btn btn-info" data-bs-toggle="modal" data-placement="top" data-bs-target="#exampleModal">CLICK HERE IF PRODUCT IS NEW</button>
					<!-- when product is new in the system ends-->

					<!-- stock modal -->
							<div
          class="modal fade"
          id="exampleModal"
          tabindex="-1"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i>Add Product</h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">
               <form action="saveproduct.php" method="post">
                Product Code: <input type="text" name="code" class="form-control"><br>
                Product Name.: <input type="text" name="name" placeholder="Product Name" class="form-control"> <br>
                Category Name: <select name="cat" id="" class="form-control" readonly>
                  <option value="">Select Category</option>
                 <?php
              //include('../connect.php');
              $result = $db->prepare("SELECT * FROM category");
                $result->bindParam(':userid', $res);
                $result->execute();
                for($i=0; $row = $result->fetch(); $i++){
              ?>
                <option><?php echo $row['cat']; ?></option>
              <?php
              }
              ?>
                </select> <br>
																Original Price: <input type="text" name="o_price" placeholder="o_price" class="form-control"><br>
                Selling Price: <input type="text" name="price" placeholder="Selling Price" class="form-control"><br>
                
                Quantity: <input type="text" name="qty" placeholder="Quantity" class="form-control"><br>
                
																<button class="btn-success btn-add" type="submit" name="submit">Add New Product & Stock</button>
               
               </form>
               
              </div>
              
              <div class="modal-footer">
                <button
                  
                  type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal"
                >
                
                  
                </button>
              </div>
            </div>
          </div>
        </div>
					<!-- stock modal ends -->
					<br><br><br>
					
			  <table class="table table-bordered" id="resultTable" data-responsive="table">
	<thead>
		<tr>
			<th> Product Code </th>
			<th> Product Name </th>
			<th> Qty </th>
			<th> Price </th>
			<th width="10px"> Total </th>
			<th> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
			$tot=0.0;
				$idd=$_GET['invoice'];
				$result = $db->prepare("SELECT
				new_purchase.new_purchase_id,
				new_purchase.code,
				new_purchase.qty,
				new_purchase.price
				
				 
				FROM
				new_purchase
				WHERE new_purchase.invoice_number= :userid");
				$result->bindParam(':userid', $idd);
				$result->execute();
				for($i=1; $row = $result->fetch(); $i++){
					$total=$row['code'];
					
				$result1 = $db->prepare("SELECT name FROM product WHERE bar_code='$total'");
				$result1->execute();
				for($i=0; $rows = $result1->fetch(); $i++){
				
				$name=$rows['name'];
				}
				$bal=0.0;
				
				$bal=$row['qty'] * $row['price'];
				$tot=$tot+$bal;
			?>
			<tr class="record">
			<td><?php echo $row['code']; ?></td>
			<td><?php echo $name; ?></td>
			<td><?php echo $row['qty'];?></td>
			<td><?php echo $row['price'];
			?></td>
			<td>
			<?php
			
			echo formatMoney($bal, true);
			?>
			</td>
			
			
			<td width="100"><a href="deletepur.php?id=<?php echo $row['code']; ?>&dle=<?php echo $_GET['invoice']; ?>&qty=<?php echo $row['qty'];?>&code=<?php echo $row['new_purchase_id'];?>"><button class="btn btn-mini btn-warning"><i class="icon icon-remove"></i> Cancel </button></a></td>
			</tr>
			<?php
				}
			?>
			<tr>
			<th> </th>
			<th>  </th>
			<th>  </th>
			<th>  </th>
			
			<td> Total Amount: </td>
			<th>  </th>
		</tr>
			<tr>
				<th colspan="4"><strong style="font-size: 12px; color: #222222;">Total:</strong></th>
				<td colspan="1"><strong style="font-size: 12px; color: #222222;">
				<?php
				
				echo formatMoney($tot, true);
				
				?>
				</strong></td>
				<th></th>
			</tr>
		
	</tbody>
</table><br>
<form method="POST">
<button name="suball" id="suball" class="btn btn-success btn-large pull-right"> Submit All</button>
</form>
<?php if(isset($_POST['suball'])){
	echo "<script>alert('All entries submitted');</script>";
	echo "<script type='text/javascript'> document.location ='stock.php'; </script>";
} ;?>
<div class="clearfix"></div>
            </div>
          </div>
          <!-- End Panel Standard Mode -->
		</div>
      </div>
    </div>
  </div>
  <!-- End Page -->
<script src="global/vendor/jquery/jquery.min599c.js?v4.0.2"></script>
  
<script type="text/javascript">

function RestrictSpace() {
    if (event.keyCode == 32) {
        return false;
    }
}

function default_focus(){
	document.getElementById('bar_code_1').focus();
}

function get_detail(b,n){
	var nx = n+1;
	
	$.ajax({  
		type:"POST",  
		url:"ajax_product.php",  
		data:{bar_code:b,action_type:"get_detail"},
		success:function(data){
			var data = $.parseJSON(data);
			if(data.type == 'Success'){
				
				//Check Duplicate Value
				var barCode = document.querySelectorAll("#dd input[name='bar_code[]']");
				for(key=0; key < barCode.length - 1; key++)  {
					if(barCode[key].value == data.bar_code){
						alert("Already Exist");
						document.getElementById('bar_code_'+n).value = '';
						document.getElementById('bar_code_'+n).focus();
						return false;
					}					
				}
				
				//var newRow = $('#app tbody').append('<tr id='+nx+'><td><input type="text"  class="form-control" onkeypress="return RestrictSpace()" onchange="get_detail(this.value,'+nx+')" id="bar_code_'+nx+'" name="bar_code[]" required /></td><td><select name="name[]" id="name_'+nx+'" class="form-control" onchange="get_detail_name(this.value,'+nx+')" required ><option value="">Choose Product</option><?php $sqlP = $conn->query("SELECT * FROM product WHERE status = 1 ORDER BY name ASC"); while($rowP = $sqlP->fetch_array()){?><option value="<?php echo $rowP['name'];?>"><?php echo $rowP['name'];?></option><?php }?></select></td><td><input type="text" id="alias_'+nx+'" class="form-control" onkeypress="return RestrictSpace()" onchange="get_detail_alias(this.value,'+nx+')" name="alias[]" /></td><td><input type="text"  id="mrp_'+nx+'" readonly class="form-control" name="mrp[]" required /></td><td><input type="number" id="quantity_'+nx+'" step="0.001" class="form-control" onkeyup="calculate_price(this.value,'+nx+')" name="quantity[]" required /></td><td><input type="text" id="av_quantity_'+nx+'" readonly class="form-control" name="av_quantity[]" /></td><td><input type="number" id="sale_price_'+nx+'"  class="form-control" onkeyup="get_quantity(this.value,'+nx+')" name="sale_price[]" step="0.01" required /><input type="hidden" class="form-control" id="sale_price_org_'+nx+'" name="sale_price_org[]" /><input type="hidden" class="form-control" id="igst_'+nx+'" name="igst[]" /></td><td><a href="#" onclick="remove_data('+ nx +')" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row" data-toggle="tooltip" data-original-title="Remove">Delete</a></td></tr>');
				document.getElementById('name_'+n).value = data.name;
				document.getElementById('alias_'+n).value = data.alias;
				document.getElementById('mrp_'+n).value = data.mrp;
				document.getElementById('quantity_'+n).value = 1;
				document.getElementById('av_quantity_'+n).value = data.av_quantity;
				document.getElementById('sale_price_'+n).value = data.sale_price;
				document.getElementById('sale_price_org_'+n).value = data.sale_price;
				document.getElementById('igst_'+n).value = data.igst;
				
				//Get Value For Total
				var salePrice = document.querySelectorAll("#dd input[name='sale_price[]']");
				var newA = [];
				for(key=0; key < salePrice.length; key++)  {
					if(salePrice[key].value != ''){
						newA.push(parseFloat(salePrice[key].value));
					}
				}
				var aac = newA.reduce(getSum);
				document.getElementById('getTotal').value = Math.round(parseFloat(aac));
				
				document.getElementById('bar_code_'+nx).focus();
			}else{
				alert("Barcode Not Found");
				//document.getElementById('bar_code_'+n).value = '';
				document.getElementById('bar_code_'+n).focus();
				return false;
			}
		}  
	});
}

function get_detail_name(i,n){
	var nx = n+1;
	
	$.ajax({  
		type:"POST",  
		url:"ajax_product.php",  
		data:{name:i,action_type:"get_detail_by_name"},
		success:function(data){ 
			var data = $.parseJSON(data);
			if(data.type == 'Success'){
				
				//Check Duplicate Value
				var barCode = document.querySelectorAll("#dd input[name='bar_code[]']");
				for(key=0; key < barCode.length - 1; key++)  {
					if(barCode[key].value == data.bar_code){
						alert("Already Exist");
						return false;
					}					
				}
								
				//Appending New Row
				//var newRow = $('#app tbody').append('<tr id='+nx+'><td><input type="text"  class="form-control" onkeypress="return RestrictSpace()" onchange="get_detail(this.value,'+nx+')" id="bar_code_'+nx+'" name="bar_code[]" required /></td><td><select name="name[]" id="name_'+nx+'" class="form-control" onchange="get_detail_name(this.value,'+nx+')" required ><option value="">Choose Product</option><?php $sqlP = $conn->query("SELECT * FROM product WHERE status = 1 ORDER BY name ASC"); while($rowP = $sqlP->fetch_array()){?><option value="<?php echo $rowP['name'];?>"><?php echo $rowP['name'];?></option><?php }?></select></td><td><input type="text" id="alias_'+nx+'" class="form-control" onkeypress="return RestrictSpace()" onchange="get_detail_alias(this.value,'+nx+')" name="alias[]" /></td><td><input type="text"  id="mrp_'+nx+'" readonly class="form-control" name="mrp[]" required /></td><td><input type="number" id="quantity_'+nx+'" step="0.001" class="form-control" onkeyup="calculate_price(this.value,'+nx+')" name="quantity[]" required /></td><td><input type="text" id="av_quantity_'+nx+'" readonly class="form-control" name="av_quantity[]" /></td><td><input type="number" id="sale_price_'+nx+'" onkeyup="get_quantity(this.value,'+nx+')"  class="form-control" name="sale_price[]" step="0.01" required /><input type="hidden" class="form-control" id="sale_price_org_'+nx+'" name="sale_price_org[]" /><input type="hidden" class="form-control" id="igst_'+nx+'" name="igst[]" /></td><td><a href="#" onclick="remove_data('+ nx +')" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row" data-toggle="tooltip" data-original-title="Remove">Delete</a></td></tr>');
				document.getElementById('bar_code_'+n).value = data.bar_code;
				document.getElementById('alias_'+n).value = data.alias;
				document.getElementById('mrp_'+n).value = data.mrp;
				document.getElementById('quantity_'+n).value = 1;
				document.getElementById('av_quantity_'+n).value = data.av_quantity;
				document.getElementById('sale_price_'+n).value = data.sale_price;
				document.getElementById('sale_price_org_'+n).value = data.sale_price;
				document.getElementById('igst_'+n).value = data.igst;
				
				//Get Value For Total
				var salePrice = document.querySelectorAll("#dd input[name='sale_price[]']");
				var newA = [];
				for(key=0; key < salePrice.length; key++)  {
					if(salePrice[key].value != ''){
						newA.push(parseFloat(salePrice[key].value));
					}
				}
				var aac = newA.reduce(getSum);
				document.getElementById('getTotal').value = Math.round(parseFloat(aac));
				
				document.getElementById('name_'+nx).focus();
			}else{
				alert("Prduct Not Found!");
			}
		}  
	});
}

function get_detail_alias(a,n){
	var nx = n+1;
	
	$.ajax({  
		type:"POST",  
		url:"ajax_product.php",  
		data:{alias:a,action_type:"get_detail_by_alias"},
		success:function(data){
			
			var data = $.parseJSON(data);
			if(data.type == 'Success'){
				
				//Check Duplicate Value
				var aliasA = document.querySelectorAll("#dd input[name='alias[]']");
				for(key=0; key < aliasA.length - 1; key++)  {
					if(aliasA[key].value == data.alias){
						alert("Alias Exist");
						document.getElementById('alias_'+n).value = '';
						document.getElementById('alias_'+n).focus();
						return false;
					}					
				}
				
				var newRow = $('#app tbody').append('<tr id='+nx+'><td><input type="text"  class="form-control" onkeypress="return RestrictSpace()" onchange="get_detail(this.value,'+nx+')" id="bar_code_'+nx+'" name="bar_code[]" required /></td><td><select name="name[]" id="name_'+nx+'" class="form-control" onchange="get_detail_name(this.value,'+nx+')" required ><option value="">Choose Product</option><?php $sqlP = $conn->query("SELECT * FROM product WHERE status = 1 ORDER BY name ASC"); while($rowP = $sqlP->fetch_array()){?><option value="<?php echo $rowP['name'];?>"><?php echo $rowP['name'];?></option><?php }?></select></td><td><input type="text" id="alias_'+nx+'" class="form-control" onkeypress="return RestrictSpace()" onchange="get_detail_alias(this.value,'+nx+')" name="alias[]" /></td><td><input type="text"  id="mrp_'+nx+'" readonly class="form-control" name="mrp[]" required /></td><td><input type="number" id="quantity_'+nx+'" step="0.001" class="form-control" onkeyup="calculate_price(this.value,'+nx+')" name="quantity[]" required /></td><td><input type="text" id="av_quantity_'+nx+'" readonly class="form-control" name="av_quantity[]" /></td><td><input type="number" id="sale_price_'+nx+'"  class="form-control" onkeyup="get_quantity(this.value,'+nx+')" name="sale_price[]" step="0.01" required /><input type="hidden" class="form-control" id="sale_price_org_'+nx+'" name="sale_price_org[]" /><input type="hidden" class="form-control" id="igst_'+nx+'" name="igst[]" /></td><td><a href="#" onclick="remove_data('+ nx +')" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row" data-toggle="tooltip" data-original-title="Remove">Delete</a></td></tr>');
				document.getElementById('name_'+n).value = data.name;
				document.getElementById('bar_code_'+n).value = data.bar_code;
				document.getElementById('mrp_'+n).value = data.mrp;
				document.getElementById('quantity_'+n).value = 1;
				document.getElementById('av_quantity_'+n).value = data.av_quantity;
				document.getElementById('sale_price_'+n).value = data.sale_price;
				document.getElementById('sale_price_org_'+n).value = data.sale_price;
				document.getElementById('igst_'+n).value = data.igst;
				
				//Get Value For Total
				var salePrice = document.querySelectorAll("#dd input[name='sale_price[]']");
				var newA = [];
				for(key=0; key < salePrice.length; key++)  {
					if(salePrice[key].value != ''){
						newA.push(parseFloat(salePrice[key].value));
					}
				}
				var aac = newA.reduce(getSum);
				document.getElementById('getTotal').value = Math.round(parseFloat(aac));
				
				document.getElementById('bar_code_'+nx).focus();
			}else{
				alert("Alias Not Found");
				document.getElementById('alias_'+n).value = '';
				document.getElementById('alias_'+n).focus();
				return false;
			}
		}  
	});
}

function calculate_price(q,n){
	var sale_price_org = document.getElementById('sale_price_org_'+n).value;
	var sp = document.getElementById('sale_price_'+n).value;
	//var total = document.getElementById('getTotal').value;
	var gt = document.getElementById('sale_price_'+n).value = (sale_price_org * q).toFixed(2);
	
	
	var salePrice = document.querySelectorAll("#dd input[name='sale_price[]']");

	var newA = [];
	for(key=0; key < salePrice.length ; key++)  {
		if(salePrice[key].value != ''){
			newA.push(parseFloat(salePrice[key].value));
		}
	}
	
	//alert(newA);
	var aac = newA.reduce(getSum);
	document.getElementById('getTotal').value = Math.round(parseFloat(aac));
	//alert(aac);
	//document.getElementById('getTotal').value = Math.round((parseFloat(total) - parseFloat(sp)) + parseFloat(gt));
}

function getSum(total, num) {
  return parseFloat(total + num);
}
function get_quantity(p,n){
	
	var salePrice = document.querySelectorAll("#dd input[name='sale_price[]']");

	var newA = [];
	for(key=0; key < salePrice.length; key++)  {
		if(salePrice[key].value != ''){
			newA.push(parseFloat(salePrice[key].value));
		}
	}
	
	//alert(newA);
	var aac = newA.reduce(getSum);
	document.getElementById('getTotal').value = Math.round(parseFloat(aac));
	//alert(aac);
	
	
	var sale_price_org = document.getElementById('sale_price_org_'+n).value;
	var spgF = parseFloat(sale_price_org);
	var sp = document.getElementById('sale_price_'+n).value;
	var spF = parseFloat(sp);
	document.getElementById('quantity_'+n).value = (p/parseFloat(sale_price_org)).toFixed(3);
		
}

function remove_data(r){
	$('#'+r).remove();
	//Get Value For Total
	var salePrice = document.querySelectorAll("#dd input[name='sale_price[]']");
	var newA = [];
	for(key=0; key < salePrice.length; key++)  {
		if(salePrice[key].value != ''){
			newA.push(parseFloat(salePrice[key].value));
		}
	}
	var aac = newA.reduce(getSum);
	document.getElementById('getTotal').value = Math.round(parseFloat(aac));
	
}
</script>


<script type="text/javascript">
$(".billingForm").submit(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    var form = $(this);
    var url = form.attr('action');
    $.ajax({
		type: "POST",
		url: "ajax_sale.php",
		data: form.serializeArray(), // serializes the form's elements.
		success: function(data){
			if(data != "ERROR"){
				//alert("Done");
				document.location.reload(true);
			}else{
				alert("Something Went Wrong, Please Try Again !");
			}
		}
	});
});

</script>
 <?php include("../includes/footer.php"); ?>
</body>
</html>