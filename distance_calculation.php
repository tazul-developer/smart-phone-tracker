<?php include_once("header.php"); ?>

<?php

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
    <div class="card-header">
      <i class="fas fa-table"></i>
      Updated location List</div>
    <div class="card-body">
        
        
<?php 
    $sql        = "SELECT * FROM custom_area WHERE id = 1";
    $result     = $conn->query($sql);
    $row        = $result->fetch_assoc();
    
    $c_lat = $row["lat"];
    $c_lon = $row["lon"];
    
    $u_lat = "23.8092373";   
    $u_lon = "90.4134632";
    
    $dist = distance($u_lat, $u_lon, $c_lat, $c_lon, "K") . " Kilometers<br>"; 
    $f_dist = substr($dist, 0, 4);
    
?>
        
    <center><h6>You are <spam><?= $f_dist;?></spam> kilometers away from Bangladesh University</h6> </center>   
        
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>
<?php include_once("footer.php");?>