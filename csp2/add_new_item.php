<?php

require 'connection.php';



	$target_dir = "assets/img/products/";
	$target_file = $target_dir . basename($_FILES["img"]["name"]);
	move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);

	$productName = mysqli_real_escape_string($conn, $_POST['productName']);
	$sku = mysqli_real_escape_string($conn, $_POST['sku']);
	$shortDescription = mysqli_real_escape_string($conn, $_POST['shortDescription']);
	$longDescription = mysqli_real_escape_string($conn, $_POST['longDescription']);
	$featuresDescription = mysqli_real_escape_string($conn, $_POST['featuresDescription']);
	$productPrice = mysqli_real_escape_string($conn, $_POST['productPrice']);
	$productQuantity = mysqli_real_escape_string($conn, $_POST['productQuantity']);
	$image = mysqli_real_escape_string($conn, $target_file);
	$productCategory = mysqli_real_escape_string($conn, $_POST['productCategory']);
	$productBrand = mysqli_real_escape_string($conn, $_POST['productBrand']);
	$metaTitle = mysqli_real_escape_string($conn, $_POST['metaTitle']);
	$metaDescription = mysqli_real_escape_string($conn, $_POST['metaDescription']);
	$metaKeywords = mysqli_real_escape_string($conn, $_POST['metaKeywords']);
	$date = mysqli_real_escape_string($conn, date("Y-m-d H:i:s"));

	$sql = "INSERT INTO products (product_name, sku, short_description, long_description, features, price, quantity, image, category_ID, brand_id, meta_title, meta_description, meta_keyword, date_created)
		VALUES 
		('$productName', '$sku', '$shortDescription', '$longDescription', '$featuresDescription', $productPrice, $productQuantity, '$image', $productCategory, $productBrand, '$metaTitle', '$metaDescription', '$metaKeywords', '$date')";
	mysqli_query($conn,$sql) or die(mysqli_error($conn));
	header('location: admin_panel.php');



?>