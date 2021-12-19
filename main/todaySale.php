
<?php 
    include("../includes/head.php");
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
    <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Dasboard/</h2><span>Stock</span>
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
                    <div style="font-weight:bold; text-align:center;font-size:25px;margin-bottom: 15px;">
 <br/>
Today Sales Report  &nbsp;&nbsp; <?php echo 'SALES DATE: '.date('Y/m/d');?>

</div>
<input type="text" name="filter" value="" id="filter" style="width:550px; padding:20px;" placeholder="Search Product..." autocomplete="off" /> 
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="20%"> Product Code</th>
			<th width="20%"> Product Name </th>
			<th width="20%"> Qty </th>
			<th width="20%"> Amount </th>
			
		</tr>
	</thead>
	<tbody>
		
			
	

			
			<tr class="record">
			
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			
			
			
			</tr>
		
		
	</tbody>
	<thead>
		
	</thead>
	<thead>
		<tr>
			<th colspan="2" style="border-top:1px solid #999999"> Total Quantity: </th>
			<th colspan="1" style="border-top:1px solid #999999"> 
		
			</th>
		</tr>
	</thead>
	<thead>
		<tr>
			<th colspan="3" style="border-top:1px solid #999999"> Total Cash Sales Today: </th>
			<th colspan="1" style="border-top:1px solid #999999"> 
		
			</th>
		</tr>
	</thead>
	<thead>
		<tr>
			<th colspan="3" style="border-top:1px solid #999999"> Total Credit Sales Today: </th>
			<th colspan="1" style="border-top:1px solid #999999"> 
		
			</th>
		</tr>
	</thead>
	<thead>
		<tr>
			<th colspan="3" style="border-top:1px solid #999999"> Total Credit Paid Today </th>
			<th colspan="1" style="border-top:1px solid #999999"> 
			
			</th>
		</tr>
	</thead>
		<thead>
		<tr>
			<th colspan="3" style="border-top:1px solid #999999"> Total Sales Today: </th>
			<th colspan="1" style="border-top:1px solid #999999"> 
			
			</th>
		</tr>
	</thead>
</table>                    


                 <!-- page content ends -->




              <?php include("../includes/footer.php"); ?>
