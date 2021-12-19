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
                    <h2>Dasboard/</h2><span>Users</span>
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
 <?php 
				$result = $db->prepare("SELECT * FROM users ORDER BY user_id DESC");
				$result->execute();
				$rowcount = $result->rowcount();
			?>

			<div style="text-align:center;">
			Total Number of Users: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $rowcount;?></font>
			</div>
</div>
<input type="text" name="filter" style="height:35px; margin-top: -1px; width:200px" value="" id="filter" placeholder="Search users..." autocomplete="off" />
<a rel="facebox" href="#" data-bs-toggle="modal" data-placement="top" data-bs-target="#exampleModal"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i>Create A User</button></a><br><br>
 <table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th> First Name </th>
			<th> Last Name </th>
			<th> Username </th>
			<th> Password</th>
			<th> Account Type</th>
			<th width="120"> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				$result = $db->prepare("SELECT * FROM users ORDER BY user_id DESC");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['firstname']; ?></td>
			<td><?php echo $row['lastname']; ?></td>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['pwd']; ?></td>
			<td><?php echo $row['accountType']; ?></td>
			<td>
      

			<a href="#" id="<?php echo $row['user_id']; ?>" class="delbutton" title="Click To Delete"><button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Delete</button></a></td>
			</tr>
			<?php
				}
			?>
		
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
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i>Create A User</h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">
               <form action="saveusers.php" method="post">
                First Name: <input type="text" name="firstname" class="form-control"><br>
                Last Name.: <input type="text" name="lastname" placeholder="last name" class="form-control"> <br>
                 Username Name: <input type="text" name="username" class="form-control"><br>
                Password: <input type="password" name="pwd" placeholder="password" class="form-control"> <br>
                Account Type: <select name="accountType" type="number" class="form-control" readonly>
                 <option value="0">Admin</option>
                   <option value="2">Sales Person</option>
                </select> <br>
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

<!-- js -->
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
   url: "deleteuser.php",
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