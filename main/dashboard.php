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
<!-- content here -->
            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Dasboard</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="dash-container">
                        <a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>" id="a">
                        <div class="sales dash-items" >
                          <i class="fa fa-shopping-cart center"></i>
                          
                            <p>Sales</p>
                        </div></a>
                        
                      
                        <!-- access -->
                        <?php
                        if(!empty($_SESSION['accountType']) && $_SESSION['accountType'] == 1){
                        ?>
                        
                        <a href="products.php" id="d"><div class="credit dash-items">
                          <i class="fa fa-list center"></i>
                          <p>Products</p>
                        </div></a>

                         <a href="price.php" id="b"><div class="products dash-items">
                         <i class="fa fa-money center"></i> 
                        <p>
                          Prices
                        </p>

                        </div></a>
                        
                        <a href="sreport.php?d1=0&d2=0" id="c"><div class="prices dash-items">
                          <i class="fa fa-bar-chart center"></i>
                          <p>Sales Report</p>
                        </div></a>
                        
                        <a href="preport.php" id="e"><div class="sreport dash-items">
                          <i class="fa fa-bar-chart center"></i>
                          <p>Product Report</p>
                        </div></a>

                         <a href="creditors.php" id="g"><div class="suppliers dash-items">
                          <i class="fa fa-credit-card center"></i>
                          <p>Creditors</p>
                        </div></a>

                        <a href="stock.php" id="f"><div class="bill dash-items">
                          <i class="fa fa-truck center"></i>
                          <p>Stock</p>
                        </div></a>
                        
                        
                        
                        <a href="suppliers.php" id="i"><div class="stock dash-items">
                          <i class="fa fa-group center"></i>
                          <p>Suppliers</p>
                        </div></a>
                        <?php
                        }
                        ?>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- page content -->
       
          <!-- /top tiles -->


          <br />


         
        </div>
        <!-- /page content -->

        <!-- footer content -->
        
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <?php include("../includes/footer.php"); ?>

