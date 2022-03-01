<?php session_start(); ?>
<?php include_once('db/conn.php'); ?>
<?php 

if (!isset($_SESSION['user_name'])) {
	echo "<script>window.open('index.php','_self')</script>";
}else{

if (isset($_GET['vehicle_type_id'])) {
		$vehicle_type_id=mysqli_real_escape_string($conn,($_GET['vehicle_type_id']));

			// types_id, type_name, delete_status, active_status, last_updated_time
			// header("location:admin_management.php?error=con_not_delete_curent_user");
			$sql="UPDATE vehicle_types SET delete_status=1 WHERE types_id='$vehicle_type_id'";
			$result=mysqli_query($conn,$sql);
			header('location:vehicle_types_veiw.php');
}else{
	header('location:vehicle_types_veiw.php');
}

}
?>