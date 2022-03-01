<!-- header navigation bar -->
<?php session_start(); ?>

<?php 
if (!isset($_SESSION['user_name'])) {
  echo "<script>window.open('login.php','_self')</script>";
}else{
    include_once('includes/header.php');
    // $access=$_SESSION['previlage'];
    // $extra_previlages=$_SESSION['extra_previlages'];

    // if ((strpos($extra_previlages , 'o') !== false) || (strpos($access , 'o') !== false)) {
    //   $updated_user=$_SESSION['iduser'];

    // users_id, un, pswd, fname, lname, email, active_status, delete_status, last_active_time, privilages_privilages_id

        if(isset($_GET['user_id'])){
            echo $get_user_id=$_GET['user_id'];
            // users_id, un, pswd, email, fname, lname, active_status, delete_status, last_active_time, privilages_privilages_id
            $sql="SELECT * FROM users WHERE users_id='$get_user_id' LIMIT 1";
            $result=mysqli_query($conn,$sql);
            if($res=mysqli_fetch_array($result)){
                $un=$res['un'];
                $pswd=$res['pswd'];
                $email=$res['email'];
                $fname=$res['fname'];
                $lname=$res['lname'];
                $active_status=$res['active_status'];
            }
            $checked="";
            if($active_status==1){
                $checked="checked";
            }
        }
    
?>
<style>

</style>
 <div class="navbar-bg" style="height: 75px;"></div>
      <div class="main-content">
          <section class="section">

            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Update System User</h4>
                  </div>
                  <div class="card-body">
                    <form action="" method="post">
                    <div class="row">
                      <div class="form-group col-md-3">
                        <label>First Name</label>
                        <input type="text"  value="<?php echo $fname; ?>" name="fname" class="form-control">
                      </div>
                      <div class="form-group col-md-3">
                        <label>Last Name</label>
                        <input type="text"  value="<?php echo $lname; ?>" name="lname" class="form-control">
                      </div>
                      <div class="form-group col-md-3">
                        <label>Email</label>
                        <input type="email"  value="<?php echo $email; ?>" name="email1" class="form-control" disabled  >
                      </div>
                      <div class="form-group col-md-3">
                        <label>User Name</label>
                        <input type="text" value="<?php echo $un; ?>" name="user_name" class="form-control" disabled>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Password</label>
                        <input type="Password"   name="password" class="form-control">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Re Enter Password</label>
                        <input type="Password"  name="re_password" class="form-control">
                      </div>
                    </div>
                    
                    <!-- toggle switch -->
                    <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="customSwitches" name="check1" <?php echo $checked;?>>
                    <label class="custom-control-label" for="customSwitches">Active or Inactive user</label>
                    </div>
                    <br><br>  
                     <div class="form-group">
                     <button class="btn btn-icon icon-left btn-primary" type="submit" name="register"><i class="fa fa-plus"></i> Update System User</button>
                     <a href="user_registration.php" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i> Cancel</a>
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
 
if (isset($_POST["register"])) {
    $fname=mysqli_real_escape_string($conn, $_POST['fname']);
    $lname=mysqli_real_escape_string($conn, $_POST['lname']);
    $email1=mysqli_real_escape_string($conn, $_POST['email1']);
    $user_name=mysqli_real_escape_string($conn, $_POST['user_name']);
    $pw1=mysqli_real_escape_string($conn, $_POST['password']);
    $re_password=mysqli_real_escape_string($conn, $_POST['re_password']);
   

    // error check
    if (empty($fname)) {
        array_push($error, '<script> iziToast.error({
				title: "Enter First Name",
				position: "topRight"
			  });</script>');
    }

    if (empty($lname)) {
        array_push($error, '<script> iziToast.error({
				title: "Enter Last Name",
				position: "topRight"
			  });</script>');
    }
 
    // check dual records
    if ($pw1==$re_password) {

        if (count($error)==0) {
            $pw="";
            if(isset($_POST['password']) && isset($_POST['re_password'])){ 
                   
                    $pw=md5($pw);
            }

            $active_status="";
            if(!empty($_POST['check1'])){
                $active_status=1;
            }else{
                $active_status=0;
            }
            
            $sql="UPDATE users SET pswd='$pw', fname='$fname', lname='$lname', active_status=$active_status WHERE users_id='$get_user_id'";
           if ( mysqli_query($conn, $sql)) {
             echo '<script> swal("Good Job", "You Succesfully registerd !", "success"),window.location = "user_registration.php";</script>';
            }else{
              echo '<script> swal("Good Job", "You Rengistered registerd !", "success"),window.location = "user_registration.php";</script>';
            }
              
            

        }
            }
    } else {
        array_push($error, '<script> iziToast.error({
				title: "Passwords Dosent Match",
				position: "topRight"
			  });</script>');
    }

    if (isset($error)&&!empty($error)) {
        include_once('db/error.php');
    }
    exit();
}
 ?>

<?php 
  //}
}
 ?>