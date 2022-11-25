<?php
    ini_set('display_errors', 1);

    require "../config/db.php";
    require "../php/func.php";
    require "../php/query.php";
    
    $refcode = $_SESSION['refcode'];
    $zero = 0;
    $selecting = new Select($link);
    $selecting->more_details("WHERE referred = ? AND verify = ?, $refcode, $zero");
    $value = $selecting->pull("username, email, verify", "users");
    $selecting->reset();

?>