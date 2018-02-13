<?php 
function display_title(){
	echo "Contact - Manila Outdoors";
}
function meta_description(){
	echo "Thank you for choosing Manila Outdoors.";
}
function meta_keywords(){
	echo "Manila Outdoors, contact, contact us, email, address";
}
function display_content(){ 
	?>
	<section class="contact">
		<h3 class="text-center"><strong>CONTACT</strong>&nbsp;DETAILS</h3>	
		<div class="container">
			<div class="contact-details">
				<p>Thank you for choosing <strong>Manila Outdoors.</strong><br>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati totam porro ipsam iure mollitia et, ex tempore quis neque inventore debitis facere, officiis, veritatis sunt. Qui, sed! Error doloremque, eaque!</p>
				<ul>
					<li><span class="fa-stack fa-lg"><i class="fa fa-square fa-stack-2x" aria-hidden="true"></i><i class="fa fa-phone fa-stack-1x" aria-hidden="true"></i></span> (02) 632 0000</li>
					<li><span class="fa-stack fa-lg"><i class="fa fa-square fa-stack-2x" aria-hidden="true"></i><i class="fa fa-envelope fa-stack-1x" aria-hidden="true"></i></span> info@manilaoutdoors.com</li>
					<li><span class="fa-stack fa-lg"><i class="fa fa-square fa-stack-2x" aria-hidden="true"></i><i class="fa fa-map-marker fa-stack-1x" aria-hidden="true"></i></span> 3rd Floor Caswynn Building, No. 134 Timog Avenue, Sacred Heart, Diliman, Quezon City, 1103 Metro Manila</li>
				</ul>
				<p><strong>Customer Service Hours:</strong><br>
				Monday - Friday <br>	
				9:00am - 4:00pm </p>
			</div>
			<div class="map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.407933363737!2d121.04160121491697!3d14.632770089782003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b7afe6dd8817%3A0x1301863d86ca644!2sTuitt+Incorporated!5e0!3m2!1sen!2sph!4v1516502511917" width="400" height="300" frameborder="0" style="border:0" allowfullscreen ></iframe>
			</div>
		</div>
	</section>

<?php	
}

require "template.php"
?>