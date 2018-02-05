<?php

$index = $_GET['index'];

require 'connection.php';
$product_name = mysqli_real_escape_string($conn,$_POST['productName']);
$sku = mysqli_real_escape_string($conn,$_POST['sku']);
$short_description = mysqli_real_escape_string($conn,$_POST['shortDescription']);
$long_description = mysqli_real_escape_string($conn,$_POST['longDescription']);
$features = mysqli_real_escape_string($conn,$_POST['features']);
$price = mysqli_real_escape_string($conn,$_POST['price']);
$quantity = mysqli_real_escape_string($conn,$_POST['quantity']);
$meta_title = mysqli_real_escape_string($conn,$_POST['metaTitle']);
$meta_description = mysqli_real_escape_string($conn,$_POST['metaDescription']);
$meta_keyword = mysqli_real_escape_string($conn,$_POST['metaKeywords']);
$sql = "UPDATE products SET 
		product_name = '$product_name',
		sku ='$sku',
		short_description = '$short_description',
		long_description = '$long_description',
		features = '$features',
		price = '$price',
		quantity = '$quantity',
		meta_title = '$meta_title',
		meta_description = '$meta_description',
		meta_keyword = '$meta_keyword'
		WHERE product_ID='$index'";
mysqli_query($conn,$sql) or die(mysqli_error($conn));

header('location: admin-panel');

?>