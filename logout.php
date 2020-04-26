<?php 
    include_once("config.php");
    session_start();
?>

<!DOCTYPE html>
<html>
<body>
<?php
    // destroy the session 
    session_destroy(); 
?>
<script>window.location = "http://phone_tracker.testlogin.php";</script>
</body>
</html>