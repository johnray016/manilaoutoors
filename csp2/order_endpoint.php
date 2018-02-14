<?php 
	
	require 'connection.php';
	include "smsGateway.php";
	session_start();

	if (isset($_SESSION['username'])) {
	    $username = $_SESSION['username'];
	    $sql = "SELECT * FROM customers WHERE username = '$username'";
	    $result = mysqli_query($conn, $sql);
	    $row = mysqli_fetch_assoc($result);		
		extract($row);
	}
	$paymentDetails= $_POST['paymentDetails'];	
	$totalPrice = $_POST['totalPrice'];
	$customerID = $id;
	mysqli_query($conn, "INSERT INTO order_details (customer_id, order_status, total) VALUES ($customerID, 'PENDING', $totalPrice)");
	$invoice = mysqli_insert_id($conn);

	foreach ($_SESSION['cart'] as $index => $orderQuantity) {	
		$sql = "INSERT INTO orders (product_id, order_qty, payment_id, invoice_number)
		VALUES ('$index', '$orderQuantity', '$paymentDetails', '$invoice')";
		mysqli_query($conn, $sql) or die (mysqli_error($conn));
	}
	
	
	$smsGateway = new SmsGateway('john@adventurefriends.com.au', 'chizmiz16');

	$deviceID = 78684;
	$number = $contact_number;
	$message = 'Hello, '.$first_name.', Thank you for placing your order here in Manila Outdoors. Your total payment is '.number_format($totalPrice, 2);

	$result = $smsGateway->sendMessageToNumber($number, $message, $deviceID);
	
	unset($_SESSION['cart']);	
	header('location: order-success')
?>