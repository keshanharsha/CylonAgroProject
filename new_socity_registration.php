<!-- header navigation bar -->
<?php session_start(); ?>

<?php 
if (!isset($_SESSION['user_name'])) {
  echo "<script>window.open('login.php','_self')</script>";
}else{

    // $access=$_SESSION['previlage'];
    // $extra_previlages=$_SESSION['extra_previlages'];
    // if ((strpos($extra_previlages , 'o') !== false) || (strpos($access , 'o') !== false)) {
    //   $updated_user=$_SESSION['iduser'];
 
    // users_id, un, pswd, fname, lname, email, active_status, delete_status, last_active_time, privilages_privilages_id
  include_once('includes/header.php');
?>
 <div class="navbar-bg" style="height: 75px;"></div>
      <div class="main-content">
          <section class="section">

            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Register New Socity</h4>
                  </div>
                  <div class="card-body">
                    <form action="" method="post">
                    <div class="row">
                      <div class="form-group col-md-3">
                        <label>Socity Name</label>
                        <input type="text" name="sname" class="form-control">
                      </div>
                      <div class="form-group col-md-3">
                        <label>Contact No</label>
                        <input type="text" name="tp" class="form-control">
                      </div>
                      <div class="form-group col-md-3">
                        <label>Email</label>
                        <input type="email" name="email1" class="form-control">
                      </div>
                      <div class="form-group col-md-3">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control">
                      </div>
                      <div class="form-group col-md-3">
                        <label>logo</label>
                        <input type="file" name="image" class="form-control">
                      </div>
                      <div class="form-group col-md-3">
                        <label>username</label>
                        <input type="text" name="user_name" class="form-control">
                      </div>
                      <div class="form-group col-md-3">
                        <label>Password</label>
                        <input type="Password" name="password" class="form-control">
                      </div>
                      <div class="form-group col-md-3">
                        <label>Re Enter Password</label>
                        <input type="Password" name="re_password" class="form-control">
                      </div>
                    </div>
                     <div class="form-group">
                        <button class="btn btn-icon icon-left btn-primary" type="submit" name="register"><i class="fa fa-plus"></i> Register Socity</button>
                        <a href="manage_socities.php" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i> Cancel</a>
                     </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </section>
      </div>
 <?php 
 
 include_once('includes/footer.php');
 
if(isset($_POST["register"])){
  $sname=mysqli_real_escape_string($conn, $_POST['sname']);
  $tp=mysqli_real_escape_string($conn, $_POST['tp']);
  $email1=mysqli_real_escape_string($conn, $_POST['email1']);
  $address=mysqli_real_escape_string($conn, $_POST['address']);
  $user_name=mysqli_real_escape_string($conn, $_POST['user_name']);
  $password=mysqli_real_escape_string($conn, $_POST['password']);
  $re_password=mysqli_real_escape_string($conn, $_POST['re_password']);

     // error check
    if (empty($sname)) {
      array_push($error, '<script> iziToast.error({
				title: "Enter socity Name",
				position: "topRight"
			  });</script>');
    }
    if (empty($sname)) {
        array_push($error, '<script> iziToast.error({
                  title: "Enter socity Name",
                  position: "topRight"
                });</script>');
      }
 
    if (empty($email1)) {
      array_push($error, '<script> iziToast.error({
				title: "Enter email",
				position: "topRight"
			  });</script>');
    }
    if (empty($user_name)) {
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
    if (empty($re_password)) {
      array_push($error, '<script> iziToast.error({
				title: "Enter Conform Password",
				position: "topRight"
			  });</script>');
    }
    // check dual records
    if($password==$re_password){

            //encrypt
            $password_enc=md5($password);

            $sql_select2="SELECT * FROM users WHERE email='$email1' OR un='$user_name'";
            $result2=mysqli_query($conn, $sql_select2);

            // print errors
            while( $user=mysqli_fetch_array($result2)) {
              
              if ($user['email']==$email1) {
                array_push($error, '<script> iziToast.warning({
                  title: "Email Is alredy Exits!",
                  message: "this email is taken use another email",
                  position: "topRight"
                });</script>');
              }
              if ($user['un']==$user_name) {
                  array_push($error, '<script> iziToast.warning({
                    title: "User Name Is alredy Exits!",
                    message: "this username is taken use another username",
                    position: "topRight"
                  });</script>');
              }
            }

            if(count($error)==0){
              $sql="INSERT INTO users(un, pswd, fname, lname, 	email, 	active_status, delete_status, last_active_time, privilages_privilages_id)
                    VALUES('$user_name', '$password_enc', '$fname', '$lname', '$email1', 1, 0, NOW(), 1)";
              mysqli_query($conn, $sql);
              
              echo '<script> swal("Good Job", "You Succesfully registerd !", "success"),window.location = "user_registration.php"; </script>';
           

            //,window.location.href = "login.php";
            }

    }else{
      array_push($error, '<script> iziToast.error({
				title: "Passwords Dosent Match",
				position: "topRight"
			  });</script>');
    }
    
      if (isset($error)&&!empty($error) ) {
        include_once('db/error.php');
    }

    exit();

}
 
 
 ?>

<?php 
  //}
}
 ?>