<?php
	$index = $_GET['index'];

	require 'connection.php';
	session_start();

	$sql = "UPDATE customers SET 
		status = 'inactive'
		WHERE id ='$index'";
	mysqli_query($conn,$sql) or die(mysqli_error($conn));
	header('location: admin-panel');

?>