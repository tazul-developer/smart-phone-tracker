<?php include_once"header.php";?>

<?php 
  $aid      = $_GET["aid"];  
  $id    = $_GET["id"];  
  $del_q = "DELETE FROM current_locations WHERE aid = '$aid' and id = '$id'";
  $result     = $conn->query($del_q); ?>
  <script>window.location = "http://phone_tracker.testuser_list.php";</script>
<?php ?>
 <?php include_once"footer.php";?>