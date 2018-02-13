<?php 
	
	require 'connection.php';
	session_start();

	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = sha1($_POST['password']);
	$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
	$lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$streetAddress = mysqli_real_escape_string($conn, $_POST['streetAddress']);
	$barangay = mysqli_real_escape_string($conn, $_POST['barangay']);
	$city = mysqli_real_escape_string($conn, $_POST['city']);
	$province = mysqli_real_escape_string($conn, $_POST['province']);
	$country = mysqli_real_escape_string($conn, $_POST['country']);
	$status = 'active';

	

	$sql = "INSERT INTO customers (username,password,first_name,last_name,email,contact_number,street_address,barangay,city,province,country, status) VALUES ('$username','$password', '$firstName', '$lastName','$email','$phone','$streetAddress','$barangay', '$city', '$province', '$country', '$status')";
	mysqli_query($conn,$sql) or die(mysqli_error($conn));

	$_SESSION['username'] = $username;
	header('location: index');
?>