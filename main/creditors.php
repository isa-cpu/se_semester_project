<?php 
    include("../includes/head.php");
    include("../includes/connect2.php");
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
<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
<?php 
				$result = $db->prepare("SELECT * FROM customer ORDER BY cus_id DESC");
				$result->execute();
				$rowcount = $result->rowcount();
			?>
			<div style="text-align:center;">
			Total Number of Customers: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $rowcount;?></font>
			</div>
</div>
<input type="text" name="filter" style="padding:15px; width:200px" id="filter" placeholder="Search Customer..." autocomplete="off" />
 <?php
	 // if($position=='admin' || $position=='manager') {
?> 
  <a rel="facebox" href="#"><Button type="submit" class="btn btn-info" data-bs-toggle="modal" data-placement="top" data-bs-target="#exampleModal" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Add Customer</button></a>
 
  
<a rel="" href="creditSales.php?id=cash&invoice=<?php echo $finalcode ?>"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Credit Sales</button></a><br><br>

<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="17%"> Full Name </th>
			<th width="20%"> Address </th>
			<th width="10%"> Contact Number</th>
			<th width="10%"> Balance</th>
			<th width="10%"> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				$result = $db->prepare("SELECT * FROM customer ORDER BY cus_id DESC");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['cus_name']; ?></td>
			<td><?php echo $row['cus_address']; ?></td>
			<td><?php echo $row['cus_contact']; ?></td>
			<td><?php echo $row['cus_balance']; ?></td>

			<td><a  title="Click To Edit Customer" rel="facebox" href="customerpay.php?id=<?php echo $row['cus_id']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Pay </button></a> 

			<a  title="Click To Edit Customer" rel="" href="creditsummary.php?id=<?php echo $row['cus_name']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> View </button></a> 

		
			</td>
			</tr>
			<?php
				}
			?>
		
	</tbody>
</table>
<!-- modal here -->
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
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i>Add Customer</h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">
               <form action="savecustomer.php" method="post">
                Full Name: <input type="text" name="name" class="form-control"><br>
                Address: <input type="text" name="address" placeholder="" class="form-control"> <br>

                Contact No.: <input type="text" name="contact" placeholder="" class="form-control"> <br>

                Balance: <input type="number" name="balance" placeholder="" class="form-control"> <br>
                <button class="btn-success btn-add" type="submit" name="submit">Add</button>
              </div>
              
              <div class="modal-footer">
                
              </div>
            </div>
          </div>
        </div>
<!-- modal ends -->

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
 if(confirm("Are you sure want to delete? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deletecustomer.php",
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
                 <!-- page content ends -->




              <?php include("../includes/footer.php"); ?>