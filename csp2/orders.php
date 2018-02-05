<div class="table-responsive orders">          
  <table class="table">
    <thead>
      <tr class="orange">
        <th>INVOICE</th>
        <th>CUSTOMER</th>
        <th>TOTAL</th>
        <th>ORDER DATE</th>
        <th>STATUS</th>
        <th>VIEW ORDER</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT * FROM order_details od
              JOIN customers c
              ON (od.customer_id = c.id) ORDER BY od.invoice_number DESC";
      $result = mysqli_query($conn, $sql);
      while($customers = mysqli_fetch_assoc($result)) {
      extract($customers);
      $orderdate = date('F j, Y, g:i a', strtotime($date_ordered));
      echo"<tr>
        <td>$invoice_number</td>
        <td>$first_name".' '."$last_name</td>
        <td>".number_format($total, 2)."</td>
        <td>$orderdate</td>";
         if ($order_status == 'PENDING') {
          echo "<td><span class='btn-warning order_status'>$order_status<span></td>";
        } else if ($status != 'PENDING') {
           echo "<td><span class='btn-success order_status'>$order_status<span></td>";
        }

        
        echo "<td><button class='btn btn-info' data-toggle='modal' data-target='#viewOrder$invoice_number' data-index='$invoice_number'>View</button></td>
      </tr>";     
      ?>
      <!-- View orders -->
      <div id="viewOrder<?php echo $invoice_number; ?>" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">View Order</h4>
              </div>
              <div class="modal-body">
                <div>
                  <h4 class="orange">Account Details</h4>
                  <ul>
                    <li><strong>Name: </strong><?php echo $first_name.' '.$last_name?></li>
                    <li><strong>Email: </strong><?php echo $email?></li>
                    <li><strong>Contact Number: </strong><?php echo $contact_number?></li>
                  </ul>
                  <hr>
                  <h4 class="orange">Shipping and Billing Details</h4>
                  </ul> 
                    <li><strong>Street Address: </strong><?php echo $street_address; ?></li>
                    <li><strong>Barangay: </strong><?php echo $barangay; ?></li>
                    <li><strong>City: </strong><?php echo $city; ?></li>
                    <li><strong>Province: </strong><?php echo $province; ?></li>
                    <li><strong>Country: </strong><?php echo $country; ?></li>
                  </ul>
                  <hr>
                  <h4 class="orange">Payment Method</h4>
                <?php 
                $sql3 = "SELECT * FROM orders o JOIN payment_details pd ON (o.payment_id = pd.payment_id) WHERE o.invoice_number = $invoice_number";
                  $result2 = mysqli_query($conn, $sql3);
                  $payment = mysqli_fetch_assoc($result2);
                  extract($payment);
                  echo "<p>$payment_details</p>";
                ?>  
                <hr>
                <h4 class="orange">Shipping Information</h4>
                <span>Black Arrow Express (3-6 Business Days)</span>
                <hr>
                <h4 class="orange">Orders</h4>
                <?php 
                $sql3 = "SELECT * FROM orders o JOIN products p ON (o.product_id = p.product_ID) WHERE o.invoice_number = $invoice_number";
                  $result2 = mysqli_query($conn, $sql3);
                  while($orders = mysqli_fetch_assoc($result2)) {
                  extract($orders);
                     echo "<span>$product_name<span><br>
                     <span><span class='orange'>Qty:</span> $order_qty</span><br>
                     <span><span class='orange'>Price:</span> $price</span><br>";
                 }

                ?>
                <hr>
                <h4 class="orange">Amount</h4>
                <span><strong>Subtotal (Incl.Tax): &#8369; </strong> <?php $vat = $total*0.12;echo number_format($total, 2); ?></span><br>
                <span><strong>Subtotal (Excl.Tax): &#8369; </strong> 
                  <?php 
                  $subtotalETax = $total - $vat;
                  echo number_format($subtotalETax, 2);
                   ?></span><br>
                <span><strong>Total Tax: &#8369; </strong> <?php echo number_format($vat, 2); ?></span><br>
                <span><strong>Shipping Fee: &#8369; </strong>0.00</span><br>
                <span><strong>Total: &#8369; </strong><?php echo number_format($total, 2); ?></span><br>
                </div>
              </div>
              <div class="modal-footer">                          
                <a href="order_complete.php?invoice=<?php echo $invoice_number; ?>"><button type="submit" class="btn btn-success">Order Complete</button></a>  
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              </div>
            </div>

          </div>
        </div>  
      <?php } ?> 
    </tbody>
  </table>
</div>