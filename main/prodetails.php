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
                    <h2>Dasboard/</h2><span>Product Details</span>
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
 <form  action="productbymonth.php" method="POST">
<a rel="" href=""><Button type="submit" name="repd" class="btn btn-info" style="float:right; width:200px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Details</button></a>



<select name="group" id="group" class="form-control" style="float:right; width:230px; height:35px;" onchange="document.getElementById('txtMode').value=this.options[this.selectedIndex].value">
							<option value="">Select Month</option>
							
							<option value="1">January</option>
							<option value="2">Februry</option>
							<option value="3">March</option>
							<option value="4">April</option>
							<option value="5">May</option>
							<option value="6">June</option>
							<option value="7">July</option>
							<option value="8">August</option>
							<option value="9">September</option>
							<option value="10">October</option>
							<option value="11">Noverber</option>
							<option value="12">December</option>
							
						</select>
						<input type="hidden" class="form-control"  id="txtMode" name="txtMode" readonly />
						

</form>

<table class="hoverTable tabel table-striped table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
		    <th width="12%">  </th>
			<th Colspan="3"> Inwards </th>
			
			<th Colspan="3"> Outwards </th>
			<th Colspan="3"> Closing </th>
			
			
			
		</tr>
		<tr>
		    <th width="12%"> Month </th>
			<th width="12%"> Qty </th>
			<th width="12%"> Rate </th>
			<th width="12%"> Value </th>
			<th width="12%"> Qty </th>
			<th width="12%"> Rate </th>
			<th width="12%"> Value </th>
			<th width="12%"> Qty </th>
			<th width="12%"> Rate </th>
			<th width="12%"> Value </th>
			
			
		</tr>
	</thead>
	<tbody>
	

		
		
		
			
		    <tr>
             <td>January</td>
		<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			</tr>
			<tr>
             <td>Februry</td>
			
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			</tr>
			<tr>
             <td>March</td>
			
		<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			</tr>
			<tr>
             <td>April</td>
			
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			</tr>
			<tr>
             <td>May</td>
			
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			</tr>
			<tr>
             <td>June</td>
			
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			</tr>
			<tr>
             <td>July</td>
			
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			</tr>
			<tr>
             <td>August</td>
			
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			</tr>
			<tr>
             <td>September</td>
			
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			</tr>
			<tr>
             <td>October</td>
			
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			</tr>
			<tr>
             <td>Noverber</td>
			
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			</tr>
			<tr>
  <td>December</td>
			
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			</tr>
			
		
		
		
	</tbody>
	
</table>

                 <!-- page content ends -->




              <?php include("../includes/footer.php"); ?>