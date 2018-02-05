<?php 

if (isset($_SESSION['username'])) { 
     header('location: index');
   } 
function display_title(){
	echo "Customer Account - Manila Outdoors";
}
function meta_description(){
	echo "";
}
function meta_keywords(){
	echo "Manila Outdoors, customer account, login, login page";
}
function display_content(){ 
 ?>
	<section class="customer-login">
		<div class="container">
			<div class="customer-login-box">				
				<div class="login-account-box">
					<h4>Registered Customers</h4>
					<form method="POST" action="authenticate.php">
						Username<span class="red">*</span> <br>	
						<input type="text" name="username" placeholder="Enter Username">
						<br>
						Password<span class="red">*</span> <br>	
						<input type="password" name="password" placeholder="Enter Password"><br>
						<div class="checkbox">
							<label><input type="checkbox"> Remember me</label>
						</div>
						<input type="submit" value="SIGN IN" class="btn btn-warning" name="login">
					</form>	
				</div>
				<div class="vertical-lign">
					<hr>
				</div>
				<div class="create-account-box">
					<h4>New Customers</h4>
					<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
					<a href="register-account"><button type="button" class="btn btn-warning">CREATE ACCOUNT</button></a>
				</div>
			</div>
		</div>
	</section>
<?php 
}

require "template.php"
?>