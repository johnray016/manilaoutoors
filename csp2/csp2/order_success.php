<?php 
function display_title(){
	echo "About - Manila Outdoors";
}
function meta_description(){
	echo "Manila Outdoors has a wide range of camping gears, hiking equipment and outdoor apparels. ";
}
function meta_keywords(){
	echo "Manila Outdoors, hiking equipment, camping gears, outdoor gear";
}
function display_content(){ 
	?>
	<section class="order-sucess">
		<div class="container">
			<div class="row order-sucess-container">
				<div class="col-xs12 col-sm-6 text-center alert alert-success">
					<h3>Your order is place</h3>
					<p>Please track your order in "<a href="my-account"><strong>My Account</strong></a>"</p>
				</div>
			</div>
		</div>
	</section>

<?php	
}

require "template.php"
?>