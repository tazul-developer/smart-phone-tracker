<?php include_once("header.php"); ?>

<div id="content-wrapper">

<div class="container-fluid">


  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header text-justify" >
      <b>Custom Location List</b></div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
             <tr>
              <th scope="col">#</th>
              <th scope="col">Location Name </th>
              <th scope="col">Latitude</th>
              <th scope="col">Longitute</th>
              <th scope="col">Last updated time</th>
              <th scope="col">Location</th>
            </tr>
          </thead>
<?php 
$sql = "SELECT * FROM custom_area";
$result = $conn->query($sql);
$count = 1;
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) { ?>
          <tbody>
              <tr>
            <td scope="row"><?= $count++; ?></td>
            <td><?= $row["area_name"]; ?></td>
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
         
            <td><center><a href="custom_set_map_api.php?c_id=<?php echo $row['id']; ?>"><img src="images/map.jpg" alt="MAP" height="35" width="35"> </a></center></td>
        </tr>
          </tbody>
               
<?php } }else {echo "0 results";} ?>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>
<?php include_once("footer.php");?>