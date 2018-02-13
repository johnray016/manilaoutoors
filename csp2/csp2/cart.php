<?php 

function display_title(){
	echo "Shopping Cart";
}
function meta_description(){
	echo "";
}
function meta_keywords(){
	echo "";
}
function display_content(){ 
	require 'connection.php';	

	if(isset($_SESSION['cart'])) {	
		?>
		<section id="cart">
			<div class="container">
				<h3 class="text-center">SHOPPING CART</h3><br>
				<div class="row">
					<div class="order-items-labels">
						<div class="order-product-name-label col-sm-4">
							<strong><h4 class="orange text-center">PRODUCTS</h4></strong>
						</div>
						<div class="order-details-label col-sm-8">
							<div class="orange order-quantity-label col-sm-3">
								<strong><h4>QUANTITY</h4></strong>
							</div>
							<div class="orange order-price-label col-sm-3">
								<strong><h4>PRICE</h4></strong>
							</div>
							<div class="orange order-total-label col-sm-3">
								<strong><h4>TOTAL</h4></strong>
							</div>
							<div class="orange order-total-label col-sm-3">
								<strong><h4 class="text-center">ACTION</h4></strong>
							</div>
						</div>
					</div>		
				</div>
		<?php									
			$total = 0;	
			foreach ($_SESSION['cart'] as $index => $orderQuantity) {						
			$sql = "SELECT * FROM products WHERE product_ID = $index";
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($result);
			extract($row);

			$subtotal = $price * $orderQuantity; 
			$total += $subtotal;
		?>
			<div class="row well">
		        <div class="order-items-container">
					<div class="order-product-name col-sm-4 text-center">
						<div class="order-image col-sm-4">
							<img src="<?php echo $image; ?>" alt="" class="cart-img" img-responsive>
						</div>
						<div class="col-sm-8">
							<a href="product.php?index=<?php echo $index;?>">
								<h5><strong><?php echo $product_name; ?></strong></h4>
							</a>
						</div>
					</div>
						<div class="order-details col-sm-8">
							<form method="post" action="add_to_cart.php?index=<?php echo $index;?>">
								<div class="order-quantity col-sm-3">
									<input type="number" name="changeQuantity" min="1" value="<?php echo $orderQuantity; ?>"><br>
								</div>
								<div class="order-price col-sm-3">
									<h5>
									<span class="product-price-hidden orange">Price:  </span> &#8369;<?php echo number_format($price, 2); ?></h5>
								</div>
								<div class="order-total col-sm-3">
									<h5>
									<span class="product-price-hidden orange">Total: </span> &#8369;<?php echo number_format($subtotal, 2); ?></h5>
								</div>
								<div class="order-action col-sm-3">
									<button type="submit" class="btn btn-success">Change Quantity</button>
							</form>
									<a href="remove_from_cart.php?index=<?php echo $index;?>"><button type="button" class="btn btn-danger">Remove</button></a>
								</div>
							</form>
						</div>
			        </div>
				</div>
				<?php } ?>
				<div class="col-sm-6">
					<span></span>
				</div>
				<div class="col-sm-6 subtotal-container">	
					<form method="post" action="checkout">				
						<h4><span class="orange">Free Shipping:</span>  &#8369; 0.00</h4>
						<h4 ><strong><span class="orange">Subtotal:</span> &#8369;
							<?php echo number_format($total, 2); ?></strong></h4>
						<input type="hidden" name="totalPrice" value="<?php echo $total; ?>" />
						<button class="btn btn-primary">Proceed to checkout</button>
					</form>
				</div>

			</div>
			</section>	
	<?php } else { ?>
		
		<div class='container'>
			<div id='cart-empty'>
				<div class='text-center'>
				<h3>There are no items in your cart.</h3>
				 <a href='shop_all.php?category=Apparel'><button class='btn btn-warning'>SHOP ITEMS</button>
				</div>
			</div>	
		</div>	
	<?php
	}	
			
}

require "template.php"
?>
