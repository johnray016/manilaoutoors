<?php
	$invoice = $_GET['invoice'];

	require 'connection.php';

	$sql = "UPDATE order_details SET 
		order_status = 'COMPLETED'
		WHERE invoice_number ='$invoice'";
	mysqli_query($conn,$sql) or die(mysqli_error($conn));
	header('location: admin-panel');
?>