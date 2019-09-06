<?php include_once("header.php"); ?>

<?php 
// Get Android id from ID from user Data list
// Get Android id from ID from user Data list
$aid    = $_GET["aid"];
$u_sql     = "SELECT * FROM current_locations WHERE aid = '$aid'";
$u_result  = $conn->query($u_sql);
$u_row     = $u_result->fetch_assoc();

$u_lat = $u_row["current_lat"];
$u_lon = $u_row["current_lon"];
$u_name = $u_row["full_name"];


// Get Custom location from custom_area Table
// Get Custom location from custom_area Table
$c_sql        = "SELECT * FROM custom_area WHERE id = 1";
$c_result     = $conn->query($c_sql);
$c_row        = $c_result->fetch_assoc();

$c_lat = $c_row["lat"];
$c_lon = $c_row["lon"];
$c_area_name = $c_row["area_name"];

// Distance Calculation from custom location from user location
// Distance Calculation from custom location from user location
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

$dist = distance($u_lat, $u_lon, $c_lat, $c_lon, "K"); 
$f_dist = round($dist,2);
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
   
  #map {
    height: 400px;  
    width: 100%; 
   }
</style>
<div id="content-wrapper">
<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
   <li class=""><center>Hi, You are <spam><b><?= $f_dist;?>km</b></spam> away from <?= $c_area_name;?></center> </li>
  </ol>
 
    <!--The div element for the map -->
<div id="map"></div>
<script>
      var map;
      var myLatLng = {lat:<?= $u_lat;?>, lng: <?= $u_lon;?>}
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom:15,
          center: myLatLng
        });
        
        var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title:"<?= $u_name;?>"
        });
      }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyDbCroG_6o4_MQMCJ-wfSDmp7a2TRAyPpI&callback=initMap"type="text/javascript"></script>

<?php include_once("footer.php");?>