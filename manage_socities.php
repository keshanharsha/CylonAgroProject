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
                    <h4>Socities</h4>
                    <div class="card-header-action">
                      <a href="new_socity_registration.php" class="btn btn-icon icon-left btn-primary"><i class="fa fa-plus"></i> Add New Socities</a>
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
                              <!-- socity_id 	socitycol_name  image 	contact_no 	no_of_driver 	location_address 	total_amount 	paid_amount 	payble_amount 	total_hire	 -->
                            <th>Socity Id</th>
                            <th>Socity Name</th>
                            <th>Contact No</th>
                            <th>email</th>
                            <th>Address</th>
                            <th>No Of Drivers</th>
                            <th>Total Amount</th>
                            <th>Paid Amount</th>
                            <th>Payble Amount</th>
                            <th>total_hire</th>
                            <th>Active Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        	
                            //   socity_id 	socitycol_name 	contact_no 	no_of_driver 	location_address 	total_amount 	paid_amount 	payble_amount 	total_hire	 
                        	 $get_socity = "SELECT * FROM lory_socity WHERE delete_status=0 ORDER BY socity_id DESC";
                                            
                                  $run_socity = mysqli_query($conn,$get_socity);
                      
                                  while($row_socity=mysqli_fetch_array($run_socity))
                                  { 
                                      $socity_id=$row_socity['socity_id'];
                                      $socitycol_name=$row_socity['socitycol_name'];
                                      $contact_no=$row_socity['contact_no'];
                                      $email1=$row_socity['email1'];
                                      $no_of_driver=$row_socity['no_of_driver'];
                                      $location_address=$row_socity['location_address'];
                                      $total_amount=$row_socity['total_amount'];
                                      $paid_amount=$row_socity['paid_amount'];
                                      $payble_amount=$row_socity['payble_amount'];
                                      $total_hire=$row_socity['total_hire'];
                                      $delete_status=$row_socity['delete_status'];
                                      $active_status=$row_socity['active_status'];

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
                           <td><?php echo($socity_id); ?></td>
                           <td><?php echo($socitycol_name); ?></td>
                           <td><?php echo($contact_no); ?></td>
                           <td><?php echo($email1); ?></td>
                           <td><?php echo($location_address); ?></td>
                           <td><?php echo($no_of_driver); ?></td>
                           <td>LKR <?php echo($total_amount);  ?>/-</td>
                           <td>LKR <?php echo($paid_amount); ?>/-</td>
                           <td>LKR <?php echo($payble_amount); ?>/-</td>
                           <td><?php echo($total_hire); ?></td>
                           <td><?php echo($active); ?></td>
                           <td>
                                <div class="dropdown">
                                  <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="fa fa-ellipsis-h"></i>
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item section" href="new_user_edit.php?user_id=<?php echo $users_id?>"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>
                                    <a class="dropdown-item" onclick="return confirm('Do Yo Want To Delete..')"  href='new_socity_delete.php?socity_id=<?php echo $socity_id?>'><i class="fa fa-trash"></i>&nbsp;&nbsp;Delete</a>
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