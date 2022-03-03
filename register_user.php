<?php
 include_once('db/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; Mr Lorry</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="assets/modules/izitoast/css/iziToast.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
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
<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
               <img src="assets/img/logo1.png" alt="logo" width="250" >
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>
              <div class="card-body">
                <form method="POST" action="#" class="needs-validation" novalidate="">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="frist_name">First Name</label>
                      <input id="frist_name" type="text" class="form-control" name="frist_name" required autofocus>
                      <div class="invalid-feedback">
                        Enter First Name
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="last_name">Last Name</label>
                      <input id="last_name" type="text" class="form-control" name="last_name">
                      <div class="invalid-feedback">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email">
                      <div class="invalid-feedback">
                      Enter email
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="un">User Name</label>
                        <input id="uname" type="text" class="form-control" name="username">
                      <div class="invalid-feedback">
                      Enter Username
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="password_confirm">
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="register_user">
                      Register
                    </button>
                  </div>

                </form>
                Do you have an account? <a href="login.php">Login Now</a>
              </div>
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
  <script src="assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="assets/modules/jquery-selectric/jquery.selectric.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets/js/page/auth-register.js"></script>
  <script src="assets/modules/sweetalert/sweetalert.min.js"></script>

  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>

      <!-- Page Specific JS File -->
<script src="assets/modules/izitoast/js/iziToast.min.js"></script>


  <?php
  

  if (isset($_POST['register_user']) && isset($_POST['agree'])) {
    // get values
    $frist_name=mysqli_real_escape_string($conn, $_POST['frist_name']);
    $last_name=mysqli_real_escape_string($conn, $_POST['last_name']);
    $email=mysqli_real_escape_string($conn, $_POST['email']);
    $username=mysqli_real_escape_string($conn, $_POST['username']);
    $password=mysqli_real_escape_string($conn, $_POST['password']);
    $password_confirm=mysqli_real_escape_string($conn, $_POST['password_confirm']);
    
    // error check
    if (empty($frist_name)) {
      array_push($error, '<script> iziToast.error({
				title: "Enter First Name",
				position: "topRight"
			  });</script>');
    }
 
    if (empty($email)) {
      array_push($error, '<script> iziToast.error({
				title: "Enter email",
				position: "topRight"
			  });</script>');
    }
    if (empty($username)) {
      array_push($error, '<script> iziToast.error({
				title: "Enter User Name",
				position: "topRight"
			  });</script>');
    }
    if (empty($password)) {
      array_push($error, '<script> iziToast.error({
				title: "Enter Password",
				position: "topRight"
			  });</script>');
    }
    if (empty($password_confirm)) {
      array_push($error, '<script> iziToast.error({
				title: "Enter Conform Password",
				position: "topRight"
			  });</script>');
    }


//echo($array);
    // check dual records
    if($password==$password_confirm){

      //encrypt
      $password_enc=md5($password);

      //filter from database
      $sql_select="SELECT * FROM users WHERE  un='$username' OR email='$email' LIMIT 1";
      $result=mysqli_query($conn, $sql_select);
      $user=mysqli_fetch_array($result);

      // print errors
      if ($user) {
        if ($user['un']===$username) {
            array_push($error, '<script> iziToast.warning({
              title: "User Name Isalredy Exits!",
              message: "this username is taken use another username",
              position: "topRight"
            });</script>');
        }
        if ($user['email']===$email) {
            array_push($error, '<script> iziToast.warning({
              title: "Email Isalredy Exits!",
              message: "this email is taken use another email",
              position: "topRight"
            });</script>');
        }
      }
        

      // if error free save data to database
      //  users_id  un  pswd  fname lname email active_status delete_status last_active_time  privilages_privilages_id  
 

      if(count($error)==0){
        $sql="INSERT INTO users(un, pswd, fname, lname, 	email, 	active_status, delete_status, last_active_time, privilages_privilages_id)
              VALUES('$username', '$password_enc', '$frist_name', '$last_name', '$email', 0, 0, NOW(), 1)";
        mysqli_query($conn, $sql);
        
        echo '<script> swal("Good Job", "You Succesfully registerd !", "success"),window.location = "login.php"; </script>';
        exit();
//,window.location.href = "login.php";
      }else{
        if (isset($error)&&!empty($error) ) {
            include_once('db/error.php');
        }

      }
      
    }
}

  ?>
</body>
</html>