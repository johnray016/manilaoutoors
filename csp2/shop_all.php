<?php 

$category = $_GET['category'];
require 'connection.php';

function display_title(){
	echo "Shop All - Manila Outdoors";
}
function meta_description(){
	echo "";
}
function meta_keywords(){
	echo "Manila Outdoors, hiking equipment, camping gears, outdoor gear";
}
function display_content(){ 
	global $conn;
	global $category;
	?>

	<section id="shop-all">
		<div class="container">
			<div class="row shop-products">
				<div class="col-sm-3">
					<div class="panel panel-warning">
				      <div class="panel-heading"><h3><strong>FILTER BY:</strong></h3></div>
				      <div class="panel-body">

				      	<!-- Filter all products by category -->

				      	<h4 class="orange">CATEGORY:</h4>
				      	<select name='category_filter' id="productCategory"><option value="" disabled selected>--Select Category</option>
						 <?php 

						    $sql = "SELECT * FROM categories";
							$result = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_assoc($result)){
								extract($row);
								echo "<option value='$id'>$category_name</option>";
							}
						?>	
				   		</select>
						 

						<!-- Filter all products by brands -->
				      	<h4 class="orange">BRANDS</h4>
					      	<select>
					      		<option disabled selected>--Select Brands</option>
					      		 <?php 
								    $sql = "SELECT * FROM brands";
									$result = mysqli_query($conn,$sql);
									while($brands = mysqli_fetch_assoc($result)){
										extract($brands);
										echo "<option value='shop-all?brand$brand_name'>
												$brand_name
											  </option>";
									}
									echo "</select>";
								 ?>
					      	</select>
				      	<h4 class="orange">PRICE RANGE</h4>

				      	<button type="button" class="btn btn-warning">Search</button>
				      	</form>
				      </div>
				    </div>
				</div>	
				<div class="col-sm-9">
			<?php 
			// Display all PRODUCTS	by category
			$sql = "SELECT * FROM products JOIN categories ON (products.category_ID = categories.id) WHERE category_name = '$category' AND quantity != 0";	
				$result = mysqli_query($conn, $sql);
				while($products = mysqli_fetch_assoc($result) ) {		
				extract($products);
      		    $index = $product_ID;	
				echo "
				<div class='col-xs-12 col-sm-4 text-center'>
				<form method='POST' action='add_to_cart.php?index=$index'>
					<a href='product.php?index=$index&product_name=$product_name'>
						<img src='$image' class='img-responsive'>
						<h4 class='productName'>$product_name</h4>
						<span class='orange price'><strong>&#8369; ".number_format($price, 2)."</strong></span><br>
						<a href='product.php?index=$index&product_name=$product_name'>
					</a>
						<input type='hidden' min='0' value='1' name='orderQuantity'>		
						<button class='btn btn-warning'>Add to Cart</button></a><br><br>
				</form>	
				</div>";
				}
			?>
				</div>
			</div>
		</div>
	</section>

<?php	
}

require "template.php"
?>