<?php
include_once "config.php";

file_put_contents("lookatthis.txt", $_GET["dist"],  FILE_APPEND );


$aid        = $_GET["aid"];
$latitude   = $_GET["lat"];
$longitude  = $_GET["lon"];
// $spd  = $_GET["spd"];//
$dist  = $_GET["dist"]; //float type
// $sl         = $_GET["sl"]; // text type data pass


$r_sql = "INSERT INTO raw_data (aid, lat, lon, dist) VALUES ('$aid', '$latitude', '$longitude', '$dist')";
 if($conn->query($r_sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $r_sql . "<br>" . $conn->error;
}


$u_sql1 = "UPDATE current_locations SET 
        current_lat ='$latitude',
        current_lon ='$longitude'
        WHERE aid= '$aid'";
if ($conn->query($u_sql1) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
        }
  

?>
  