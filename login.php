<?php
   include_once("config.php");
   session_start();
   
   if(isset($_SESSION['login_user'])){ ?>
       
    <script>window.location = "http://phone_tracker.test";</script>

<?php    }
   
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn, $_POST["username"]);
      $mypassword = mysqli_real_escape_string($conn, md5($_POST["password"])); 
      
      $sql = "SELECT id FROM current_locations WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
        if($count == 1) {
             $_SESSION['login_user'] = $myusername; 
             $login_user = $_SESSION['login_user'];
             ?>
        <script>window.location = "http://phone_tracker.test";</script>
<?php   }else{
         $error = "Your Login Name or Password is invalid";
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

  <title>Android Phone Tracker</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div ><center><img src="images/location.png" alt="MAP" height="160" width="180" style= "padding:10px;" ></center></div>
      <div class="card-header"><center><h4><b>Smart Phone Tracking System</b></h4></center></div>
      
      <center><div style = "font-size:16px; color:#cc0000; padding:10px"><?php if(isset($error)){ echo $error;} ?></div></center>
      <div class="card-body">
          
        <form action = "" method = "post">
          <div class="form-group" >
            <div class="form-label-group">
              <input type="text" id="inputEmail" class="form-control" placeholder="Username" required="required" autofocus="autofocus" name="username">
              <label for="inputEmail">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required" name="password">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <!--<a class="btn btn-default btn-block " href="index.html">Login</a>-->
          <input type = "submit" value = " Submit " class="btn_ex btn btn-default btn-block"/><br />
        </form>
        
        <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
  
  <style>
      
      .btn_ex{
          background-color:#14506A !important;
      }
  </style>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
