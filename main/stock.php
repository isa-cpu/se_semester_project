<?php 
    include("../includes/head.php");
    include("../includes/connect.php");
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
<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="dashboard.php"><button class="btn btn-info" style="float: none;"><i class="fa fa-arrow-left"></i> Back</button></a>
</div>

<a rel="facebox" href="#" data-bs-toggle="modal" data-placement="top" data-bs-target="#exampleModal"><Button type="submit" class="btn btn-info"  style="float:right; width:230px; height:35px;"

/><i class="icon-plus-sign icon-large"></i> Add Stock</button></a><br><br>

<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="15%"> Invoice Number </th>
			<th width="15%"> Date </th>
			<th width="15%"> Supplier </th>
			<th width="15%"> Remarks </th>
			<th width="15%"> Action </th>
		</tr>
	</thead>
	<tbody>
	<?php 
  $default = 0;
    $stmtstock = $conn->prepare("SELECT * FROM purchases ORDER BY purchase_id DESC");
    $stmtstock->execute();
    $stmtstock->store_result();

    if($stmtstock->num_rows > 0){
      $stmtstock->bind_result($purchase_id,$invoice_number,$purchase_date,$supplier,$remarks);

      while($stmtstock->fetch()){

      }
    }
  ?>
		
			<tr class="record">
			<td><?php echo $invoice_number; ?></td>
			<td><?php echo $purchase_date; ?></td>
			<td><?php echo $supplier; ?></td>
			<td><<?php echo $remarks;?></td>
			<td>
			<a href="#" id="<?php echo $row['purchase_id']; ?>" class="delbutton" title="Click To Delete"><button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Delete </button></a></td>
			</tr>
		
		
	</tbody>
</table>                    
<!-- my modal -->
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
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i>Add Stock</h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">
               <form action="savepurchase.php" method="post">
                Date: <input type="date" name="purchase_date" class="form-control"><br>
                Invoice No.: <input type="text" name="invoice_number" placeholder="Invoice" class="form-control"> <br>
                Supplier: <select name="supplier" id="" class="form-control" readonly>
                 <?php
                include('../includes/connect2.php');
                $result = $db->prepare("SELECT * FROM suppliers");
                  $result->bindParam(':userid', $res);
                  $result->execute();
                  for($i=0; $row = $result->fetch(); $i++){
                ?>
                  <option><?php echo $row['supplier_name']; ?></option>
                <?php
                }
                ?>
                </select> <br>
                 <input type="hidden" name="remarks" placeholder="Remark" class="form-control"><br>
                <button class="btn-success btn-add" type="submit" name="submit">Add</button>
               
               </form>
               <?php 
                $stmttotalinvoice = $conn->prepare("SELECT invoice_number FROM purchases ORDER BY purchase_id DESC LIMIT 1");
                $stmttotalinvoice->execute();
                $stmttotalinvoice->store_result();

                if($stmttotalinvoice->num_rows > 0){
                 $stmttotalinvoice->bind_result($invoice_number);
                 while($stmttotalinvoice->fetch()){
                  
                 }
                }
                ?>
              </div>
              
              <div class="modal-footer">
                <button
                  
                  type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal"
                >
                
                  <?php //echo $invoice_number;?>
                </button>
              </div>
            </div>
          </div>
        </div>
<!-- modal ends -->
                 <!-- page content ends -->
</div>
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
   url: "deletepppp.php",
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