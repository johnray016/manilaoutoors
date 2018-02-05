<?php 
require ('connection.php');
function display_title(){
	echo "My Account - Manila Outdoors";
}
function meta_description(){
	echo "";
}
function meta_keywords(){
	echo "";
}
function display_content(){ 
	global $conn;
	?>
	<section id="my-account">
		<div class="container">
			<?php 
			if (isset($_SESSION['username'])) {
			    $username = $_SESSION['username'];
			    $sql = "SELECT * FROM customers WHERE username = '$username'";
			    $result = mysqli_query($conn, $sql);
			    $row = mysqli_fetch_assoc($result);		
				extract($row);							
			}		
			?>
			<h2 class="text-center"><strong>Hi,  <?php echo $first_name.' '.$last_name; ?></strong></h2>
				<div class="col-sm-3 col-xs-12">
					<h4 class="text-center orange">Account Information</h4>
					<hr>
					<ul>
						<li><strong>First Name: </strong><?php echo $first_name; ?></li>
						<li><strong>Last Name: </strong><?php echo $last_name; ?></li>
						<li><strong>Username: </strong><?php echo $username; ?></li>
						<li><strong>Email: </strong><?php echo $email; ?></li>
						<li><strong>Contact Number: </strong><?php echo $contact_number; ?></li>
					</ul>
					<hr>
					<h4 class="text-center orange">Shipping and Billing Address</h4>
					</ul>	
						<li><strong>Street Address: </strong><?php echo $street_address; ?></li>
						<li><strong>Barangay: </strong><?php echo $barangay; ?></li>
						<li><strong>City: </strong><?php echo $city; ?></li>
						<li><strong>Province: </strong><?php echo $province; ?></li>
						<li><strong>Country: </strong><?php echo $country; ?></li>
					</ul>
					<button class="btn btn-warning" data-toggle="modal" data-target="#updateAccount">Update</button>
					<a href='deactivate.php?index=<?php echo $id; ?>'><button class="btn btn-danger" >Deactivate Account</button></a>

					<!-- Update Account Information Modal -->
					<div id="updateAccount" class="modal fade" role="dialog">
	                    <div class="modal-dialog">
	                      <div class="modal-content">
	                        <form method="post" action="update_account.php?index=<?php echo $id; ?>">
	                          <div class="modal-header">
	                            <button type="button" class="close" data-dismiss="modal">&times;</button>
	                            <h4 class="modal-title">Update Account Information</h4>
	                          </div>
	                          <div class="modal-body">
	                            <div class="row update-account-container">
	                            <span class="orange"><strong>First Name</strong></span>
	                            <input type="text" value="<?php echo $first_name; ?>" name="firstName"> 
	                            <span class="orange"><strong>Last Name</strong></span>
	                            <input type="text" value="<?php echo $last_name; ?>" name="lastName">  
	                            <span class="orange"><strong>Username</strong></span>
	                            <input type="text" value="<?php echo $username; ?>" name="username">  
	                            <span class="orange"><strong>Contact Number</strong></span>
	                            <input type="text" value="<?php echo $contact_number; ?>" name="contactNumber">  
	                            <span class="orange"><strong>Email</strong></span>
	                            <input type="text" value="<?php echo $email; ?>" name="email">
	                            <span class="orange"><strong>Street Address</strong></span>
	                            <input type="text" value="<?php echo $street_address; ?>" name="streetAddress"> 
	                            <span class="orange"><strong>Barangay</strong></span>
	                            <input type="text" value="<?php echo $barangay; ?>" name="barangay">  
	                            <span class="orange"><strong>City</strong></span>
	                            <input type="text" value="<?php echo $city; ?>" name="city">  
	                            <span class="orange"><strong>Province</strong></span>
	                            <input type="text" value="<?php echo $province; ?>" name="province">  
	                            <span class="orange"><strong>Country</strong></span>
	                            <input type="text" value="<?php echo $country; ?>" name="country">
	                            </div>
	                          </div>
	                          <div class="modal-footer">                          
	                              <button type="submit" class="btn btn-primary">Save</button>
	                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button><br>
	                          </div>
	                        </form>
	                      </div>

	                    </div>
	                  </div>   <br><br>
				</div>		
				<div class="col-sm-9 col-xs-12 table-responsive">
				 <h4 class="text-center orange">Order History</h4>
				 <hr>
				 <table class="table">
				    <thead>
				      <tr class="orange">
				        <th>Invoice</th>
				        <th>Order</th>
				        <th>Total</th>
				        <th>Order Date</th>
				        <th>Status</th>
				      </tr>
				    </thead>
				    <tbody>
				      <?php
				      if (isset($_SESSION['username'])) {
						    $username = $_SESSION['username'];
						    $sql = "SELECT * FROM customers WHERE username = '$username'";
						    $result = mysqli_query($conn, $sql);
						    $row = mysqli_fetch_assoc($result);		
							extract($row);
						}
					 $customerID = $id;	

				    $sql = "SELECT * FROM order_details od
				              JOIN customers c
				              ON (od.customer_id = c.id) WHERE customer_id = '$id' ORDER BY od.invoice_number DESC";
				      $result = mysqli_query($conn, $sql);
				      while($customers = mysqli_fetch_assoc($result)) {
				      extract($customers);
				      $orderdate = date('m-d-y', strtotime($date_ordered));
				      echo"<tr>
				        <td>$invoice_number</td>
				        <td>";
				        $sql2 = "SELECT * FROM orders o JOIN products p ON (o.product_id = p.product_ID) WHERE o.invoice_number = $invoice_number";
					        $result2 = mysqli_query($conn, $sql2);
					        while($orders = mysqli_fetch_assoc($result2)) {
					        extract($orders);
					           echo "<span>$product_name<span><br>
					           <span><span class='orange'>Qty:</span> $order_qty</span><br>
					           <span><span class='orange'>Price:</span> $price</span><br>";

					       }
				  echo "</td>
				        <td>".number_format($total, 2)."</td>
				        <td>$orderdate</td>";
				        if ($order_status == 'PENDING') {
				          echo "<td><span class='btn-warning order_status'>$order_status<span></td>";
				        } else if ($status != 'PENDING') {
				           echo "<td><span class='btn-success order_status'>$order_status<span></td>";
				        }
				     echo "</tr>";
				 	  }
				      ?>
				    </tbody>
				  </table>					
				</div>


		</div>
	</section>

<?php	
}

require "template.php"
?>