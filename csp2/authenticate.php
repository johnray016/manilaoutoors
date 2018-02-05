<?php
session_start();
require 'connection.php';

if(isset($_POST['login'])){
	$username = $_POST['username']; 
	$password = sha1($_POST['password']); 

	$sql = "SELECT * FROM customers WHERE username = '$username' AND password = '$password' AND status = 'active'";
	$result = mysqli_query($conn,$sql); 

	if(mysqli_num_rows($result)>0){
		$row = mysqli_fetch_assoc($result);		
		extract($row);
		$_SESSION['username'] = $username;
		header('location: index');
	} else {
		header('location: customer-login');
	}
}

if(isset($_POST['register'])){
	$username = $_POST['username'];
	$sql = "SELECT * FROM customers WHERE username = '$username'";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
		echo "invalid";
	} else {
		echo "valid";
	}
}

if(isset($_POST['adminLogin'])){
	$username = $_POST['adminUsername']; 
	$password = sha1($_POST['adminPassword']); 

	$sql = "SELECT * FROM admin_accounts WHERE admin_username = '$username' AND admin_password = '$password'";
	$result = mysqli_query($conn,$sql); 	

	if(mysqli_num_rows($result)>0){
		$row = mysqli_fetch_assoc($result);
		$_SESSION['admin_username'] = $username;
		$_SESSION['role'] = $row['role'];
		header('location: admin-panel');
	} else {
		header('location: admin-login');
	}
}


?>

