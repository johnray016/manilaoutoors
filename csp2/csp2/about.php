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
	<section class="about">
		<div class="container">
			<h3><strong>WHO </strong>&nbsp;WE ARE</h3>	
			<p>At <strong>Manila Outdoors</strong>, we think getting ‘out there’ is even better together.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla at ligula eget mi commodo blandit ut in dolor. Nullam in tortor at diam feugiat hendrerit. Aliquam at nulla consequat, fringilla nibh non, aliquam augue. Suspendisse potenti. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras ipsum ante, imperdiet eget congue eu, scelerisque nec mauris. Nullam cursus hendrerit metus, a interdum risus auctor id. Nulla libero neque, bibendum ut ultrices vel, blandit nec nibh. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam et lacus nulla. Duis porta sodales lacus dapibus gravida. Maecenas in eros mollis, iaculis felis quis, hendrerit augue. Aenean hendrerit ornare suscipit. In quis rhoncus libero. Aliquam posuere leo ullamcorper, gravida erat ut, posuere turpis. Donec ultricies tincidunt accumsan.</p>
			<p>
			Sed pellentesque quam eget nunc aliquet accumsan. Suspendisse porta tellus purus, non ullamcorper mauris imperdiet quis. Aliquam leo nunc, convallis eu nisl rhoncus, tincidunt blandit arcu. Proin efficitur urna quis semper bibendum. Ut sed nunc rutrum, pellentesque urna ac, feugiat mi. Cras luctus magna sit amet ipsum rutrum, sed posuere nunc accumsan. Aenean pretium sit amet enim at bibendum. Sed nec elementum augue. Sed sit amet elit mi. In dui nulla, condimentum.</p>
		</div>
	</section>

<?php	
}

require "template.php"
?>