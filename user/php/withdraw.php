<?php
    ini_set('display_errors', 1);

    require "../config/db.php";
    require "../php/func.php";
    require "../php/query.php";

    $email = $_SESSION['mail'];

    $selecting = new Select($link);
    $selecting->more_details("WHERE email = ?, $email");
    $value = $selecting->pull("walletbalance, profit, refcode, referred, username, password", "users");
    if($value[1] > 0) {
        $row1 = $value[0][0];

        $pdbalance = $row1['walletbalance'];
        $pdprofit = $row1['profit'];
        $refcode = $row1['refcode'];
        $referred = $row1['referred'];
        $username = $row1['username'];
        $password = $row1['password'];
    }
    $selecting->reset();


    $selecting = new Select($link);
    $selecting->more_details("WHERE email = ?, $admin");
    $wl = $selecting->pull("wl", "settings")[0][0]['wl'];
    $selecting->reset();
?>