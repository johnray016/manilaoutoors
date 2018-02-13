<?php
session_start();
require 'connection.php';

     if (!isset($_SESSION['admin_username'])) { 
         header('location: admin-login');
       } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Page - Manila Outdoors</title>
    
    <!-- Import favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png"/>
    
     <!--Import Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,500,700|Roboto+Condensed:400,700|Oswald:600|Open+Sans:400,700|Shadows+Into+Light" rel="stylesheet">

    <!--Import Fontawesome-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Import Slick Slider CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">

    <!-- Import Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <!--Import Custom CSS-->
    <link rel="stylesheet" href="assets/css/main.css">
    
    <!--Import jQuery-->
    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
</head>    

<body>
    <a href="#" id="back-to-top" title="Back to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>  
     <div class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggled tabs -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="assets/img/logo-horizontal.png" class="img-responsive"></a>
        </div>        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a data-toggle="tab" href="#products-tab">Products<span class="sr-only">(current)</span></a></li>
            <li><a data-toggle="tab" href="#categories-tab">Categories</a></li>
            <?php 
              if (isset($_SESSION['admin_username']) && $_SESSION['role'] == 'owner') { 
                   echo "<li><a data-toggle='tab' href='#dashboard-tab'>Orders</a></li>
                    <li><a data-toggle='tab' href='#customers-tab'>Customers</a></li>
                    <li><a data-toggle='tab' href='#staff-tab'>Manage Staff</a></li>";
               }  
            ?>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <?php
                  if (isset($_SESSION['admin_username'])) { 
                      $username = $_SESSION['admin_username'];
                      $sql = "SELECT * FROM admin_accounts WHERE admin_username = '$username'";
                      $result = mysqli_query($conn,$sql);
                      $row = mysqli_fetch_assoc($result);
                      extract($row);
                       echo "Logged in as $admin_username";
                   } else {
                      echo '';
                   }   
                ?>   
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Settings</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="admin_logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </div><!-- /.navbar -->
    <div class="admin-main">
      <?php admin_panel(); ?>
    </div>
    <div class="admin-footer">
      <p class="admin-page-footer text-center">© Manila Outdoors. 2018. All Rights Reserved. </p>
    </div>
     <!-- Import Slick Slider JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"></script>

    <!-- Import Bootstrap JS -->
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

    <!--Import Custom Javascript-->
    <script type="text/javascript" src="assets/js/custom.js"></script>
</body>
</html> 