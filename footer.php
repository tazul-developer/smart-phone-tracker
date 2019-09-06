

<!-- Sticky Footer -->
  <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Techloare </span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>


<!--//Notification Modal-->
<!--//Notification Modal-->
<div id="notice" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Notifications</h4>
      </div>
      <div class="modal-body">
          
          
       <table class="table">

  
  <?php 
        $sql = "SELECT * FROM notifications";
        $result = $conn->query($sql);
       
        if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) { 
            $status = $row['status'];
            $no_id = $row['no_id'];
            if($status == 1){
    ?>
    
    
    
    
  <tbody>
    <tr class="text-primary">
      <td >
          <a  href="notification_map_api.php?aid=<?php echo $row['aid']; ?>&no_id=<?php echo $no_id; ?>">Mr. <?= $row["user_name"]; ?> recently <?= $row["note"]; ?> on our custom zone!</a>
      </td>
     <td>
       <?php
            $date = $row["created_at"];
            $timestamp = strtotime($date);
            $timestamp += 5 * 3600;
            echo date('h:i:sa - d M Y ', $timestamp);
        ?>
    </td>
      <td scope=""><a class ="" href="remove_notification.php?aid=<?php echo $row['aid']; ?>&no_id=<?php echo $no_id; ?>"><i class="fa fa-times" style="font-size:16px;color:red"></i></a></td>
    </tr>
   
  </tbody>
  
  
  <?php }else{ ?>
  
    <tbody>
    <tr class="text-inverse">
      <td >
          <a style = "color:black;" href="notification_map_api.php?aid=<?= $row['aid']; ?>&no_id=<?php echo $no_id; ?>"> Mr. <?= $row["user_name"]; ?> recently <?= $row["note"]; ?> on our custom zone!</a>
      </td>
     <td>
        <?php
            $date = $row["created_at"];
            $timestamp = strtotime($date);
            $timestamp += 5 * 3600;
            echo date('h:i:sa - d M Y ', $timestamp);
        ?>
    </td>
      <td scope=""><a class  ="" href="remove_notification.php?aid=<?php echo $row['aid']; ?>&no_id=<?php echo $no_id; ?>"><i class="fa fa-times" style="font-size:16px;color:red"></i></a></td>
    </tr>
   
  </tbody>

  
  <?php } } } ?> 
</table>
          
        
        
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!--//for Set value Modal-->
<!--//for set value Modal-->
<div id="set_value" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <?php echo $er; ?>
      <div class="modal-body">
         <form action="" method="post">
           <div class="form-group">
            
            <input type="number" class="form-control"  placeholder="Number" name="set_value" required>
          </div>
          <input type="submit" value="Submit">
        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-138990909-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-138990909-1');
</script>




  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>
