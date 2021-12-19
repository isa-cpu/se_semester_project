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
    <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Dasboard/</h2><span>Credit Summary</span>
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
  <table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="10%"> Invoice Number </th>
			
			<th width="10%"> Sales Person</th>
			<th width="10%"> Name</th>
			<th width="6%"> Date </th>
			<th width="6%"> Sale Type </th>
			<th width="6%"> Amount </th>
			<th width="6%"> Balance </th>
			<th width="8%"> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
			$b=$_GET['id'];
			
				$result = $db->prepare("SELECT * FROM credit_sales WHERE name='$b' ORDER BY id ASC");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
				$total=$row['invoice_number'];
				
				
				
				// $result2 = $db->prepare("SELECT name FROM product WHERE bar_code='$total3'");
				// $result2->execute();
				// for($i=0; $row2 = $result2->fetch(); $i++){
				// $total2=$row2['name'];
				// }
				
				
			?>
		

			<td><?php echo $row['invoice_number']; ?></td>
			
			<td><?php echo $row['sales_person'];?></td>
			<td><?php echo $row['name'];?></td>
			<td><?php echo $row['credit_date']; ?></td>
			<td><?php echo $row['sales_type']; ?></td>
			<td><?php echo $row['amount']; ?></td>
				<td><?php echo $row['balance'];?></td>
			<?php 
			if($total !=55555){
				?>
				
				<td><a rel="facebox" href="viewcredit.php?id=<?php echo $row['invoice_number']; ?>"><button class="btn btn-warning"><i class="icon-edit"></i> View </button> </a>
                 </td>
			<?php
			}else{ ?>
				<td>
     </td>
				
			<?php	
			}
			?>
			
			
			
			</tr>
			<?php
				}
			?>
		
		
		
	</tbody>
</table>                  

                 <!-- page content ends -->




              <?php include("../includes/footer.php"); ?>