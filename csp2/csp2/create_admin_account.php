<?php 
	
	require 'connection.php';
	session_start();

	$username = mysqli_real_escape_string($conn, $_POST['staffUsername']);
	$password = sha1($_POST['staffPassword']);
	$role = mysqli_real_escape_string($conn, $_POST['staffRole']);

	

	$sql = "INSERT INTO admin_accounts (admin_username, admin_password, role) VALUES ('$username','$password', '$role')";
	mysqli_query($conn,$sql) or die(mysqli_error($conn));

	header('location: admin-panel');
?>