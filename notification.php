<?php include_once("header.php"); ?>
<head> <meta http-equiv="refresh" content="15" /> </head>

<div id="content-wrapper">
  <!-- DataTables Example -->
  <div class="card md-8">
    <div class="container">
    
           
           
<table class="table">
  <thead>
    <tr>
      <th scope="col">Notifications</th>
      <th scope="col">Time</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  
  
  
  <?php 
        $sql = "SELECT * FROM notifications";
        $result = $conn->query($sql);
       
        if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) { 
            $status = $row['status'];
            if($status == 1){
    ?>
    
  <tbody>
    <tr class="text-primary">
      <td >
          <a  href="view_notification.php?n_id=<?= $no_id;?>">Mr.<?= $row["user_name"]; ?> recently <?= $row["note"]; ?> on our custom zone!</a>
      </td>
     <td>
       <?php echo $date = $row["created_at"];?>
    </td>
      <td scope=""><a class ="#"><i class="fa fa-times" style="font-size:16px;color:red"></i></a></td>
    </tr>
   
  </tbody>
  
  
  <?php }else{ ?>
  
    <tbody>
    <tr class="text-dark">
      <td >
          <a> Mr.<?= $row["user_name"]; ?> recently <?= $row["note"]; ?> on our custom zone!</a>
      </td>
     <td>
       <?php echo  $date = $row["created_at"];?>
    </td>
      <td scope=""><a class ="#"><i class="fa fa-times" style="font-size:16px;color:red"></i></a></td>
    </tr>
   
  </tbody>

  
  <?php } } } ?> 
</table>
          

    </div>
  </div>
 </div>
<?php include_once("footer.php");?>