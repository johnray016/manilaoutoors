<?php 
	
	require 'connection.php';
	session_start();

	$search = strtolower($_POST['search']);
	

	$sql = "SELECT * FROM products WHERE product_name LIKE '%$search%' LIMIT 10";
	$result = mysqli_query($conn,$sql);	
	
	if(mysqli_num_rows($result)>0){
		while ($row=mysqli_fetch_assoc($result)) {
			extract($row);
			echo "<ul>
			<li><img src='$image'> <a href='product.php?index=$product_ID'>$product_name</a></li>
			</ul>";
		}		
	} else {
		echo "No Result Found";
	}
?>