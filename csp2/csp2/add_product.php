<div class="tab-pane" id="add-products">
	<div class="row">
		<form method="POST" enctype='multipart/form-data' action="add_new_item.php"  onsubmit="return validateAddProduct()">
			<div class="add-products-container">
				<div>
					<div class="form-group">
				      <label for="productName">Product name:</label><span class="red"> *</span>
				      <input type="text" class="form-control" id="productName" name="productName">
				    </div>
				    <div class="form-group">	
				      <label for="sku">SKU:</label><span class="red"> *</span><br>
				      <input type="text" class="form-control" id="sku" name="sku">
				    </div>
				    <div class="form-group">
				      <label for="shortDescription">Short Description:</label><span class="red"> *</span>
				      <textarea class="form-control" id="shortDescription" name="shortDescription"></textarea>
				    </div>
				    <div class="form-group">
				      <label for="longDescription">Long Description:</label><span class="red"> *</span>
				      <textarea class="form-control" id="longDescription" name="longDescription"></textarea>
				    </div>
				    <div class="form-group">
				      <label for="featuresDescription">Features:</label>
				      <textarea class="form-control" id="featuresDescription" name="featuresDescription"></textarea>
				    </div>
				    <div class="form-group">
				      <label for="productPrice">Price:</label><span class="red"> *</span>
				      <input type="number" class="form-control" id="productPrice" name="productPrice" min="0">
				    </div>
				</div>
				<div>
				    <div class="form-group">
				      <label for="productQuantity">Quantity:</label>
				      <input type="number" class="form-control" id="productQuantity" name="productQuantity" value="0" min="0">
				    </div>
					<div class="form-group">
				      <label for="img">Image:</label><span class="red"> *</span>
				      <input type="file" class="form-control" id="img" name="img">
				    </div>
				    <div class="form-group">
				      <label for="productCategory">Category:</label><span class="red"> *</span><br>
				      <select name='productCategory' id="productCategory"><option value="" disabled selected>--Select Category</option>
						 <?php 

						    $sql = "SELECT * FROM categories";
							$result = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_assoc($result)){
								extract($row);
								echo "<option value='$id'>$category_name</option>";
							}
							echo "</select>";
						 ?>
				    </div>
				    <div class="form-group">
				      <label for="productBrand">Brand:</label><span class="red"> *</span><br>
				      <select name='productBrand' id="productBrand"><option value="" disabled selected>--Select Brand</option>
						 <?php 

						    $sql = "SELECT * FROM brands";
							$result = mysqli_query($conn,$sql);
							while($brands = mysqli_fetch_assoc($result)){
								extract($brands);
								echo "<option value='$id'>$brand_name</option>";
							}
							echo "</select>";
						 ?>
				    </div>
				    <div class="form-group">	
				      <label for="metaTitle">Meta Title:</label><span class="red"> *</span><br>
				      <input type="text" class="form-control" id="metaTitle" name="metaTitle">
				      <span class="orange">Keep it under 67 characters</span>
				    </div>
				    <div class="form-group">
				      <label for="metaDescription">Meta Description:</label><span class="red"> *</span><br>
				      <textarea class="form-control" id="metaDescription" name="metaDescription"></textarea>
				      <span class="orange">Keep it under 160 characters</span>
				    </div>
				    <div class="form-group">
				      <label for="metaKeywords">Meta Keywords:</label><span class="red"> *</span><br>
				      <textarea class="form-control" id="metaKeywords" name="metaKeywords"></textarea>
				    </div>
				    <span id="add-new-item-error"></span><br>
		   			<button type="submit" class="btn btn-warning" name="addNewItem" value="addNewItem">Submit</button>
			    </div>
			</div>
	    </form>
	</div>	
</div>			

<script>
	// // Form will not submit if there are EMPTY required fields
	// 	function validateAddProduct() {
	// 		let productName = $('#productName').val();
	// 		let sku = $('#sku').val();
	// 		let shortDescription = $('#shortDescription').val();
	// 		let longDescription = $('#longDescription').val();
	// 		let productPrice = $('#productPrice').val();
	// 		let img = $('#img').val();
	// 		let metaTitle = $('#metaTitle').val();
	// 		let metaDescription = $('#metaDescription').val();
	// 		let metaKeywords = $('#metaKeywords').val();
	// 		if (productName == '' || sku == '' || shortDescription == '' || longDescription == '' || productPrice == '' || img == '' || metaTitle == '' || metaDescription == '' || metaKeywords == '') {
	// 			$('#add-new-item-error').css('color','red');
	// 			$('#add-new-item-error').html('Please fill out required * fields.');
	// 			$('#add-new-item-error').addClass("bg-danger");			
	// 			return false;	
	// 		} else {
	// 			return true;
	// 		}
	// 	};





	// $('#addNewItem').submit(function(e){
	// 	e.preventDefault();
	// 		$.ajax({
	// 			method: 'post',
	// 			url: 'add_new_item.php',
	// 			data: {
	// 				addNewItem : true,
	// 				productName : productName,
	// 				sku : sku,
	// 				shortDescription : shortDescription,
	// 				longDescription : longDescription,
	// 				productPrice : product-price,
	// 				productQuantity : productQuantity,
	// 				img : img,
	// 				productCategory : productCategory,
	// 				metaDescription : metaDescription,
	// 				metaKeywords : metaKeywords
	// 			},
	// 			success: function(data){
					
	// 			}
	// 		})
	// 	})		
</script>