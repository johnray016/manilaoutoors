<?php
	$index = $_GET['index'];

	require 'connection.php';

	$sql = "DELETE FROM products WHERE product_ID = '$index'";
	mysqli_query($conn,$sql) or die(mysqli_error($conn));

	header('location: admin-panel');

?>