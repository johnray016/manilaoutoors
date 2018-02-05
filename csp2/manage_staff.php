<div class="tab-pane" id="add-products">
	<div class="row">
		<h3>Create Staff Accounts</h3>
		<form method="POST" action="create_admin_account.php">
			<div class="add-products-container">
				<div>
					<div class="form-group">
				      <label for="staffUsername">Username:</label><span class="red"> *</span>
				      <input type="text" class="form-control" id="staffUsername" name="staffUsername">
				    </div>
				    <div class="form-group">	
				      <label for="staffPassword">Password:</label><span class="red"> *</span><br>
				      <input type="text" class="form-control" id="staffPassword" name="staffPassword">
				    </div>
				    <div class="form-group">	
				      <label for="staffRole">Role:</label><span class="red"> *</span><br>
				      <input type="text" class="form-control" id="staffRole" name="staffRole">
				    </div>
				    <div class="form-group">
				    <button class="btn btn-primary">Create</button>
				</div>    
			</div>
	    </form>
	</div>	
</div>			
