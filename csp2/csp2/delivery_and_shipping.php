<?php 
function display_title(){
	echo "Delivery and Shipping - Manila Outdoors";
}
function meta_description(){
	echo "We aim to provide you with the best service we can.";
}
function meta_keywords(){
	echo "Manila Outdoors, delivery, shipping";
}
function display_content(){ 
	?>
	<section class="delivery-and-shipping">
		<div class="container">
			<h3 class="text-center"><strong>DELIVERY </strong>&nbsp;and <strong>SHIPPING </strong></h3>
			<p>We aim to provide you with the best service we can - if you have any questions about our shipping, please don’t hesitate to contact us at customerservice@babysleepstore.com.au or 1300 413 400.</p><br>
			<h4>STANDARD SHIPPING</h4>
			<p>Standard Deliviries usually takes 6-11 days depending on your location.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet repellat, repellendus, dolor nulla necessitatibus, alias nesciunt deserunt autem odit et iusto obcaecati assumenda sapiente perspiciatis illo cum quos rerum.</p><br>
			<h4>EXPRESS SHIPPING</h4>
			<p>Express Deliviries usually takes 1-2 days depending on your location.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet repellat, repellendus, dolor nulla necessitatibus, alias nesciunt deserunt autem odit et iusto obcaecati assumenda sapiente perspiciatis illo cum quos rerum.</p><br>

		</div>
	</section>

<?php	
}

require "template.php"
?>