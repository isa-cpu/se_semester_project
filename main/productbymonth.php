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
                    <h2>Dasboard/</h2><span>Sales Report</span>
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
 <input type="text" style="padding:15px;" name="filter" value="" id="filter" placeholder="Search Product..." autocomplete="off" />

<br><br>
<table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
<thead>
		<tr>
		
			<th width="12%"> </th>
			<th width="13%"> </th>
			<th width="6%">  </th>
			<th width="6%">  </th>
			<th width="6%"> </th>
			<th colspan="3" align="centre"> Inflow </th>
			<th colspan="3"> Outflow</th>
			
			
		</tr>
	</thead>
	<thead>
		<tr>
			<th width="12%"> Product Code </th>
			<th width="12%"> Date</th>
			<th width="13%"> Product Name </th>
			<th width="6%"> Status </th>
			<th width="6%"> </th>
			<th width="5%"> Pre. Qty </th>
			<th width="5%"> Qty </th>
			<th width="5%"> Total </th>
			<th width="5%"> Pre. Qty </th>
			<th width="5%"> Qty </th>
			<th width="5%"> Total </th>
			<th width="15%" hidden> Action - Edit</th>
		</tr>
	</thead>
	<tbody>
		

				
	
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			
				
		
			<td>
			
			</td>			
			<td>
			
			</td>
			<td colspan="3"></td>
			
			
			
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			
				<td colspan="3"></td>

				<td></td>
			<td>
		
			</td>			
			<td>
	
			</td>
			
			
				
			
			
			</tr>
		
		
		

		
		
	</tbody>
	
	<thead>
		<tr>
			<th colspan="6" style="border-top:1px solid #999999"> Total Qty Inflow: </th>
			<th colspan="1" style="border-top:1px solid #999999"> 
		
			</th>
			<th colspan="1" style="border-top:1px solid #999999"></th>
		</tr>
	</thead>
	<thead>
		<tr>
			<th colspan="9" style="border-top:1px solid #999999"> Total Qty Outflow: </th>
			<th colspan="1" style="border-top:1px solid #999999"> 
			
			</th>
			<th colspan="1" style="border-top:1px solid #999999"></th>
		</tr>
	</thead>
	<thead>
		<tr>
			<th colspan="9" style="border-top:1px solid #999999"> Total Qty Left: </th>
			<th colspan="1" style="border-top:1px solid #999999"> 
		
			</th>
			<th colspan="1" style="border-top:1px solid #999999"></th>
		</tr>
	</thead>
</table>                   

                 <!-- page content ends -->




              <?php include("../includes/footer.php"); ?>