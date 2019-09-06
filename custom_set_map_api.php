<?php include_once("header.php"); ?>

<?php 


// Get Custom location from custom_area Table
// Get Custom location from custom_area Table
$c_id    = $_GET["c_id"];
$c_sql        = "SELECT * FROM custom_area WHERE id = $c_id";
$c_result     = $conn->query($c_sql);
$c_row        = $c_result->fetch_assoc();

$c_lat = $c_row["lat"];
$c_lon = $c_row["lon"];
$c_area_name = $c_row["area_name"];

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
   <li class=""><center>Welcome to <?= $c_area_name;?></center> </li>
  </ol>
 
    <!--The div element for the map -->
<div id="map"></div>
<script>
      var map;
      var myLatLng = {lat:<?= $c_lat;?>, lng: <?= $c_lon;?>}
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom:12,
          center: myLatLng
        });
        
        var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title:"<?= $c_area_name;?>"
        });
      }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyDbCroG_6o4_MQMCJ-wfSDmp7a2TRAyPpI&callback=initMap"type="text/javascript"></script>

<?php include_once("footer.php");?>