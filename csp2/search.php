<?php 
	
	require 'connection.php';
	session_start();

	$search = strtolower(mysqli_real_escape_string($conn, $_POST['search']));
	

	$sql = "SELECT * FROM products WHERE product_name LIKE '%$search%' LIMIT 10";
	$result = mysqli_query($conn,$sql);	
	echo "<ul>";
	if(mysqli_num_rows($result)>0){
		while ($row=mysqli_fetch_assoc($result)) {
			extract($row);
			echo "<a href='product.php?index=$product_ID'><li><img src='$image'> $product_name</li></a>";
		}		
		
	} else {
		echo "<li>No Result Found</li>";
	}
	echo "</ul>";
?>