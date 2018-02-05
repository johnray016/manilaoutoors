<?php

session_start();

$index = $_GET['index'];

//from product.php
if(isset($_POST['orderQuantity'])){
	$orderQuantity = $_POST['orderQuantity'];

	if(isset($_SESSION['cart'][$index]))
		$_SESSION['cart'][$index] += $orderQuantity;
	else
		$_SESSION['cart'][$index] = $orderQuantity;

	header('location: cart');
}



//from cart.php	
if(isset($_POST['changeQuantity'])){
	$orderQuantity = $_POST['changeQuantity'];
	$_SESSION['cart'][$index] = $orderQuantity;

	header('location: cart');

}


?>