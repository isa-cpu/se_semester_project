<?php 
    include("../includes/head.php");
    include("../includes/connect2.php");
?>
<!-- header links -->
<?php
$invoice=$_GET['invoice'];
$result = $db->prepare("SELECT * FROM sales WHERE invoice_number= :userid");
$result->bindParam(':userid', $invoice);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$invoice=$row['invoice_number'];
$date=$row['sales_date'];
$cash=$row['due_date'];
$cashier=$row['sales_person'];
$rtim=$row['salestime'];
$trans=$row['sales_id'];
$pt=$row['type'];
$am=$row['amount'];
if($pt=='cash'){
$cash=$row['due_date'];
$amount=$cash-$am;
}
}
?>

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
                    <h2>Dasboard/</h2><span>Creditors</span>
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
 <div class="content" id="content">
<div style="margin: 0 auto; padding: 10px; width: 120px; font-weight: 900; ">
	<div style="width: 100%; height: 190px"; >
	<div style="width: 300px; float: center;">
	<center><div style="font:bold 25px 'Aleo';">Cash Sales Receipt</div>
	ReCAS Mini-Mart <br>
<br>	<br>
	</center>
	<div>
	<?php
	$resulta = $db->prepare("SELECT * FROM customer WHERE cus_name= :a");
	$resulta->bindParam(':a', $cname);
	$resulta->execute();
	for($i=0; $rowa = $resulta->fetch(); $i++){
	$address=$rowa['cus_address'];
	$contact=$rowa['cus_contact'];
	}
	
	$resultb = $db->prepare("SELECT salestime FROM sales WHERE invoice_number= :userid");
	$resultb->bindParam(':userid', $id);
	$resultb->execute();
	for($i=0; $rowb = $resultb->fetch(); $i++){
	$rtime=$rowb['salestime'];
	
	
	}
	//echo $id;
	?>
	</div>
	</div>
	
	
	<div style="width: 400px; float: center;">
	<table cellpadding="3" cellspacing="0" style="font-family: arial; font-size: 12px;text-align:center;width : 100%;">

		<tr>
			<td style="font-weight: 900">OR No. :</td>
			<td style="font-weight: 900;font-size: 20px"><?php echo $invoice ?></td>
			<td style="font-weight: 900;font-size: 20px"><?php echo 'Ref#: '.$trans ?></td>
			
		</tr>
		<tr>
			<td style="font-weight: 900">Date :</td>
			<td style="font-weight: 900;font-size: 20px"><?php echo $date ?></td>
			<td style="font-weight: 900;font-size: 20px"><?php echo $rtim ?></td>
		</tr>
		
	</table>
	
	</div>
<!-- 	<div class="clearfix"></div>
 -->	</div>
 
	<div style="width: 100%; margin-top:-40px;">
	<table border="1" cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 25px;	text-align:center;" width="90%">
		<thead>
			<tr>
				<!--<th width="90"> Product Code </th>-->
				<th> Product Name </th>
				<th> Qty </th>
				<th> Price </th>
				<th> Dis </th>
				<th> Amount </th>
			</tr>
		</thead>
		<tbody>
			
				<?php
					$id=$_GET['invoice'];
					$result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
					$result->bindParam(':userid', $id);
					$result->execute();
					for($i=0; $row = $result->fetch(); $i++){
				?>
				<tr class="record">
				<!--<td><?php// echo $row['product_code']; ?></td>-->
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['qty']; ?></td>
				<td>
				<?php
				$ppp=$row['price'];
				echo formatMoney($ppp, true);
				?>
				</td>
				<td>
				<?php
				$ddd=$row['discount'];
				echo formatMoney($ddd, true);
				?>
				</td>
				<td>
				<?php
				$dfdf=$row['amount'];
				echo formatMoney($dfdf, true);
				?>
				</td>
				</tr>
				<?php
					}
				?>
			
				<tr>
					<td colspan="4" style=" text-align:right;"><strong style="font-size: 25px;">Total: &nbsp;</strong></td>
					<td colspan="1"><strong style="font-size: 25px;">
					<?php
					$sdsd=$_GET['invoice'];
					$resultas = $db->prepare("SELECT sum(amount) FROM sales_order WHERE invoice= :a");
					$resultas->bindParam(':a', $sdsd);
					$resultas->execute();
					for($i=0; $rowas = $resultas->fetch(); $i++){
					$fgfg=$rowas['sum(amount)'];
					echo formatMoney($fgfg, true);
					}
					?>
					</strong></td>
				</tr>
				<?php if($pt=='cash'){
				?>
				<tr>
					<td colspan="4"style=" text-align:right;"><strong style="font-size: 25px; color: #222222;">Cash Tendered:&nbsp;</strong></td>
					<td colspan="1"><strong style="font-size: 25px; color: #222222;">
					<?php
					echo formatMoney($cash, true);
					?>
					</strong></td>
				</tr>
				<?php
				}
				?>
				<tr>
					<td colspan="4" style=" text-align:right;"><strong style="font-size: 25px; color: #222222;">
					<font style="font-size:25px;">
					<?php
					if($pt=='cash'){
					echo 'Change:';
					}
					if($pt=='credit'){
					echo 'Due Date:';
					}
					?>&nbsp;
					</strong></td>
					<td colspan="2"><strong style="font-size: 25px; color: #222222;">
					<?php
					if($pt=='credit'){
					echo $cash;
					}
					if($pt=='cash'){
					echo formatMoney($amount, true);
					}
					?>
					</strong></td>
				</tr>
				<tr><td colspan="6">	<center><strong>Thanks for coming. Do come again.<p>Call us on 0540307609 </p></strong></center></td></tr>
		</tbody>
	</table>
	<br/>
	
<div id="part">

<hr style="border: 1px solid black;width : 450px;">

  







</div>
	<hr>
	</div>
	</div>
	</div>
	</div>

<!-- <div class="pull-right" style="margin-right:100px;" type="hidden">
		
<a href="javascript:Clickheretoprint()" style="font-size:20px;"><button class="btn btn-success btn-large"><i class="icon-print"></i> Print</button></a>
<br/> -->
<br/>
<div class="checkbox">
  <label><input type="hidden" id="box" value="" onclick="myFunction()"></label>
</div>
		</div>	
</div>
</div>
<script>
function myFunction() {
	
	
	if(document.getElementById("box").checked){
		document.getElementById("part").style.display="none";
		
	}else{
		document.getElementById("part").style.display="block";
		
	}
	//var a,b;
	//a=document.getElementById("amount").value;
	//b=document.getElementById("cash").value;
	
		//if (b >= a){
		//x.style.background = "yellow";
		//document.getElementById('choose').disabled = false;
	//}else{
		//alert("You have entered an amount less than the total payment");
	//}
	
	
  
}
</script>                

                 <!-- page content ends -->




              <?php include("../includes/footer.php"); ?>