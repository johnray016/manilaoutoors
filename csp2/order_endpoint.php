<?php 
	
	require 'connection.php';
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
	
	unset($_SESSION['cart']);	
	header('location: my-account')
?>