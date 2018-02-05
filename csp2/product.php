<?php 
$index = $_GET['index'];
require 'connection.php';
$sql = "SELECT * FROM products WHERE product_ID = $index";
$result = mysqli_query($conn, $sql);
$products = mysqli_fetch_assoc($result);

function meta_description(){
	global $products;
	extract($products);
	echo $meta_description;
}
function meta_keywords(){
	global $products;
	extract($products);
	echo $meta_keyword;
}
function display_title(){
	global $products;
	extract($products);
	echo $product_name." - Manila Outdoors";
}
function display_content(){
 	global $conn;
	global $products;
	extract($products);
	$index = $product_ID;
	echo "<div class='container'>
			<section id='product-page'>
				<div class='product-name-container'>
					<h4><strong>$product_name</strong></h4>
				</div>	
				<div class='product-image-container'>
					<img src='$image' class='img-responsive' data-toggle='modal' data-target='#imageModal'>
				</div>
				<div class='product-details-container'>
					<h3>&#8369; ".number_format($price, 2)."</h3>
					<span class='product-sku'>SKU: $sku</span><br>";
					if ($quantity==0) {
						echo "<strong>AVAILABILITY: </strong><span class='availability red'> OUT OF STOCK</span><br>
							<p>$short_description</p>
				</div>				
				<div class='addToCart-container'> 	
					
					<hr>
				</div>";
					} else {
						echo "<strong>Current Stock: </strong><span class='orange'>$quantity</span><br>";
						echo "<strong>AVAILABILITY: </strong><span class='availability green'> IN STOCK</span>
						<p>$short_description</p>
				</div>	
				<div class='addToCart-container'> 	
					<hr>
					<p><strong>FREE SHIPPING NATIONWIDE</strong></p>
					<form method='POST' action='add_to_cart.php?index=$index'>
						<input type='number' id='addToCart' min='0' value='1' name='orderQuantity'>
						<button class='btn btn-warning'>ADD TO CART</button>
					</form>	
					<hr>
				</div>";
					}					
					echo "
				</section>
				<div class='product-description-container'>
					<ul class='nav nav-tabs'>
					    <li class='active'><a data-toggle='tab' href='#product-description-tab'>PRODUCT DESCRIPTION</a></li>
					    <li><a data-toggle='tab' href='#reviews-tab'>REVIEWS</a></li>
					</ul>
				 	<div class='tab-content'>
					    <div id='product-description-tab' class='tab-pane fade in active'>
					    	<div class='row'>
					    		<div class='long-description-container col-xs-12 col-md-7 col-sm-7 col-lg-7'>
									$long_description
								</div>
								<div class='features-container  col-xs-12 col-md-5 col-sm-5 col-lg-5'>
									$features
								</div>
							</div>	
					    </div>
					    <div id='reviews-tab' class='tab-pane fade'>
					      <br>
					      <p>Currently no reviews yet.</p>
					    </div>
				    </div>
				</div>";	
				//Image Modal

			echo "<div id='imageModal' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
				  <div class='modal-dialog modal-lg'>
				    <div class='modal-content'>
				        <div class='modal-body'>
				            <img src='$image'>
				        </div>
				    </div>
				  </div>
				</div>";
	?>
	<!-- CROSS SELL of products -->
	<?php	
		echo "<div class='cross-sell-container'>
		<h3 class='text-center orange'><strong>OTHER ITEMS YOU MAY LIKE</strong></h3>";
			mysqli_set_charset($conn,'utf8');
				$sql = "SELECT * FROM products WHERE quantity !=0 ORDER BY RAND() LIMIT 4";
     			$result = mysqli_query($conn, $sql);
     			while($products = mysqli_fetch_assoc($result) ) {
	            extract($products);
	            $index = $product_ID;
					echo "<div class='col-sm-3 text-center cross-sell'>
							<form method='POST' action='add_to_cart.php?index=$index'>
								<a href='product.php?index=$index&product_name=$product_name'>
									<img src='$image' class='img-responsive'>
									<h4>$product_name</h4>
								</a>
								<span>&#8369; ".number_format($price, 2)."</span><br>	
								<input type='hidden' min='0' value='1' name='orderQuantity'>													
								<button class='btn btn-warning'>Add to Cart</button>
								<br><br>
							</form>	
						 </div>";
					}
			echo "</div>			
		</div>";
}

require "template.php"
?>