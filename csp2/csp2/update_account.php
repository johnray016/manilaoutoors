<?php

$index = $_GET['index'];

require 'connection.php';
$username = mysqli_real_escape_string($conn, $_POST['username']);
$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
$lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$contactNumber = mysqli_real_escape_string($conn, $_POST['contactNumber']);
$streetAddress = mysqli_real_escape_string($conn, $_POST['streetAddress']);
$barangay = mysqli_real_escape_string($conn, $_POST['barangay']);
$city = mysqli_real_escape_string($conn, $_POST['city']);
$province = mysqli_real_escape_string($conn, $_POST['province']);
$country = mysqli_real_escape_string($conn, $_POST['country']);

$sql = "UPDATE customers SET 
		username = '$username',
		first_name ='$firstName',
		last_name = '$lastName',
		email = '$email',
		contact_number = '$contactNumber',
		street_address = '$streetAddress',
		barangay = '$barangay',
		city = '$city',
		province = '$province',
		country = '$country'
		WHERE id ='$index'";
mysqli_query($conn,$sql) or die(mysqli_error($conn));

header('location: my-account');

?>