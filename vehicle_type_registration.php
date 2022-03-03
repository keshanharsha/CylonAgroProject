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
                    <h4>Register New Vehicle Type</h4>
                  </div>
                  <div class="card-body">
                    <form action="" method="post">
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label>Type Name</label>
                        <input type="text" name="tname" class="form-control">
                      </div>
                     <div class="form-group">
                     <button class="btn btn-icon icon-left btn-primary" type="submit" name="register"><i class="fa fa-plus"></i> Register New Vehicle Type</button>
                     <a href="vehicle_types_veiw.php" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i> Cancel</a>
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
  $tname=mysqli_real_escape_string($conn, $_POST['tname']);
     // error check
    if (empty($tname)) {
      array_push($error, '<script> iziToast.error({
				title: "Enter Vehicle Type",
				position: "topRight"
			  });</script>');
    }

    // check dual records
    // types_id, type_name, delete_status, active_status, last_updated_time

            $sql_select2="SELECT * FROM vehicle_types WHERE type_name='$tname'";
            $result2=mysqli_query($conn, $sql_select2);

            // print errors
            while( $user=mysqli_fetch_array($result2)) {
              
              if ($user['type_name']==$tname) {
                array_push($error, '<script> iziToast.warning({
                  title: "Email Is alredy Exits!",
                  message: "this email is taken use another email",
                  position: "topRight"
                });</script>');
              }
            }

            if(count($error)==0){
              $sql="INSERT INTO vehicle_types(type_name, delete_status, active_status, last_updated_time)
                    VALUES('$tname',0,1, NOW())";
              
              if ( mysqli_query($conn, $sql)) {
               echo '<script> swal("Good Job", "You Succesfully registerd !", "success"),window.location = "vehicle_types_veiw.php"; </script>';
              }else{
                echo '<script> swal("Good Job", "You Not Succesfully registerd !", "success"),window.location = "vehicle_types_veiw.php"; </script>';
              }
              
           

            //,window.location.href = "login.php";
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