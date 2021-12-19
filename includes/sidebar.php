 <br>
 <br>
 <br><br><br><br><br><br><br><br><br><br>

 <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                
                <ul class="nav side-menu">
                  <li><a href="dashboard.php"><i class="fa fa-home"></i> Home 
                  </li>
                  <li><a><i class="fa fa-edit"></i> Sales <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>>">Make Sales</a></li>
                      <li><a href="stock.php">Stock</a></li>
                      <li><a href="orderproduct.php?id=cash&invoice=<?php echo $finalcode ?>">Make Request</a></li>
                      <li><a href="approverequest.php?id=cash&invoice=<?php echo $finalcode ?>">Request Approvals</a></li>
                      <!-- access constraint -->
                      <?php
                      if(!empty($_SESSION['accountType']) && $_SESSION['accountType'] == 1){
                      ?>
                      <li><a href="sreport.php">Sales Report</a></li>
                      <li><a href="price.php">Prices</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Products<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="product.php">Manage Products</a></li>
                      <li><a href="preport.php">Product Report</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Stock <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="stock.php">Manage Stock</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Bills <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="creditSales.php">Manage Credit</a></li>
                      <li><a href="#">Generate Bill</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Suppliers <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="suppliers.php">Manage Suppliers</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Users <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="users.php">Manage User</a></li>
                    </ul>
                  </li>
                </ul>
                <?php
                      }
                      ?>
              </div>

            </div>

            <!--  -->
             <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>