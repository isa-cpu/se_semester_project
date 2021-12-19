<?php 
    include("../includes/head.php");
    include("../includes/connect2.php");
?>
<!-- header links -->
<link href="css/bootstrap-responsive.css" rel="stylesheet">

	  <script src="vendors/jquery-1.7.2.min.js"></script>
    <script src="vendors/bootstrap.js"></script>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->
<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
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
                    <h2>Dasboard/</h2><span>Price</span>
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
<input type="text" name="filter" style="padding:10px; width:200px" id="filter" placeholder="Search..." autocomplete="off" />
<a rel="facebox" href="addprice.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px; /><i class="icon-plus-sign icon-large"></i> Add Price</button></a><br><br>

<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="10%"> Product Code </th>
			<th width="17%"> Product Name </th>
			
			<th width="10%"> Price</th>
			<th width="14%"> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				$result = $db->prepare("SELECT
				product.bar_code,
				product.product_id,
				product.name,
				product.sale_price
				FROM
				product
				");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['bar_code']; ?></td>
			<td><?php echo $row['name']; ?></td>
			
			<td><?php echo $row['sale_price']; ?></td>
			<td><a  title="Click To Edit Price" rel="facebox" href="editprice.php?id=<?php echo $row['product_id']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button></a>

			<a href="#" id="<?php echo $row['product_id']; ?>" class="delbutton" title="Click To Delete"><button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Delete</button></a></td>
			</tr>
			<?php
				}
			?>
		
	</tbody>
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
 if(confirm("Are you sure want to delete? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deleteprice.php",
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