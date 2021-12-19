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
                    <h2>Dasboard/</h2><span>Products</span>
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
  <a rel="facebox" href="addgroup.php"><Button type="submit" class="btn btn-info" style="float:right; width:150px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Create Category</button></a>
<a rel="facebox" href="#"><Button type="submit" class="btn btn-info" style="float:right; width:150px; height:35px;" data-bs-toggle="modal" data-placement="top" data-bs-target="#exampleModal"/><i class="icon-plus-sign icon-large"></i> Add Product</button></a><br><br>


<button  style="" class="btn btn-success btn-mini"><a href="javascript:Clickheretoprint()"> Print</button></a>
<br/><br/>
  <table class="table table-striped table-bordered" id="example">
      <thead>
        <tr>
          <th width="12%"> Product Code </th>
			<th width="13%"> Product Name </th>
			<th width="6%"> Selling Price </th>
			<th width="5%"> Qty Left </th>
			<th width="8%"> Total </th>
			<th width="8%"> Action </th>
        </tr>
      </thead>
	  <tbody>
		
			<?php
				$result = $db->prepare("SELECT *, sale_price * unit as total FROM product ORDER BY name asc");
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
			</td>			<td>
			
			<a rel="facebox" title="Click to edit the product" href="editproductd.php?id=<?php echo $row['bar_code']; ?>"><button class="btn btn-warning"><i class="icon-edit"></i> Edit/Alter</button> </a>
			</td>
			</tr>
			<?php
				}
			?>
		<tfoot>
		<tr>
		 <th colspan="3" style="text-align:right">Total:</th>
                <th></th>
                
                <th></th>
            </tr>
		</tfoot>
		
		
	</tbody>
    </table>  
 <!-- modal starts -->
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
                Selling Price: <input type="text" name="price" placeholder="Selling Price" class="form-control"><br>
                Original Price: <input type="text" name="o_price" placeholder="o_price" class="form-control"><br>
                Quantity: <input type="text" name="qty" placeholder="Quantity" class="form-control"><br>
                <button class="btn-success btn-add" type="submit" name="submit">Add</button>
               
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
 <!-- modal ends -->

                 <!-- page content ends -->




              <?php include("../includes/footer.php"); ?>