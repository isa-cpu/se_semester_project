<?php 
    include("../includes/head.php");
				include("../includes/connect2.php");
?>
<!-- header links -->

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
  <div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="dashboard.php"><button class="btn btn-info" style=""><i class="fa fa-arrow-left"></i> Back</button></a>
<button  style="float:right;" class="btn btn-success btn-mini"><a href="javascript:Clickheretoprint()"> Print</button></a>



</div>
<form action="sreport.php" method="get">
<center><strong>From : <input type="date" autocomplete="off" style="width: 223px; padding:14px;" name="d1" class="tcal" value="" /> To: <input type="date" autocomplete="off" style="width: 223px; padding:14px;" name="d2" class="tcal" value="" />
 <button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" type="submit"><i class="icon icon-search icon-large"></i> Search</button>
 </strong></center>
</form>
 <br>
<div class="content" id="content">
<div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">
Sales Report from&nbsp;<?php echo $_GET['d1'] ?>&nbsp;to&nbsp;<?php echo $_GET['d2'] ?>
</div>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="13%"> Transaction ID</th>
			<th width="13%"> Transaction Date </th>
			<th width="13%"> Transaction Type </th>
			<th width="15%"> Cashier Name </th>
			<th width="12%"> Receipt Number </th>
			<th width="12%"> Amount </th>
			<th width="12%"> Time </th>
			<th width="15%">Action</th>
		</tr>
	</thead>
	<tbody>
		
			
				<?php
				//$dat1=date("Y/m/d");
				//$dat2=date("Y/m/d");
				$d1=$_GET['d1'];
				$d2=$_GET['d2'];
				$_SESSION['d1']=$_GET['d1'];
				$_SESSION['d2']=$_GET['d2'];
				$dat1=str_replace("-","/","$d1");
				$dat2=str_replace("-","/","$d2");
				$result1 = $db->prepare("SELECT sales.sales_id,sales.invoice_number, sales.sales_person, sales.sales_date, sales.type,sales.amount,sales.salestime FROM sales WHERE sales_date BETWEEN :a AND :b AND (sales_type='Sales' || sales_type='Credit-Sale') ORDER by sales_person DESC ");
				$result1->bindParam(':a', $dat1);
				$result1->bindParam(':b', $dat2);
				$result1->execute();
				for($i=0; $row1 = $result1->fetch(); $i++){
					$dat1=$row1['invoice_number'];
			?>
			
			<tr class="record">
			<td>STI-00<?php echo $row1['sales_id']; ?></td>
			<td><?php echo $row1['sales_date']; ?></td>
			<td><?php echo $row1['type']; ?></td>
			<td><?php echo $row1['sales_person']; ?></td>
			<td><?php echo $row1['invoice_number']; ?></td>
			<td><?php
			$dsdsd=$row1['amount'];
			echo formatMoney($dsdsd, true);
			?></td>
			<td><?php
			echo $row1['salestime'];
			
			?></td>
			<td>
<a href="#?id=<?php echo htmlentities($row1['invoice_number']); ?>&cas=<?php echo $dat2; ?>" class="btn btn-info btn-sm btn-labeled pull-left"><i class="fa fa-edit" style="font-size:15px;color:white" title="Edit user"></i>View</a>
<!--<label><a href="#" id=<?php// echo htmlentities($row1['invoice_number']); ?> class="cid btn btn-warning btn-sm btn-labeled pull-right"><i class="fa fa-edit" style="font-size:15px;color:white" title="Edit user"></i>Delete</a> </label>-->

</td>
			</tr>
			<?php
				}
			?>
		
	</tbody>
	<thead>
		<tr>
			<th colspan="5" style="border-top:1px solid #999999"> Total Cash Sales Today: </th>
			<th colspan="1" style="border-top:1px solid #999999"> 
			<?php
			$d1=$_GET['d1'];
				$d2=$_GET['d2'];
				$dat1=str_replace("-","/","$d1");
				$dat2=str_replace("-","/","$d2");
				$results = $db->prepare("SELECT sum(amount),sales_person FROM sales WHERE sales_date BETWEEN :a AND :b AND type='cash' AND (sales_type='Credit-Sale' || sales_type='Sales')");
				$results->bindParam(':a', $dat1);
				$results->bindParam(':b', $dat2);
				$results->execute();
				for($i=0; $rows = $results->fetch(); $i++){
				$dsdsd=$rows['sum(amount)'];
				$eee=$rows['sales_person'];
				$_SESSION['cashsale']=$dsdsd;
				echo 'GHS '.formatMoney($dsdsd, true);
				//echo ' '.$eee."<br>".'GHS ' .$dsdsd."<br>";
				}
				?>
			</th>
		</tr>
	</thead>
	<thead>
		<tr>
			<th colspan="5" style="border-top:1px solid #999999"> Total Credit Sales Today: </th>
			<th colspan="1" style="border-top:1px solid #999999"> 
			<?php
			$d1=$_GET['d1'];
				$d2=$_GET['d2'];
				$dat1=str_replace("-","/","$d1");
				$dat2=str_replace("-","/","$d2");
				$results = $db->prepare("SELECT sum(amount),sales_person FROM sales WHERE sales_date BETWEEN :a AND :b AND type='credit' GROUP by sales_person");
				$results->bindParam(':a', $dat1);
				$results->bindParam(':b', $dat2);
				$results->execute();
				for($i=0; $rows = $results->fetch(); $i++){
				$dsdsd1=$rows['sum(amount)'];
				$eee=$rows['sales_person'];
				$_SESSION['creditsales']=$dsdsd1;
				//echo 'GHS '.formatMoney($dsdsd1, true);
				echo ' '.$eee."<br>".'GHS ' .$dsdsd1."<br>";
				}
				?>
			</th>
		</tr>
	</thead>
	<thead>
		<tr>
			<th colspan="5" style="border-top:1px solid #999999"> Total Credit Paid Today </th>
			<th colspan="1" style="border-top:1px solid #999999"> 
			<?php
				$d1=$_GET['d1'];
				$d2=$_GET['d2'];
				$dat1=str_replace("-","/","$d1");
				$dat2=str_replace("-","/","$d2");
				$results = $db->prepare("SELECT sum(amount) FROM credit_sales WHERE credit_date BETWEEN :a AND :b AND sales_type='credit paid'");
				$results->bindParam(':a', $dat1);
				$results->bindParam(':b', $dat2);
				$results->execute();
				for($i=0; $rows = $results->fetch(); $i++){
				$dsds=$rows['sum(amount)'];
				//$eee=$rows['cashier'];
				$_SESSION['creditpaid']=$dsds;
				$balan=$dsdsd-$dsds;
				$tamt=formatMoney($dsds, true);
				//echo ' '.$eee."<br>".'GHS ' .$dsds."<br>";
				echo ('GHS'.' '.$tamt);
				}
				?>
			</th>
		</tr>
	</thead>
	
	
	
	
	

		<thead>
		<tr>
			<th colspan="5" style="border-top:1px solid #999999"> Total Sales Today: </th>
			<th colspan="1" style="border-top:1px solid #999999"> 
			<?php
			$d1=$_GET['d1'];
				$d2=$_GET['d2'];
				$dat1=str_replace("-","/","$d1");
				$dat2=str_replace("-","/","$d2");
			$results = $db->prepare("SELECT sum(amount) FROM sales WHERE sales_date BETWEEN :a AND :b AND type='cash' AND (sales_type='Credit-Sale' || sales_type='Sales')");
				$results->bindParam(':a', $dat1);
				$results->bindParam(':b', $dat2);
				$results->execute();
				for($i=0; $rows = $results->fetch(); $i++){
				$dsdsd=$rows['sum(amount)'];
				
				}
				
				$tol1=0;
				$tol=0;
				//$s=$_SESSION['exp'];
				//$t=$_SESSION['ecash'];
				//$tol=$s+$t;
				$today=$dsdsd + $dsds;
				//$_SESSION['totalsales']=$today;
				$tol1=$today;
				//$_SESSION['totalsales']=$tol1;
				//$tol1=$today;
				//$tol2=$tol1+$incom;
				$_SESSION['totalsales']=$tol1;
				$_SESSION['bal']=$tol1;
				echo 'GHS '.formatMoney($tol1, true);
				//$today=$dsdsd + $dsds;
				//$_SESSION['totalsales']=$today;
				//echo 'GHS '.formatMoney($today, true);
				
				?>
			</th>
		</tr>
	</thead>
</table>
    
                 <!-- page content ends -->

<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deletesales.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>


<?php include("../includes/footer.php"); ?>