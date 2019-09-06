<?php include_once("header.php");?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aid        = test_input($_POST["aid"]);
    $full_name  = test_input($_POST["full_name"]);
    $email      = test_input($_POST["email"]);
    $phone      = test_input($_POST["phone"]);
    $username   = test_input($_POST["username"]);
    $passcode   = test_input($_POST["passcode"]);
    $passcode   = md5($passcode);
    
    if ($aid != null && $full_name != null && $email != null && $phone != null && $username != null &&  $passcode != null){
    
        $r_sql = "INSERT INTO current_locations (aid, full_name, email, phone, username, passcode) VALUES ('$aid', '$full_name', '$email', '$phone', '$username', '$passcode')";
         if($conn->query($r_sql) === TRUE) {
            $success =  "New record created successfully";
        } else {
            echo "Error: " . $r_sql . "<br>" . $conn->error;
        }
    }else{
        echo $err = "Failed!";
    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>




<div class="container" style ="margin-top:40px; width:100%">
    <div class ="col-md-12 col-sm-12 ">
        <center><h5>User Registration list</h5></center> <hr>
        <center> <?= $success; ?> </center> <center> <?= $err; ?> </center>
    	<form action = "" method="post">
    	    
    	    <div class="form-group input-group">
        		<div class="input-group-prepend">
        		    <span class="input-group-text"> <i class="fa fa-mobile"></i> </span>
        		 </div>
                <input name="aid" class="form-control" placeholder="Android ID" type="text" required>
            </div> <!-- form-group// -->
            
        	<div class="form-group input-group">
        		<div class="input-group-prepend">
        		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
        		 </div>
                <input name="full_name" class="form-control" placeholder="Full name" type="text" required>
            </div> <!-- form-group// -->
            
            <div class="form-group input-group">
            	<div class="input-group-prepend">
        		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
        		 </div>
                <input name="email" class="form-control" placeholder="Email address" type="email" required>
            </div> <!-- form-group// -->
            
            <div class="form-group input-group">
            	<div class="input-group-prepend">
        		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
        		</div>
            	<input name="phone" class="form-control" placeholder="Phone number" type="text" required>
            </div> <!-- form-group// -->
            
        	
            <div class="form-group input-group">
        		<div class="input-group-prepend">
        		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
        		 </div>
                <input name="username" class="form-control" placeholder="username" type="text" required>
            </div> <!-- form-group// -->
            
            <div class="form-group input-group">
            	<div class="input-group-prepend">
        		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
        		</div>
                <input class="form-control" placeholder="Create password" type="password" name="passcode" required>
            </div> <!-- form-group// --> 
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
            </div> <!-- form-group// -->      
            <p class="text-center">Have an account? <a href="">Log In</a> </p>                                                                 
        </form>
 <!-- card.// -->
    </div>
</div>

<div class=" col-md-6 col-sm-6" style="margin:20px;" >
    <center><h5 class="text-primary">Live data testing</h5></center><hr>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" >
          <thead>
             <tr>
              <th scope="col">#</th>
              <th scope="col">Android Id</th>
              <th scope="col">Last entry</th>
              <th scope="col">Location</th>
            </tr>
          </thead>
            <?php 
                $sql = "SELECT * FROM location_details ORDER BY id DESC LIMIT 5";
                $result = $conn->query($sql);
                $count = 1;
                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) { 
            ?>
            
          <tbody>
             <tr>
                <td scope="row"><?= $count++; ?></td>

                <td><?= $row["aid"]; ?></td>

                <td>
                    <?php
                    $date = $row["created_at"];
                    $timestamp = strtotime($date);
                    $timestamp += 5 * 3600;
                    echo date('h:i:sa', $timestamp);
                ?>
                </td>
                <td><center><a href="map_api.php?aid=<?php echo $row['aid']; ?>"><img src="images/map.jpg" alt="MAP" height="35" width="35"> </a></center
                </td>

            </tr>
          </tbody>
            <?php } }else {echo "0 results";} ?>
        </table>
      </div>
</div>





 



 
<?php include_once("footer.php");?>
