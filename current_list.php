<?php include_once("header.php"); ?>
<head> <meta http-equiv="refresh" content="30" /> </head>

<div id="content-wrapper">

<div class="container-fluid">


  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header"><b>User list with location</b></div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
             <tr>
              <th scope="col">#</th>
              <th scope="col">Name </th>
              <th scope="col">latitude</th>
              <th scope="col">Longitute</th>
              <th scope="col">Last updated time</th>
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
            
          
            
            
            <td>
                <b>
               <?= $row["full_name"]; ?>
                 
                </b>
            </td>
            <td><?= $row["current_lat"]; ?></td>
            <td><?= $row["current_lon"]; ?></td>
            <td>
               <?php
                    $date = $row["updated_at"];
                    $timestamp = strtotime($date);
                    $timestamp += 5 * 3600;
                    echo date('h:i:sa - d M Y ', $timestamp);
                ?>
            </td>
         
            <td><center><a href="map_api.php?aid=<?php echo $row['aid']; ?>"><img src="images/map.jpg" alt="MAP" height="35" width="35"> </a></center></td>
        </tr>
          </tbody>
               
<?php } }else {echo "0 results";} ?>
        </table>
      </div>
    </div>
  </div>
<?php include_once("footer.php");?>