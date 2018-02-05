<?php 
function display_title(){
	echo "Register Account - Manila Outdoors";
}
function meta_description(){
	echo "";
}
function meta_keywords(){
	echo "Manila Outdoors, register, sign-up";
}
function display_content(){ 
	?>

	<section class="register">
		<div class="container">
			<div class="registration">
				<h3><strong>REGISTER</strong> HERE</h3>
			    <form action="register_endpoint.php" method="POST" onsubmit="return validateRegistration()">
			    	<div class="account-details">
			    		<h4>ACCOUNT DETAILS</h4>
						<div class="form-group">
					      <label for="username">Username:</label><span class="red"> *</span>
					      <input type="text" class="form-control" id="username" name="username">
					      <span id="username_error"></span>
					    </div>
					    <div class="form-group">
					      <div class="password-container">	
						      <label for="password">Password:</label><span class="red"> *</span><br>
						      <input type="password" class="form-control" id="password" name="password">
					      	  <span>Must be 6-20 characters</span>
					      </div>
					      <div class="confirm-password-container">
						      <label for="confirmPassword">Confirm Password:</label><span class="red"> *</span><br>
						      <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
					      	  <span id="password_error"></span>
					      </div>
					    </div>
				    </div>
				    <div class="personal-details">
				    	<h4>PERSONAL DETAILS</h4>
					    <div class="form-group">
					      <label for="firstName">First Name:</label><span class="red"> *</span>
					      <input type="text" class="form-control" id="firstName" name="firstName">
					    </div>
					    <div class="form-group">
					      <label for="lastName">Last Name:</label><span class="red"> *</span>
					      <input type="text" class="form-control" id="lastName" name="lastName">
					    </div>
					    <div class="form-group email">
					      <label for="email">Email:</label><span class="red"> *</span>
					      <input type="email" class="form-control" id="email" name="email">
					    </div>
					    <div class="form-group phone">
					      <label for="phone">Contact Number:</label><span class="red"> *</span>
					      <input type="text" class="form-control" id="phone" name="phone">
					    </div>
				    </div>
				    <div class="address-details">
				    	<h4>ADDRESS DETAILS</h4>
					    <div class="form-group">
					      <label for="streetAddress">Street Address:</label><span class="red"> *</span>
					      <input type="text" class="form-control" id="streetAddress" name="streetAddress">
					    </div>
					    <div class="form-group">
					      <label for="barangay">Barangay:</label><span class="red"> *</span>
					      <input type="text" class="form-control" id="barangay" name="barangay">
					    </div>
					    <div class="form-group">
					      <label for="city">City:</label><span class="red"> *</span>
					      <input type="text" class="form-control" id="city" name="city">
					    </div>
					    <div class="form-group">
					      <label for="province">Province:</label><span class="red"> *</span>
					      <input type="text" class="form-control" id="province" name="province">
					    </div>
					    <div class="form-group">
					      <label for="country">Country:</label><span class="red"> *</span>
					      <input type="text" class="form-control" id="country" name="country">
					    </div>
				    </div>
				    <div>
				    	<h4>NEWSLETTER</h4>
					    <div class="checkbox">
				          <label><input type="checkbox"> Sign up in Newsletter</label>
				        </div>
				        <hr>
				        <h4>TERMS AND CONDITIONS</h4>
				        <div class="checkbox">
				          <label><input type="checkbox" id="confirm_TAC"> I confirm I have read and understand and agree with the <a href="terms_and_conditions.php" class="orange">Terms &amp; Conditions</a> <span class="red">*</span></label>
				        </div>
			        </div>
			        <div class="registration-error-container">
			       		 <span id="registration_error"></span><br>
			        </div>
				    <button type="submit" class="btn btn-warning pull-right" name="register" value="register" id="submit-registration">Submit</button>
			    </form>
		    </div>
		</div>    
	</section>



	<!-- SCRIPT -->
	<script type="text/javascript">

		//check if username has a duplicate in the database	(validate)
		$('#username').on('keyup', function(){
			var username = $(this).val()
			$.ajax({
				method: 'post',
				url: 'authenticate.php',
				data: {
					register : true,
					username : username
				},
				success: function(data){
					if(data=='invalid'){
						$('#username_error').css('color','red')
						$('#username_error').html('username exists')
					} else if(data=='valid'){
						$('#username_error').css('color','green')
						$('#username_error').html('available')		
					}
				}
			})
		})	

		//check if the "Confirm Password" is the same as "password" (validate)
		$('#confirmPassword').on('input', function(){
			if($('#password').val() != $('#confirmPassword').val()){
				$('#password_error').css('color','red')
				$('#password_error').html('passwords do not match')
			} else {
				$('#password_error').css('color','green')
				$('#password_error').html('passwords matched')
			}
		})

		// Form will not submit if there are EMPTY required fields
		function validateRegistration() {
			let username = $('#username').val();
			let password = $('#password').val();
			let confirmPassword = $('#confirmPassword').val();
			let firstName = $('#firstName').val();
			let lastName = $('#lastName').val();
			let email = $('#email').val();
			let streetAddress = $('#streetAddress').val();
			let barangay = $('#barangay').val();
			let city = $('#city').val();
			let province = $('#province').val();
			let phone = $('#phone').val();
			let country = $('#country').val();
			if (username == '' || password == '' || confirmPassword == '' || firstName == '' || lastName == '' || email == '' || streetAddress == '' || barangay == '' || city == '' || province == '' || phone == '' || country == '' || $("#confirm_TAC").is(":not(:checked)")) {
				$('#registration_error').css('color','red');
				$('#registration_error').html('Please fill out required * fields.');
				$('.registration-error-container').addClass("alert alert-danger");			
				return false;	
			} else {
				return true;
			}
		};
	</script>


<?php	
}

require "template.php"
?>