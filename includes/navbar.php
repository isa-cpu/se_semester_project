<!--  -->

              <div class="top_nav">
            <div class="nav_menu" style="background:#0fafef; color:white">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav" id="nav-work">
                  <div class="calender">
                    <span class="mydate"><i class="fa fa-calendar center-new"></i>
                  <?php echo gmdate("D, F j, Y")?>
                  </span>
                  </div>
                <div class="ul-container">
                   <ul class=" navbar-right" syle="color:white">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="images/img.jpg" alt=""><?php echo $_SESSION['firstname']." ".$_SESSION['lastname'];?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="javascript:;"><?php echo $_SESSION['accountType']?></a>
                      <a class="dropdown-item"  href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
  
                 
                  
                  </li>
                </ul>
                </div>
               
              </nav>
            </div>
          </div>
