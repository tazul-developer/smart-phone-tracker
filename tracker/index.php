<?php include_once("../config.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Custom Area Notifications</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #D8BFD8;">

<div class="container">
 
 <center><h2><b>Phone tracker </b></h2></center> <hr>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username </th>
      <th scope="col">Android Id</th>
      <th scope="col">Current_lat</th>
      <th scope="col">Current_lon</th>
      <th scope="col">Updated time</th>
      <th scope="col">Location</th>
    </tr>
  </thead>
  
<?php 
$sql = "SELECT * FROM current_locations";
$result = $conn->query($sql);
$count = 1;
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) { ?>
            
    <tbody>
        <tr>
            <td scope="row"><?= $count++; ?></td>
            <td><?=  $row["full_name"];?></td>
            <td><?= $row["aid"]; ?></td>
            <td><?= $row["current_lat"]; ?></td>
            <td><?= $row["current_lon"]; ?></td>
            <td>
               <?php
               echo $date = $row["updated_at"];
                 
                ?>
            </td>
         
            <td><a href="maps.php?aid=<?php echo $row['aid']; ?>"><img src="../images/map.jpg" alt="MAP" height="42" width="42"> </a></td>
        </tr>
    </tbody> 
            
            
        <?php }
    }else {
    echo "0 results";
    }
?>

</table>

 
</div>

</body>
</html>
