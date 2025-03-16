<?php
session_start(); 


session_destroy();


echo '<script>localStorage.removeItem("isLoggedIn"); window.location.href = "index.php";</script>';
exit();
?>