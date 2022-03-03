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
include_once('includes/header.php');
?>
 <div class="navbar-bg" style="height: 75px;"></div>
      <div class="main-content">
          <section class="section">


          </section>
      </div>
 <?php include_once('includes/footer.php');?>
<?php 
  //}
}
 ?>