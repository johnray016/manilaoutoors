<ul class="nav nav-pills nav-stacked col-md-2">
  <li class="active"><a href="#apparels-tab" data-toggle="pill">Apparels</a></li>
  <li><a href="#backpacks-tab" data-toggle="pill">Backpacks</a></li>
  <li><a href="#tents-tab" data-toggle="pill">Tents</a></li>
  <li><a href="#hiking-gears-tab" data-toggle="pill">Hiking Gears</a></li>
  <li><a href="#hammocks-tab" data-toggle="pill">Hammocks</a></li>
  <li><a href="#sleeping-gears-tab" data-toggle="pill">Sleeping Gears</a></li>
</ul>
<div class="tab-content col-md-10 categories-container">
        <div class="tab-pane active" id="apparels-tab">
             <div class="table-responsive">          
                <table class="table">
                  <thead>
                    <tr class="orange">
                      <th></th>
                      <th>PRODUCT NAME</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php
                $sql = "SELECT * FROM products JOIN categories ON(products.category_ID = categories.id) WHERE categories.id = 1 ORDER BY categories.id DESC";
                $result = mysqli_query($conn, $sql);
                while($categories = mysqli_fetch_assoc($result)) {
                extract($categories);
                echo "<tr>
                        <td><img src='$image' class='img-responsive'></td>
                        <td>$product_name</td>
                      </tr>";                
                    }
                ?>
                   </tbody>
               </table>
            </div>
        </div>
        <div class="tab-pane" id="backpacks-tab">
            <div class="table-responsive">          
                <table class="table">
                  <thead>
                    <tr class="orange">
                      <th></th>
                      <th>PRODUCT NAME</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php
                $sql = "SELECT * FROM products JOIN categories ON(products.category_ID = categories.id) WHERE categories.id = 2 ORDER BY categories.id DESC";
                $result = mysqli_query($conn, $sql);
                while($categories = mysqli_fetch_assoc($result)) {
                extract($categories);
                echo "<ul>
                      <tr>
                        <td><img src='$image' class='img-responsive'></td>
                        <td>$product_name</td>
                      </tr>";                
                    }
                ?>
                   </tbody>
               </table>
            </div>
        </div>
        <div class="tab-pane" id="tents-tab">
            <div class="table-responsive">          
                <table class="table">
                  <thead>
                    <tr class="orange">
                      <th></th>
                      <th>PRODUCT NAME</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php
                $sql = "SELECT * FROM products JOIN categories ON(products.category_ID = categories.id) WHERE categories.id = 3 ORDER BY categories.id DESC";
                $result = mysqli_query($conn, $sql);
                while($categories = mysqli_fetch_assoc($result)) {
                extract($categories);
                echo "<ul>
                      <tr>
                        <td><img src='$image' class='img-responsive'></td>
                        <td>$product_name</td>
                      </tr>";                
                    }
                ?>
                   </tbody>
               </table>
            </div>
        </div>
        <div class="tab-pane" id="hiking-gears-tab">
            <div class="table-responsive">          
                <table class="table">
                  <thead>
                    <tr class="orange">
                      <th></th>
                      <th>PRODUCT NAME</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php
                $sql = "SELECT * FROM products JOIN categories ON(products.category_ID = categories.id) WHERE categories.id = 4 ORDER BY categories.id DESC";
                $result = mysqli_query($conn, $sql);
                while($categories = mysqli_fetch_assoc($result)) {
                extract($categories);
                echo "<ul>
                      <tr>
                        <td><img src='$image' class='img-responsive'></td>
                        <td>$product_name</td>
                      </tr>";                
                    }
                ?>
                   </tbody>
               </table>
            </div>
        </div>
        <div class="tab-pane" id="hammocks-tab">
            <div class="table-responsive">          
                <table class="table">
                  <thead>
                    <tr class="orange">
                      <th></th>
                      <th>PRODUCT NAME</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php
                $sql = "SELECT * FROM products JOIN categories ON(products.category_ID = categories.id) WHERE categories.id = 5 ORDER BY categories.id DESC";
                $result = mysqli_query($conn, $sql);
                while($categories = mysqli_fetch_assoc($result)) {
                extract($categories);
                echo "<ul>
                      <tr>
                        <td><img src='$image' class='img-responsive'></td>
                        <td>$product_name</td>
                      </tr>";                
                    }
                ?>
                   </tbody>
               </table>
            </div>
        </div>
        <div class="tab-pane" id="sleeping-gears-tab">
            <div class="table-responsive">          
                <table class="table">
                  <thead>
                    <tr class="orange">
                      <th></th>
                      <th>PRODUCT NAME</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php
                $sql = "SELECT * FROM products JOIN categories ON(products.category_ID = categories.id) WHERE categories.id = 6 ORDER BY categories.id DESC";
                $result = mysqli_query($conn, $sql);
                while($categories = mysqli_fetch_assoc($result)) {
                extract($categories);
                echo "<ul>
                      <tr>
                        <td><img src='$image' class='img-responsive'></td>
                        <td>$product_name</td>
                      </tr>";                
                    }
                ?>
                   </tbody>
               </table>
            </div>
        </div>
</div><!-- tab content <--></-->"