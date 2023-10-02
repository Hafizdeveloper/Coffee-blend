<?php include "header/nav.php" ?>
<?php include "config/config.php" ?>
<?php 
    session_destroy();
    unset($_SESSION['userId']);
    unset($_SESSION['userName']);
    unset($_SESSION['userEmail']);
    header('location:login.php')
?>