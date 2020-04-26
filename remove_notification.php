<?php include_once"header.php";?>

<?php 
      $aid   = $_GET["aid"];  
      $no_id   = $_GET["no_id"];  
      $del_q = "DELETE FROM notifications WHERE aid = '$aid' and no_id = '$no_id'";
      $result     = $conn->query($del_q); ?>
      <script>window.location = "http://phone_tracker.test";</script>
<?php ?>
 <?php include_once"footer.php";?>