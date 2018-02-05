
  <div class="tab-pane active" id="update-delete-products">
    <div class="row">
      <div class="table-responsive manage-products"> 
        <table class="table table-condensed">
            <thead>
              <tr>
                <th>ID</th>
                <th>IMAGE</th>
                <th>PRODUCT NAME</th>
                <th>SKU</th>
                <th>PRICE</th>
                <th>QUANTITY</th>                        
                <th>VIEW</th>
                <th>EDIT</th>
                <th>DELETE</th>
              </tr>
            </thead>
            <tbody>
      <?php          
      //Display all products in "Products > Update/Delete Products"
      $sql = "SELECT * FROM products prod 
      INNER JOIN categories cat ON (prod.category_id = cat.id)
      INNER JOIN brands brnd ON (prod.brand_id = brnd.id)
      ORDER BY product_ID DESC";
      $result = mysqli_query($conn, $sql);        
      while($products = mysqli_fetch_assoc($result)) {
      extract($products);
      $index = $product_ID;
          echo  "<tr>
                  <td>$product_ID</td>
                  <td><img src='$image' class='img-responsive'></td>
                  <td>$product_name</td>
                  <td>$sku</td>
                  <td>$price</td>
                  <td>$quantity</td>
                  <td><a href='product.php?index=$index&product_name=$product_name' target='_blank'><button class='btn btn-info'>View</button></a></td>
                  <td><button class='btn btn-success edit_modal' data-toggle='modal' data-target='#editModal$index' data-index='$index'>Edit</button></td>
                  <td>
                    <button class='btn btn-danger delete_modal' data-toggle='modal' data-target='#deleteModal$index' data-index='$index'>Delete</button>
                  </td>
                </tr>";

           //Delete Modal
            echo "<div id='deleteModal$index' class='modal fade' role='dialog'>
                    <div class='modal-dialog'>
                      <div class='modal-content'>
                        <div class='modal-header'>
                          <button type='button' class='close' data-dismiss='modal'>&times;</button>
                          <h4 class='modal-title'>Are you sure you want to delete this item?</h4>
                        </div>
                        <div class='modal-body' id='delete-modal-body'>
                          <div class='row delete-modal-container'>
                          <img src='$image' class='delete-modal-image'>
                          <h5><strong>$product_name</strong></h5>
                          <span class=' orange'><strong>Price:  &#8369;$price</strong></span><br>
                          </div>
                        </div>
                        <div class='modal-footer'>
                          <a href='delete.php?index=$index'>
                            <button type='button' class='btn btn-primary'>Yes</button>
                          </a>
                          <button type='button' class='btn btn-danger' data-dismiss='modal'>No</button>
                        </div>
                      </div>
                   </div>
                </div>";

            //Edit Modal
            echo "<div id='editModal$index' class='modal fade' role='dialog'>
                    <div class='modal-dialog'>
                      <div class='modal-content'>
                        <form method='post' action='edit.php?index=$index'>
                          <div class='modal-header'>
                            <button type='button' class='close' data-dismiss='modal'>&times;</button>
                            <h4 class='modal-title'>Edit item</h4>
                          </div>
                          <div class='modal-body' id='edit-modal-body'>
                            <div class='row edit-modal-container'>
                            <span class='orange'><strong>Product Name</strong></span>
                            <input type='text' value='$product_name' name='productName'>
                            <span class='orange'><strong>SKU</strong></span>
                            <input type='text' value='$sku'  name='sku'>
                            <span class='orange'><strong>Short Description</strong></span>
                            <textarea name='shortDescription'>$short_description</textarea>
                            <span class='orange'><strong>Long Description</strong></span>
                            <textarea name='longDescription'>$long_description</textarea>
                            <span class='orange'><strong>Features</strong></span>
                            <textarea name='features'>$features</textarea>
                            <span class='orange'><strong>Price</strong></span>
                            <input type='number' value='$price' name='price'>
                            <span class='orange'><strong>Quantity</strong></span>
                            <input type='number' value='$quantity' name='quantity'>
                            <span class='orange'><strong>Meta Title</strong></span>
                            <input type='text' value='$meta_title' name='metaTitle'>
                            <span class='orange'><strong>Meta Description</strong></span>
                            <textarea name='metaDescription'>$meta_description</textarea>
                            <span class='orange'><strong>Meta Keyword</strong></span>
                            <textarea name='metaKeywords'>$meta_keyword</textarea>
                            </div>
                          </div>
                          <div class='modal-footer'>                          
                              <button type='submit' class='btn btn-primary'>Save</button>
                            <button type='button' class='btn btn-danger' data-dismiss='modal'>Cancel</button>
                          </div>
                        </form>
                      </div>

                    </div>
                  </div>";    


                } 
        echo  "</tbody>
          </table>
         </div>                             
      </div>";

        
        
       
        ?>
    </div>

