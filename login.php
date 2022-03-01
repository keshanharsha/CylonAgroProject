<?php session_start(); ?>
<?php include_once('db/conn.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; Mr Lorry</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/izitoast/css/iziToast.min.css">
  <link rel="stylesheet" href="assets/modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">

  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script src="assets/modules/izitoast/js/iziToast.min.js"></script>

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<style>
  body{
    background-image: url("assets/img/3dasssets.jpg");
    background-size: cover; 
    background-repeat: no-repeat;
    background-position: center center; 
  }
</style>
<?php

if (isset($_POST['login'])) {

  if (!isset($_POST['username']) || strlen(trim($_POST['username']))<1) {
    array_push($error, "Missing / invalied User Name</font>");
  }
  if (!isset($_POST['password']) || strlen(trim($_POST['password']))<1) {
    array_push($error, "Missing / invalied Password</font>");
  }

  if (count($error)==0) { 
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $password_enc=md5($password);

    $sql="SELECT * FROM users WHERE un='$username' AND pswd='$password_enc' LIMIT 1";
    $result=mysqli_query($conn,$sql);

    if ($result) {
      
      

      if (mysqli_num_rows($result)==1) {
          $res=mysqli_fetch_assoc($result);

           $_SESSION['user_name']=$res['un'];
           $_SESSION['fname']=$res['fname'];
           $_SESSION['lname']=$res['lname'];
           $_SESSION['privileges']=$res['privileges'];
          
          header('location:index.php');
          

        }else{
          array_push($error,'<script> iziToast.error({
            title: "Invalied Username or Password",
            position: "topRight"
            });</script>');
        } 
    }else{
      array_push($error,'<script> iziToast.error({
        title: "Invalied Username or Password",
        position: "topRight"
        });</script>');
    }

  }else{
    echo('err');
  }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
</script>
</head>
  <?php if (isset($error)&&!empty($error) ) {
      include_once('db/error.php');
  } ?>
<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">

        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="assets/img/logo1.png" alt="logo" width="250" >
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>
              <div class="card-body">
                <form method="POST" class="needs-validation" novalidate="">
                <form method="POST" action="" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">User Name</label>
                    <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your User Name
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <a href="auth-forgot-password.html" class="text-small">
                          Forgot Password?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4" name="login">
                      Login
                    </button>
                  </div>
                </form>
                Don't have an account? <a href="register_user.php">Create One</a>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              
            </div>
            <div class="simple-footer" style="color: #fff;">
              Copyright &copy; UnKnown Solutions 2022
            </div>
          </div>
          
        </div>

      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>

<?php 
include('db/error.php');
?>
</body>
</html>

