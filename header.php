
<?php 
    include_once("config.php");
    session_start();
    //$login_user  = $_SESSION['login_user'];
    if($_SESSION['login_user'] == null){ ?>
    <script>window.location = "http://phone_tracker.test/login.php";</script>
    
<?php }else{ $login_user  = $_SESSION['login_user'];}?>

<!--For administran only-->
<!--For administran only-->
<?php 
    $check_sql = "SELECT * FROM current_locations WHERE username = '$login_user'";
    if($check_sql == true){
        $result = $conn->query($check_sql);
        if ($result->num_rows > 0) {
            $role_row = $result->fetch_assoc();
            $role = $role_row['role'];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="images/map.jpg" type="image/gif" sizes="16x16">

  <title>Andriod Phone Tracker</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.php">Android Phone Tracker</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1" style=" padding-right: 10px;">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"  aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#notice">
           <span class="badge badge-danger"> <?php
              $sql        = "SELECT * FROM notifications where status = 1";
              $result     = $conn->query($sql);
              echo $rowcount=mysqli_num_rows($result);
              ?>
               </span>
            <i class="fas fa-bell fa-fw"></i>

             



        </a>
    
      </li>

      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw" style="font-size:22px;"></i> 
          <?= ucfirst($_SESSION['login_user']); ?> 
        </a>
        
        

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Change password</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

<!-- Sidebar -->
<ul class="sidebar navbar-nav">
  <li class="nav-item active">
    <a class="nav-link" href="index.php">
      <center><img src="images/location.png" alt="MAP" height="60" width="75" ></center>
    </a>
  </li>
  <!--<li class="nav-item dropdown">-->
  <!--  <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
  <!--    <i class="fas fa-fw fa-folder"></i>-->
  <!--    <span>Users</span>-->
  <!--  </a>-->
  <!--  <div class="dropdown-menu" aria-labelledby="pagesDropdown">-->
  <!--    <h6 class="dropdown-header">Login Screens:</h6>-->
  <!--    <a class="dropdown-item" href="login.html">Login</a>-->
  <!--    <a class="dropdown-item" href="register.html">Register</a>-->
  <!--    <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>-->
  <!--    <div class="dropdown-divider"></div>-->
  <!--    <h6 class="dropdown-header">Other Pages:</h6>-->
  <!--    <a class="dropdown-item" href="404.html">404 Page</a>-->
  <!--    <a class="dropdown-item" href="blank.html">Blank Page</a>-->
  <!--  </div>-->
  <!--</li>-->
  
  
    <li class="nav-item">
        <a class="nav-link" href="current_list.php">
          <i class="fas fa-fw fa fa-users" style="font-size:16px;color:green"></i>
          <span>Current user list</span></a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="distance_alart.php">
          <i class="fas fa-fw fa fa-road" style="font-size:16px;color:green"></i>
          <span>Distance reports</span></a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="custom_area.php">
          <i class="fas fa-fw fa-map-marker" style="font-size:16px;color:green"></i>
          <span>Custom area list</span></a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="random_list.php">
          <i class="fas fa-fw fa fa-clock" style="font-size:16px;color:green"></i>
          <span>Realtime data</span></a>
    </li>
    

    
   
   <?php if($role==2){ ?>
        
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fas fa-fw fa-address-card" style="font-size:16px;color:green"></i>
          <span>Manage user</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="register.php">Register new user</a>
          <a class="dropdown-item" href="user_list.php">User list</a>
        </div>
    </li>

      
   <?php } ;?>     
     
    
    
 

          
    
    
  <!--<li class="nav-item">-->
  <!--  <a class="nav-link" href="tables.php">-->
  <!--    <i class="fas fa-fw fa-table"></i>-->
  <!--    <span>Tables</span></a>-->
  <!--</li>-->
</ul>