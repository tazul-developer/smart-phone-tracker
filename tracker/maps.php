<?php
include_once ("../config.php");



// file_put_contents("lookatthis.txt", $_GET['pp'],  FILE_APPEND );
$aid    = $_GET["aid"];
$u_sql     = "SELECT * FROM current_locations WHERE aid = '$aid'";
$u_result  = $conn->query($u_sql);
$u_row     = $u_result->fetch_assoc();

$u_lat = $u_row["current_lat"];
$u_lon = $u_row["current_lon"];
$u_name = $u_row["full_name"];

?>


<!DOCTYPE html>
<html>
  <head>
      
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 450px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>

    
  </head>
  <body style="background-color: #D8BFD8;">
    <h3>Hello <?php echo $u_name; ?></h3>
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
  </body>
</html>
