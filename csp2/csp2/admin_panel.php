<?php function admin_panel(){
    require "connection.php"
    ?>
    <div class="container admin-page-body">
          <div class="tab-content"> 
          <div id="dashboard-tab" class="tab-pane fade">
             <h3>Orders</h3>
             <?php require "orders.php"; ?> 
          </div>
          <div id="categories-tab" class="tab-pane fade">
            <h3>Manage Categories</h3>
           <?php require "categories.php"; ?> 
          </div>
          <div id="customers-tab" class="tab-pane fade">
            <h3>Manage Customers</h3>
           <?php require "customers.php"; ?> 
          </div>
          <div id="products-tab" class="tab-pane fade in active">
            <div class="nested-tabs">
                <div class="tabbable tabs-left">
                <h3>Manage Products</h3>
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#update-delete-products" data-toggle="tab">Update/Delete Products</a></li>
                  <li><a href="#add-products" data-toggle="tab">Add Products</a></li>
                </ul>
                    <div class="tab-content">
                      <?php require "update_delete_products.php"; ?>   
                      <?php require "add_product.php"; ?>                      
                    </div>
                </div>
            </div>      
          </div>
          <div id="staff-tab" class="tab-pane fade">
           <?php require "manage_staff.php"; ?> 
          </div>
        </div>  
    </div>
<?php    
}
require "admin_panel_template.php"
?>