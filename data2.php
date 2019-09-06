<?php
include_once "config.php";

//  file_put_contents("lookatthis.txt", $_GET['lat'],  FILE_APPEND );

$aid        = $_GET["aid"];
$latitude   = $_GET["lat"];
$longitude  = $_GET["lon"];

if ($aid != null && $latitude != null && $longitude != null){
    
    // Data All  data insert to  locations table 
    $sql = "INSERT INTO location_details (aid, lat, lon) VALUES ('$aid', '$latitude', '$longitude')";
    if($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $update_sql = "REPLACE INTO current_locations SET
        current_lat ='$latitude',
        current_lon ='$longitude'
         aid= '$aid'";

    if($conn->query($update_sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    
    
    
    //Get Data from location_details table 
    //Get Data from location_details table 
    // $get_sql= "SELECT * FROM location_details ORDER BY created_at DESC LIMIT 1";
    // if($get_sql == true){
    //     $result = $conn->query($get_sql);
    //     if ($result->num_rows > 0) {
    //         while($data = $result->fetch_assoc()){
    //             $u_aid = $data['aid'];
    //             $u_lat = $data['lat'];
    //             $u_lon = $data['lon'];
                
    //             $u_sql1 = "UPDATE current_locations SET 
    //                 current_lat ='$u_lat',
    //                 current_lon ='$u_lon'
    //                 WHERE aid= '$u_aid'";
    //             if ($conn->query($u_sql1) === TRUE) {
    //                 echo "New record created successfully";
    //             } else {
    //                 echo "Error: " . $sql . "<br>" . $conn->error;
    //             }
    //         }
    //     }
    // }
    
}

?>