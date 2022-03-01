<!-- header navigation bar -->
<?php session_start(); ?>
<?php include_once('db/conn.php'); ?>
<?php 
if (!isset($_SESSION['user_name'])) {
  echo "<script>window.open('login.php','_self')</script>";
}else{

    // $access=$_SESSION['previlage'];
    // $extra_previlages=$_SESSION['extra_previlages'];

    // if ((strpos($extra_previlages , 'o') !== false) || (strpos($access , 'o') !== false)) {
    //   $updated_user=$_SESSION['iduser'];
include_once('includes/header.php');
?>
 <div class="navbar-bg" style="height: 75px;"></div>
      <div class="main-content">
          <section class="section">
          	<div class="row">
            <div class="col-12 ">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Users</h4>
                    <div class="card-header-action">
                      <a href="new_user_registration.php" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Add New User</a>
                    </div>
                  </div>
                </div>     
            </div>
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                            <th>User ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>User Name</th>
                            <th>Active/Inactive</th>
                            <th>is Delete</th>
                            <th>Last Active Time</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        	// users_id, un, pswd, fname, lname, email, active_status, delete_status, last_active_time, privilages_privilages_id

                        	 $get_users = "SELECT * FROM users WHERE delete_status=0 ORDER BY users_id DESC";
                                            
                                  $run_rpro = mysqli_query($conn,$get_users);
                      
                                  while($row_rpro=mysqli_fetch_array($run_rpro))
                                  { 
                                      $users_id=$row_rpro['users_id'];
                                      $fname=$row_rpro['fname'];
                                      $lname=$row_rpro['lname'];
                                      $email=$row_rpro['email'];
                                      $un=$row_rpro['un'];
                                      $active_status=$row_rpro['active_status'];
                                      $delete_status=$row_rpro['delete_status'];
                                      $last_active_time=$row_rpro['last_active_time'];

                                      if( $active_status==1){
                                        $active="Active";
                                      }else{
                                        $active="inActive";
                                      }

                                      if( $delete_status==0){
                                        $delete="Not Deleted";
                                      }else{
                                        $delete="Deleted";
                                      }

 							?>
                          <tr>
                            <td><?php echo($users_id); ?></td>
                           <td><?php echo($fname); ?></td>
                           <td><?php echo($lname); ?></td>
                           <td><?php echo($email); ?></td>
                           <td><?php echo($un); ?></td>
                           <td><?php echo($active); ?></td>
                           <td><?php echo($delete); ?></td>
                           <td><?php echo($last_active_time); ?></td>

                           <td>
                                <div class="dropdown">
                                  <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="fa fa-ellipsis-h"></i>
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item section" href="new_user_edit.php?user_id=<?php echo $users_id?>"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>
                                    <a class="dropdown-item" onclick="return confirm('Do Yo Want To Delete..')"  href='new_user_delete.php?user_id=<?php echo $users_id?>'><i class="fa fa-trash"></i>&nbsp;&nbsp;Delete</a>
                                  </div>
                                </div>
                              </td>
                          </tr>
                        <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
      </div>

 <?php include_once('includes/footer.php');?>

<?php 
  //}
}
 ?>