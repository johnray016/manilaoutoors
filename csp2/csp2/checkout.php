 <?php 

require ('connection.php');	

function display_title(){
	if (!isset($_SESSION['username'])) { 
	 header('location: customer-login');
	} 
	echo "Checkout - Manila Outdoors";
}
function meta_description(){
	echo "";
}
function meta_keywords(){
	echo "";
}
function display_content(){ 		
global $conn;
if(isset($_POST['totalPrice'])){
	$totalPrice = $_POST['totalPrice'];
	$username = $_SESSION['username'];
	?>

	<section class="checkout">
		<div class="container">
			<h3 class="text-center">CHECKOUT</h3>
			<form method="post" action="order_endpoint.php" id="validateCheckout" >
				<div class="shipping-details">
					<div class="panel panel-default">
				      <div class="panel-heading"><h4><strong>Order Details</strong></h4></div>
				      <div class="panel-body">
							<h4 class="orange">Shipping Address</h4>
								<?php 
								$sql = "SELECT * FROM customers WHERE username = '$username'";
								$result = mysqli_query($conn, $sql);
								$row = mysqli_fetch_assoc($result);
								extract($row);
								echo "<p>$street_address</p>";
								echo "<p>$barangay</p>";							
								echo "<p>$city, $province, $country</p>";
								?>

							<br>
							<h4 class="orange">Billing Address</h4>
								<?php 
								$sql = "SELECT * FROM customers WHERE username = '$username'";
								$result = mysqli_query($conn, $sql);
								$row = mysqli_fetch_assoc($result);
								extract($row);
								echo "<p>$street_address</p>";
								echo "<p>$barangay</p>";							
								echo "<p>$city, $province, $country</p>";
								?>
							<br>	
							<h4 class="orange">Payment Details<span class="red"> *</span></h4>
							 <select name="paymentDetails" id="paymentMethod">
							 	<option value="0" disabled selected>--Select Payment Method</option>
								<?php 
								$sql = "SELECT * FROM payment_details";
								$result = mysqli_query($conn,$sql);
								while($payment = mysqli_fetch_assoc($result)){
								extract($payment);
									echo "<option value='$payment_id' name='payment_id' id='payment_id'>$payment_details</option>
									";
								}								
								?>
							</select>
							<br><br>
							<h4 class="orange">Delivery Information</h4>
							<p>Standard Delivery: Free</p>
							<p>Please wait 3-6 business days to receive your order</p>
				      </div>
				    </div>
				</div>
				<div class="payment-details">
					<div class="panel panel-info">
				      <div class="panel-heading"><h4><strong>Order Summary</strong></h4></div>
				      <div class="panel-body">
				      	<div class="row">
				      		<div class='order-summary-product-label col-xs-7'>
								<span class="orange">PRODUCT NAME</span>
							</div>
							<div class='order-quantity-product-label col-xs-2'>
								<span class="orange">QTY</span>
						    </div>
							<div class='order-price-product-label col-xs-3'>
								<span class="orange">PRICE</span>
							</div>
				      	</div>
				      	<hr>
						<?php 
							
							foreach ($_SESSION['cart'] as $index => $orderQuantity) {
							$sql = "SELECT * FROM products WHERE product_ID = $index";
							$result = mysqli_query($conn,$sql);
							$row = mysqli_fetch_assoc($result);
							extract($row);
							echo "
							<div class='row'>
								<div class='order-summary col-xs-12'>

									  <div class='order-summary-product col-xs-7'>
											$product_name
									  </div>
									  <div class='order-quantity-product col-xs-2'>
											$orderQuantity
									  </div>
									  <div class='order-price-product col-xs-3'>
											".number_format($price,2)."
									  </div>
								</div>
							</div>
							<hr>";
							}
							echo "<h5>Subtotal: <span class='pull-right'>&#8369; ".number_format($totalPrice, 2)."</span></h5>";
							echo "<h5>Shipping Fee: <span class='pull-right orange'>Free</span></h5>";
							echo "<h4><strong>Total: <span class='orange pull-right'>&#8369; ".number_format($totalPrice, 2)."</span></strong></h4>
								<input type='hidden' value='$totalPrice' name='totalPrice'>";

						?>
						
				      </div>
						<p id="paymentError"></p>			
						<button type="submit" class="btn btn-warning">Confirm Order</button>
				    </div>
				</div>
			</form>
		</div>
	</section>
	<!-- Validate Checkout -->
	<script type="text/javascript">
		$('#validateCheckout').submit(function(){
			if ($('#paymentMethod option:selected').prop('disabled') == true) {
				$('#paymentError').addClass('alert alert-danger text-center');			
				$('#paymentError').html('Select Payment Method');
				return false;	
			}
     	});
	</script>

<?php		
	} 
}

require "template.php"
?>