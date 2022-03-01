<?php session_start(); ?>
<?php include_once('db/conn.php'); ?>
<?php 

if (!isset($_SESSION['user_name'])) {
	echo "<script>window.open('index.php','_self')</script>";
}else{

if (isset($_GET['user_id'])) {
		$user_id=mysqli_real_escape_string($conn,($_GET['user_id']));

			// header("location:admin_management.php?error=con_not_delete_curent_user");
			$sql="UPDATE users SET delete_status=1 WHERE users_id='$user_id'";
			$result=mysqli_query($conn,$sql);
			header('location:user_registration.php');
}else{
	header('location:user_registration.php');
}

}
?>