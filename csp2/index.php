<?php 
function display_title(){
	echo "Manila Outdoors - Outdoor, Camping and Hiking Gear from Top Brands";
}
function meta_description(){
	echo "At Manila Outdoors, we think getting ‘out there’ is even better together.";
}
function meta_keywords(){
	echo "Manila Outdoors, hiking equipment, camping gears, outdoor gear";
}
function display_content(){
	require 'connection.php'
	?>
	
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
	    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	    <li data-target="#myCarousel" data-slide-to="1"></li>
	    <li data-target="#myCarousel" data-slide-to="2"></li>
	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner">
	    <div class="item active banner" >
	      <img src="assets/img/banner1.jpg" alt="Osprey Backpack" class="img-responsive">   
	       <div class="banner-caption banner1">
	       		<div class="banner1-caption-container">
			       	<h2>FLASH SALE!</h2>
				    <p class="lead">Up to 20% OFF in Backpacks</p>
				    <a href="shop_all.php?category=Backpacks"><button type="button" class="btn banner-button btn-lg">SHOP BACKPACKS</button></a> 
			    </div>
	       </div>  
	    </div>

	    <div class="item">
	      <img src="assets/img/banner2.jpg" alt="Vargo Cookware" class="img-responsive">
	      <div class="banner-caption banner2">
	       		<div class="banner2-caption-container">	
			       	<h2>HIKING EQUIPMENTS</h2>
				    <p class="lead">Innovative titanium outdoor products</p>
				    <a href="shop_all.php?category=Hiking%20Gears"><button type="button" class="btn banner-button btn-lg">SHOP COOKWARES</button></a>
			    </div>
	       </div>  
	    </div>

	    <div class="item">
	      <img src="assets/img/banner3.jpg" alt="Ticket to The Moon Hammock" class="img-responsive">
	      <div class="banner-caption banner3">
	       		<div class="banner3-caption-container">
			       	<h2>QUALITY HAMMOCKS</h2>
				    <p class="lead">Ticket to the Moon</p>
				    <a href="shop_all.php?category=Hammocks"><button type="button" class="btn banner-button btn-lg">SHOP HAMMOCKS</button> </a>
			    </div>
	       </div>  
	    </div>
	  </div>

	  <!-- Left and right controls -->
	  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#myCarousel" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
		
	<div class="container">
		<h1 class="text-center">At Manila Outdoors,<br><small>we think getting ‘out there’ is even better together.</small></h1>
		<div class="mini-banner">
			<img src="assets/img/free-shipping.jpg" alt="" class="img-responsive">
			<img src="assets/img/tents-discount.jpg" alt="" class="img-responsive">
		</div>

		<div class="featured-products">
			<h3>LATEST PRODUCTS</h3>
			<div class="featured-product-container">

				<?php 
				// Display the 4 LATEST IN STOCK PRODUCTS
				$sql = "SELECT * FROM products WHERE quantity !=0 ORDER BY product_ID DESC LIMIT 4";
     			$result = mysqli_query($conn, $sql);
     			while($products = mysqli_fetch_assoc($result) ) {
	            extract($products);
	            $index = $product_ID;
					echo "
					<div class='featured-product text-center'>
						<form method='POST' action='add_to_cart.php?index=$index'>
							<a href='product.php?index=$index&product_name=$product_name'>
								<img src='$image' class='img-responsive'>
								<h4>$product_name</h4>
							</a>
							<span >&#8369; ".number_format($price, 2)."</span><br>
							<input type='hidden' min='0' value='1' name='orderQuantity'>							
							<button class='btn btn-warning'>Add to cart</button>
						</form>	
					</div>";
					}
				?>
				
			</div>
		</div>

		<div class="brand_logos">
			<h3>BRANDS WE LOVE</h3>
   			<section class="brands slider">
				<div>
			      <img src="assets/img/brands/ferrino_logo.png" alt="Ferrino Logo">
			    </div>

			    <div>
			      <img src="assets/img/brands/craghoppers_logo.png" alt="Craghoppers Logo">
			    </div>

			    <div>
			      <img src="assets/img/brands/merrell_logo.png" alt="Merrell Logo">
			    </div>

			    <div>
			      <img src="assets/img/brands/osprey_logo.png" alt="Osprey Logo">
			    </div>

			    <div>
			      <img src="assets/img/brands/tttm_logo.png" alt="Ticket to the Moon Logo">
			    </div>

			    <div>
			      <img src="assets/img/brands/vargo_logo.png" alt="Vargo Logo">
			    </div>
			</section>
		</div>

		<div class="block-logo">
			<h2>A HERITAGE BORN OF THE MOUNTAINS</h2>
		</div>
	</div>
<?php }

require "template.php"
?>