<?php include_once("header.php"); ?>
<head> <meta http-equiv="refresh" content="60" /> </head>
<?php 
//Set km form coustom area  
//Set km form coustom area 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $set_value = test_input($_POST["set_value"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
//if($set_value <=0){
//    $er = "Please enter a valid number";
//}else{
//    $km_sql = "UPDATE set_km SET set_value = '$set_value'";
//    if ($conn->query($km_sql) != TRUE) {
//        echo "Error updating record: " . $conn->error;
//    }
//}
 




// Distance calculation function
// Distance calculation function
function distance($lat1, $lon1, $lat2, $lon2, $unit) {
  if (($lat1 == $lat2) && ($lon1 == $lon2)) {
    return 0;
  }
  else {
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);

    if ($unit == "K") {
      return ($miles * 1.609344);
    } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
      return $miles;
    }
  }
}


// echo  distance(23.8092373, 90.4134632, 23.8150766, 90.4129418, "M") . " Miles<br>";
// echo distance(32.9697, -96.80322, 29.46786, -98.53506, "K") . " Kilometers<br>";
// echo distance(32.9697, -96.80322, 29.46786, -98.53506, "N") . " Nautical Miles<br>";

?>

<div id="content-wrapper">

<div class="container-fluid">


  <!-- DataTables Example -->
  <div class="card mb-3">

    <div class="card-body">
        
        
<?php 
    // get data from custom_area table
    // get data from custom_area table
    $sql        = "SELECT * FROM custom_area WHERE id = 1";
    $result     = $conn->query($sql);
    $row        = $result->fetch_assoc();
    
    $c_lat = $row["lat"];
    $c_lon = $row["lon"];


    
?>

<?php 
    // get data from set_km table for set km
    // get data from set_km table for set km
    $sql        = "SELECT * FROM set_km WHERE id = 1";
    $result     = $conn->query($sql);
    $row        = $result->fetch_assoc();
    
    $set_value = $row["set_value"];

?>
    <center>
        <h6>Inside of <span class ="text-primary"> <?= $set_value;?> km</span> at Bangladesh University  </h6> 
        <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#set_data">-->
        <!--      Set-distance-->
        <!--    </button>-->
    </center>
    <?php if($role==2){ ?>
    <center><a class ="btn btn-success btn-sm " data-toggle="modal" data-target="#set_value">set km</a></center>
    <?php } ;?>   
    
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
             <tr>
              <th scope="col">#</th>
              <th scope="col">Name </th>
              <th scope="col">Distance</th>
              <th scope="col">Area Status</th>
              <th scope="col">Last updated time</th>
            </tr>
          </thead>
 <?php       
        // get data from custom_area table
        // get data from custom_area table

        
        $sql        = "SELECT * FROM current_locations";
        $result     = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            $count= 1;
            while($row = $result->fetch_assoc()) { 
            
            $u_lat = $row['current_lat'];
            $u_lon = $row['current_lon'];
            $aid = $row["aid"];
            $user_name = $row["full_name"];
            $no_id = $row["no_id"];

            $dist = distance($u_lat, $u_lon, $c_lat, $c_lon, "K")."<br>"; 
            $f_dist = round($dist,2);
            $r_dist = round($dist);

  ?>
 

          <tbody>
             <tr>
                <td scope="row"><?= $count++; ?></td>
                <td>
                    <b>
                      <?= $user_name; ?>
                    </b>
                </td>
                <td><?= $f_dist ?> km</td>
                <td class = "text-center">
                    <?php 
                        if($f_dist < $set_value){
                            if($no_id == 1){
                                echo "<a class = 'text-success font-weight-bold'>in</a>";
                            }else{
                                $u_sql1 = "UPDATE current_locations SET no_id ='1' WHERE aid= '$aid'";
                                if($conn->query($u_sql1) === TRUE) {
                                    $r_sql = "INSERT INTO notifications (aid, user_name, status, note) VALUES ('$aid', '$user_name', '1', 'in')";
                                    if($conn->query($r_sql) === TRUE){
                                        echo "<a class = 'text-success font-weight-bold'>Newly in</a>";
                                    }
                                }
                            }
                            
                        }else{
                             
                            if($no_id == 0){
                                echo "<a class = 'text-danger font-weight-bold'>out</a>";
                            }else{
                                $u_sql2 = "UPDATE current_locations SET no_id ='0' WHERE aid= '$aid'";
                                if($conn->query($u_sql2) === TRUE) {
                                    $r_sql = "INSERT INTO notifications (aid, user_name, status, note) VALUES ('$aid', '$user_name', '1', 'out')";
                                    if($conn->query($r_sql) === TRUE){
                                        echo "<a class = 'text-danger font-weight-bold '>Newly out</a>";
                                    }
                                }
                            }
                        }
                    ?>
                </td>
                
                
                
                <td>
                    <?php
                        $date = $row["updated_at"];
                        $timestamp = strtotime($date);
                        $timestamp += 5 * 3600;
                        echo date('h:i:sa - d M Y ', $timestamp);
                    ?>
                </td>

            </tr>
          </tbody>
            <?php } }else {echo "0 results";} ?>
        </table>
      </div>
  
        
    </div>
    
  </div>
  
  
  
  

<?php include_once "footer.php";?>