<?php 
    include("../includes/head.php");
    include("../includes/connect2.php");
    include("config1.php");
?>
<!-- header links -->
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container" id="main-cont">
        <div class="col-md-3 left_col" style="background:#0fafef">
          <div class="left_col scroll-view" style="background:#0fafef">
            <div class="navbar nav_title" style="border: 0;">
              <span><a href=""><img src="../images/recas.png" alt="recas logo" class="recas"></a></span>
            <a href="index.html" class="site_title"> <span>ReCAS MiniMart</span></a>
            </div>

            <div class="clearfix"></div>

     

            <br />

            <!-- sidebar menu -->
           <?php include("../includes/sidebar.php"); ?>
           
           
        
          </div>
        </div>

        <!-- top navigation -->
       <?php include("../includes/navbar.php"); ?>

        <!-- /top navigation -->
         <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
               
              </div>

              
            </div>

         <div class="clearfix"></div>


  <!-- page content here -->
    <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Dasboard/</h2><span>Sales</span>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <!-- main content -->
<form action="incomingcredit.php" method="post" >
<table id="app">
					<thead>
						<th>Barcode</th>
						<th>Product Name</th>
						<th></th>
						<th></th>
						<th></th>
						<th>Available Quantity</th>
						<th>Sale Price</th>
					</thead>
					<tbody>
					<tr id="1">
						<td>
							<input type="text" id="bar_code_1" required class="form-control" onkeypress="return RestrictSpace()" onchange="get_detail(this.value,1)" name="bar_code[]" style=" height:25px;"/>
						</td>
					<td>
						<select name="name[]" id="name_1" class="form-control" onchange="get_detail_name(this.value,1)" style="width: 400px; height:35px;">
							<option value="">Choose Product</option>
							<?php $sqlP = $conn->query("SELECT * FROM product ORDER BY name ASC");
							while($rowP = $sqlP->fetch_array()){?>
							<option value="<?php echo $rowP['name']?>"><?php echo $rowP['name'];?></option>
							<?php }?>
						</select>
					</td>
					<td width="0%">
							<input type="hidden" id="alias_1" class="form-control" onkeypress="return RestrictSpace()" onchange="get_detail_alias(this.value,1)" name="alias[]" />
						</td>
					<td width="0%">
						<input type="hidden" required class="form-control" readonly id="mrp_1" name="mrp[]" />
					</td>
					<td width="0%">	
						<input type="hidden" class="form-control" onkeyup="calculate_price(this.value,1)" step="1" id="quantity_1" name="quantity[]" />
					</td>
					<td>
						<input type="text" readonly class="form-control" id="av_quantity_1" name="av_quantity[]" style=" height:25px;"/>
					</td>
					<td>
						<input type="number" required class="form-control" onkeyup="get_quantity(this.value,1)" step="0.01" id="sale_price_1" name="sale_price[]" style=" height:25px;"/>
						<input type="hidden" class="form-control" id="sale_price_org_1" name="sale_price_org[]" />
						<input type="hidden" class="form-control" id="igst_1" name="igst[]" />
					</td>
				</tr>
				</tbody>
				
				</table>
				

<input type="hidden" name="pt" value="<?php echo $_GET['id']; ?>" />
<input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>" />

Qty <br/>
<input type="number" name="qty" value="1" min="1" placeholder="Qty" autocomplete="off" style="width: 68px; height:25px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" / required>
<input type="hidden" class="number" name="discount" min="0" value="0" autocomplete="off" style="width: 68px; height:25px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" />
<input type="hidden" name="date" value="<?php echo date("m/d/Y"); ?>" />
<Button type="submit" class="btn btn-info" style="width: 123px; height:35px; margin-top:-5px;" /><i class="icon-plus-sign icon-large"></i> Add</button>
</form>
<!-- tables --> 
<table class="table table-bordered" id="resultTable" data-responsive="table">
	<thead>
		<tr>
			<th> Product Code </th>
			<th> Product Name </th>
			<th> Qty </th>
			<th> Price </th>
			<th> Discount </th>
			<th> Amount </th>
			<th> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				$id=$_GET['invoice'];
				$result = $db->prepare("SELECT
				sales_ordercredit.transaction_id,
				sales_ordercredit.invoice,
				sales_ordercredit.product,
				sales_ordercredit.qty,
				sales_ordercredit.amount,
				sales_ordercredit.product_code,
				sales_ordercredit.`name`,
				sales_ordercredit.price,
				sales_ordercredit.discount,
				sales_ordercredit.rdate
				FROM
				sales_ordercredit
				WHERE sales_ordercredit.invoice= :userid");
				$result->bindParam(':userid', $id);
				$result->execute();
				for($i=1; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['product_code']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['qty'];
			?></td>
			<td>
			<?php
			$ppp=$row['price'];
			echo formatMoney($ppp, true);
			?>
			</td>
			<td><?php echo $row['discount'].'%'; ?></td>
			<td>
			<?php
			$dfdf=$row['amount'];
			echo formatMoney($dfdf, true);
			?>
			</td>
			<td width="90"><a href="deletecredit.php?pcode=<?php echo $row['product_code']; ?>&id=<?php echo $row['transaction_id']; ?>&invoice=<?php echo $_GET['invoice']; ?>&dle=<?php echo $_GET['id']; ?>&qty=<?php echo $row['qty'];?>&code=<?php echo $row['product'];?>"><button class="btn btn-mini btn-warning"><i class="icon icon-remove"></i> Cancel </button></a></td>
			</tr>
			<?php
				}
			?>
			<tr>
			<th> </th>
			<th>  </th>
			<th>  </th>
			<th>  </th>
			<th>  </th>
			<td> Total Amount: </td>
			<th>  </th>
		</tr>
			<tr>
				<th colspan="5"><strong style="font-size: 12px; color: #222222;">Total:</strong></th>
				<td colspan="1"><strong style="font-size: 12px; color: #222222;">
				<?php
				$sdsd=$_GET['invoice'];
				$resultas = $db->prepare("SELECT sum(amount) FROM sales_ordercredit WHERE invoice= :a");
				$resultas->bindParam(':a', $sdsd);
				$resultas->execute();
				for($i=0; $rowas = $resultas->fetch(); $i++){
				$fgfg=$rowas['sum(amount)'];
				echo formatMoney($fgfg, true);
				}
				?>
				</strong></td>
				<th></th>
			</tr>
		
	</tbody>
</table><br>
<a rel="facebox" href="checkoutcredit.php?pt=<?php echo $_GET['id']?>&invoice=<?php echo $_GET['invoice']?>&total=<?php echo $fgfg ?>&cashier=<?php echo $_SESSION['SESS_FIRST_NAME']?>"><button class="btn btn-success btn-large pull-right"><i class="icon icon-save icon-large"></i> SAVE</button></a>
         
                      <!-- main content ends -->
                </div>
              </div>
            </div>

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
				alert("Done");
				document.location.reload(true);
			}else{
				alert("Something Went Wrong, Please Try Again !");
			}
		}
	});
});

</script>
  <!-- page content ends -->




              <?php include("../includes/footer.php"); ?>