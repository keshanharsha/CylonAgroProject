<?php session_start(); ?>
<?php include_once('db/conn.php'); ?>
<?php 

if (!isset($_SESSION['user_name'])) {
	echo "<script>window.open('index.php','_self')</script>";
}else{

if (isset($_GET['socity_id'])) {
		    $socity_id=mysqli_real_escape_string($conn,($_GET['socity_id']));

			// header("location:admin_management.php?error=con_not_delete_curent_user");
			$sql="UPDATE lory_socity SET delete_status=1 WHERE socity_id='$socity_id'";
			$result=mysqli_query($conn,$sql);
			header('location:manage_socities.php');
}else{
	header('location:manage_socities.php');
}

}
?>