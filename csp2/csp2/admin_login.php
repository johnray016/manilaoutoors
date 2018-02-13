<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Login - Manila Outdoors</title>    

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
    <div class="admin-login-page">
      <div class="admin-login-container">
        <h3>Login to Admin Panel</h3>
          <form method="POST" action="authenticate.php">
            Username <span class="red">*</span> <br> 
            <input type="text" name="adminUsername" placeholder="Enter Username" id="adminUsername">
            <br>
            Password <span class="red">*</span> <br> 
            <input type="password" name="adminPassword" placeholder="Enter Password" id="adminPassword"><br>
            <input type="submit" value="LOGIN" class="btn btn-warning" name="adminLogin" id="adminLogin">
            <span id="error-admin-login"></span>
          </form> 
      </div>
    </div>


    

     <!-- Import Slick Slider JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"></script>

    <!-- Import Bootstrap JS -->
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

    <!--Import Custom Javascript-->
    <script type="text/javascript" src="assets/js/custom.js"></script>
</body>
</html> 