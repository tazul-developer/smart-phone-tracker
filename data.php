<?php

include_once "config.php";

//  file_put_contents("lookatthis.txt", $_GET['lat'],  FILE_APPEND );

$aid        = $_GET["aid"];
$latitude   = $_GET["lat"];
$longitude  = $_GET["lon"];

if ($aid != null && $latitude != null && $longitude != null){
    
    // Data All  data insert to  locations table 
    $sql = "INSERT INTO location_details (aid, lat, lon) VALUES ('$aid', '$latitude', '$longitude')";
    $conn->query($sql);
    
    //Data Update quiery  
  //Data Update quiery  
        $u_sql1 = "UPDATE current_locations SET 
            current_lat ='$latitude',
            current_lon ='$longitude'
                WHERE aid= '$aid'";
        if($u_sql1 == TRUE){
            $conn->query($u_sql1);
        }else{
            $sql_insert = "INSERT INTO current_locations (aid, current_lat, current_lon) VALUES ('$aid', '$latitude', '$longitude')";
               $conn->query($sql_insert);
                
        }
    }
        
      


    
    


?>