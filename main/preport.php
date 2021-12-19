<?php 
  include("../includes/head.php");
		include('../includes/connect2.php'); 
	 include("config1.php");

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
<a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
<button  style="float:right;" class="btn btn-success btn-mini"><a href="javascript:Clickheretoprint()"> Print</button></a>

</div>


<form  action="preport.php" method="get">



<select name="group" id="group" class="form-control" style="float:left; width:150px; height:35px;" onchange="document.getElementById('txtMode').value=this.options[this.selectedIndex].value">
							<option value="">Select Category</option>
							<?php $sqlP = $conn->query("SELECT DISTINCT(cat) FROM product WHERE cat !='' ORDER BY cat ASC");
							while($rowP = $sqlP->fetch_array()){?>
							<option value="<?php echo $rowP['cat']?>"><?php echo $rowP['cat'];?></option>
							<?php }?>
							
						</select>
						<a rel="" href=""><Button type="submit" name="repd" class="btn btn-info" style="float:left; width:150px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Details</button></a>

						<input type="hidden" class="form-control"  id="txtMode" name="txtMode" readonly />
						

</form>


 
<div class="content" id="content">
<div style="font-weight:bold; text-align:center;font-size:20px;margin-bottom: 15px;">
PRODUCT REPORT FOR &nbsp;<?php echo $_GET['group'].'<br/>'. date('Y/m/d') ?>
</div>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="12%"> Product Code </th>
			<th width="13%"> Product Name </th>
			<th width="6%"> Selling Price </th>
			<th width="5%"> Qty Left </th>
			<th width="8%"> Total </th>
			
		</tr>
	</thead>
	<tbody>
		
			<?php
			$rrr=$_GET['group'] ;
			$rrr1=$_GET['veh1'] ;
			if($rrr1==''){
				$result = $db->prepare("SELECT *, sale_price * unit as total FROM product WHERE cat='$rrr' AND name !='' ORDER BY bar_code DESC");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
				$total=$row['total'];
				$availableqty=$row['unit'];
				if ($availableqty < 10) {
				//echo '<tr class="alert alert-warning record" style="color: #fff; background:rgb(255, 95, 66);">';
				}
				else {
				echo '<tr class="record">';
				}
				
			?>
		

			<td><?php echo $row['bar_code']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php
			$pprice=$row['sale_price'];
			echo formatMoney($pprice, true);
			?></td>
			<td><?php echo $row['unit']; ?></td>
			<td>
			<?php
			$total=$row['total'];
			echo formatMoney($total, true);
			?>
			
			</tr>
			<?php
				}
			}else{
				$result = $db->prepare("SELECT *, sale_price * unit as total FROM product WHERE cat='$rrr' AND name !='' and unit >0 ORDER BY bar_code DESC");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
				$total=$row['total'];
				$availableqty=$row['unit'];
				if ($availableqty < 10) {
				//echo '<tr class="alert alert-warning record" style="color: #fff; background:rgb(255, 95, 66);">';
				}
				else {
				echo '<tr class="record">';
				}
				
			?>
		

			<td><?php echo $row['bar_code']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php
			$pprice=$row['sale_price'];
			echo formatMoney($pprice, true);
			?></td>
			<td><?php echo $row['unit']; ?></td>
			<td>
			<?php
			$total=$row['total'];
			echo formatMoney($total, true);
			?>
			
			</tr>
			<?php
				}
				
			}
			?>
		
		
		
	</tbody>
	<thead>
		<tr>
			<th colspan="2" style="border-top:1px solid #999999"> Total </th>
			<th colspan="1" style="border-top:1px solid #999999"> 
			<?php
			$rrr=$_GET['group'] ;
				$dsds = 0.0;
				$dsds1 = 0.0;
				$dsds2 = 0.0;
				$results = $db->prepare("SELECT *, sale_price * unit as total FROM product WHERE cat='$rrr' AND name !='' ORDER BY bar_code DESC");
				//$results->bindParam(':a', $d1);
				//$results->bindParam(':b', $d2);
				$results->execute();
				for($i=0; $rows = $results->fetch(); $i++){
				$dsds =$dsds + $rows['sale_price'];
				$dsds1 =$dsds1 + $rows['unit'];
				$dsds2 =$dsds2 + $rows['total'];
				//$balan=$dsdsd-$dsds;
				
				}
				$tamt=formatMoney($dsds, true);
				//echo// ('GHS'.' '.$tamt);
				?>
			</th>
			<th colspan="1" style="border-top:1px solid #999999"> 
			<?php
			$tamt1=formatMoney($dsds1, true);
				echo ($tamt1);

			;?>
			</th>
			<th colspan="1" style="border-top:1px solid #999999"> 
			
			<?php
			$tamt2=formatMoney($dsds2, true);
				echo ('GHS'.' '.$tamt2);

			;?>
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