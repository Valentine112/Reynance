<?php
    session_start();

    if(!isset($_SESSION['logged']) || !$_SESSION['logged']){
        header("location: ../logs/login.php");
    }
    $admin = "admin@delunance.com";
?>