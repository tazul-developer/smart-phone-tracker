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
<script>window.location = "http://techlore.net/login.php";</script>
</body>
</html>