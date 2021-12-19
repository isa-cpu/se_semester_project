<?php session_start();
  include("includes/connect.php");
  include("includes/connect2.php");

  if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    // checking if the user exist
    $stmt = $conn->prepare("SELECT firstname,lastname,username,pwd,accountType FROM users WHERE username = '$username' AND pwd = '$pwd'");
    $stmt->bind_param("ssssi",$firstname, $lastname,$username,$pwd,$accountType);
    $stmt->execute();
    $stmt->store_result();

    // now if the exist then extract some component for section info
    if($stmt->num_rows > 0){
      $stmt->bind_result($firstname,$lastname,$username,$pwd,$accountType);
      $stmt->fetch();
      $stmt->close();
      
      $_SESSION['firstname'] = $firstname;
      $_SESSION['lastname'] = $lastname;
      $_SESSION['accountType'] = $accountType;

      // give access
      if($_SESSION['accountType'] == 2){
        header("Location: main/sales.php?id=cash&invoice= $finalcode");
      }else{
      header("Location: main/dashboard.php");
      echo "login successfull";
      }
    }else{
      echo "login not successful";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ReCAS Mini-Mart | </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="" method="post"> 
              <h1>ReCAS Mini-Mart</h1>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="pwd" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href=""><button type=submit name="submit">Log In</button></a>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-shopping-cart"></i> </h1>
                  <p>© <?php echo gmdate('Y')?> All Rights Reserved. ReCAS Mini-Mart ||&nbsp Powered by <a href="">opeitechinnovations</a></p>
                </div>
              </div>
            </form>
          </section>
        </div>

        
      </div>
    </div>
  </body>
</html>
