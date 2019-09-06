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
              <th scope="col">latitude</th>
              <th scope="col">Longitute</th>
              <th scope="col">Last updated time</th>
              
              <th scope="col">Action </th>
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
            
            <td>
                <a class ="btn btn-primary btn-sm" href="edit_user.php"><i class="far fa-edit"></i></a> |
                <a class ="btn btn-danger btn-sm" href="delete_user.php"><i class="fa fa-trash"></i></a>
            </td>
         
            
        </tr>
          </tbody>
               
<?php } }else {echo "0 results";} ?>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>
<?php include_once("footer.php");?>