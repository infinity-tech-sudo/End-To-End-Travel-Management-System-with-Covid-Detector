<?php   
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
header("location: Front1.html"); //to redirect back to "Front1.php" after logging out
exit();
?>