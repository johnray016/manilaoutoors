 <?php


$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
require 'connection.php';
?>
  
 <nav>       
    <div class="nav-wrapper">

        <div class="nav-container-left">
          <img src="assets/img/logo.png" alt="" class="logo">  
        </div>

        <div class="search-box-container">
          <input type="text" class="search-box" placeholder="Search for outdoor gears">
          <i class="fa fa-search" aria-hidden="true"></i>
        </div> 
        
        <div class="nav-button-container">
          <ul class="nav-button">
            <li><a href="customer-care" target="_blank"><i class="fa fa-question-circle-o" aria-hidden="true"></i> CUSTOMER CARE</a></li>
            <?php
              echo isset($_SESSION['username']) ?
              '<li id="my-account-toggle"><span class="my-accout"><i class="fa fa-user" aria-hidden="true"></i> MY ACCOUNT <i class="fa fa-angle-down" aria-hidden="true"></i></span>
                    <div id="myaccount-menu">
                       <ul id="myaccount-menu-box">
                         <li><a href="my-account">My Account</a></li>
                         <li><a href="">Wishlist</a></li>
                         <li><hr></li>                         
                         <li><a href="logout.php">Sign out</a></li>
                       </ul> 
                    </div>
              </li>' :
              '<li id="login-toggle"><span class="login-text"><i class="fa fa-sign-in aria-hidden="true"></i> SIGN IN <i class="fa fa-angle-down" aria-hidden="true"></i></span>
                    <div id="login-menu">
                       <ul id="login-menu-box">
                         <form method="POST" action="authenticate.php">
                            Username<br> 
                            <input type="text" name="username" placeholder="Enter Username">
                            <br>
                            Password<br> 
                            <input type="password" name="password" placeholder="Enter Password"><br>
                            <div class="checkbox">
                                <label><input type="checkbox"> Remember me</label>
                            </div>
                            <input type="submit" value="LOGIN" class="btn btn-warning" name="login"><br>
                            <span>Don&#39;t have an account? Sign up here.</span>
                            <a href="register-account"><button type="button" class="btn btn-default">CREATE ACCOUNT</button></a>
                        </form> 
                       </ul> 
                    </div>
              </li>' ;
            ?>            
          </ul>              
          <a href="cart"><i class="fa fa-shopping-cart" aria-hidden="true">
            <?php 
                 
                 if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                    $totalquantity = 0;
                    foreach($_SESSION['cart'] AS $index => $orderQuantity) {
                        $totalquantity = $totalquantity + $orderQuantity;
                      }
                    if ($totalquantity > 0) {
                      echo "<span class='badge'><strong>$totalquantity</strong></span>";
                    } else {
                      echo "<span><strong></strong></span>";   
                    } 
                }
            ?>   
                   
            
          </i></a>
        </div>
        <div id="mySidemenu" class="sidemenu">
          <a href="javascript:void(0)" class="close" onclick="closeMenu()">
            <i class="fa fa-times" aria-hidden="true""></i></a>           
              
            <?php
              if (isset($_SESSION['username'])) { 
                  $username = $_SESSION['username'];
                  $sql = "SELECT * FROM customers WHERE username = '$username'";
                  $result = mysqli_query($conn,$sql);
                  $row = mysqli_fetch_assoc($result);
                  extract($row);
                   echo "<h4>Hello $first_name</h4>";
               } else {
                  echo '';
               }   
            ?>   

            <ul id="mySideNav">              
                <a href="index"><li>HOME</li></a>

                <?php
                $sql = "SELECT * FROM categories";
                $result = mysqli_query($conn, $sql);
                while($categories = mysqli_fetch_assoc($result)) {
                extract($categories);
                echo "<a href='shop-all.php?category=$category_name'><li>".strtoupper($category_name)."</li></a>";                
                    }
                ?>
            </ul>
            <a href="customer-care"><i class="fa fa-question-circle-o" aria-hidden="true"></i>CUSTOMER CARE</a>
            <br>  

             <?php

              echo isset($_SESSION['username']) ? '<a href="logout.php"><i class="fa fa-user" aria-hidden="true"></i>SIGN OUT</a>' : '<a href="customer_account.php"><i class="fa fa-user" aria-hidden="true"></i>SIGN IN</a>' ;
            ?>            
            
        </div>
        <div class="nav-bottom-container">
            <ul class="menu">              
                <a href="index"><li>HOME</li></a>
               <?php
                $sql = "SELECT * FROM categories";
                $result = mysqli_query($conn, $sql);
                while($categories = mysqli_fetch_assoc($result)) {
                extract($categories);
                echo "<a href='shop_all.php?category=$category_name'><li>".strtoupper($category_name)."</li></a>";                
                    }
                ?>
            </ul>
            <i class="fa fa-bars" aria-hidden="true" onclick="openMenu()"></i>            
        </div>
        
    </div>
</nav>