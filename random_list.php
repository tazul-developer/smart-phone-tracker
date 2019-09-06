<?php include_once("header.php"); ?>
<head> <meta http-equiv="refresh" content="15" /> </head>

<div id="content-wrapper">
  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header ">
      <b>Realtime Data from mobile apps</b></div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
             <tr>
              <th scope="col">#</th>
              <th scope="col">Username </th>
              <th scope="col">Android Id</th>
              <th scope="col">Latitude</th>
              <th scope="col">Longitude</th>
              <th scope="col">Last entry time</th>
              <th scope="col">Location</th>
            </tr>
          </thead>
            <?php 
                $sql = "SELECT current_locations.full_name, location_details.*  FROM current_locations LEFT JOIN location_details ON current_locations.aid =  location_details.aid ORDER BY location_details.id DESC LIMIT 10";
                $result = $conn->query($sql);
                $count = 1;
                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) { 
            ?>
            
          <tbody>
             <tr>
                <td scope="row"><?= $count++; ?></td>
                <td>
                    <b>
                      <?= $row["full_name"]; ?>
                    </b>
                </td>
                <td><?= $row["aid"]; ?></td>
                <td><?= $row["lat"]; ?></td>                                                                                                
                <td><?= $row["lon"]; ?></td>
                <td>
                    <?php
                    $date = $row["created_at"];
                    $timestamp = strtotime($date);
                    $timestamp += 5 * 3600;
                    echo date('h:i:sa - d M Y ', $timestamp);
                ?>
                </td>
                
                <td><center><a href="map_api.php?aid=<?php echo $row['aid']; ?>"><img src="images/map.jpg" alt="MAP" height="35" width="35"> </a></center
                </td>
            </tr>
          </tbody>
            <?php } }else {echo "0 results";} ?>
        </table>
      </div>
    </div>
  </div>
 </div>
<?php include_once("footer.php");?>