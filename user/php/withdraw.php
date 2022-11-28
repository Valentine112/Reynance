<?php
    ini_set('display_errors', 1);

    $email = $_SESSION['mail'];

    $selecting = new Select($link);
    $selecting->more_details("WHERE email = ?, $email");
    $value = $selecting->pull("walletbalance, profit, refcode, referred, btc, eth, shiba, usdt, username, password", "users");
    if($value[1] > 0) {
        $row1 = $value[0][0];

        $pdbalance = $row1['walletbalance'];
        $pdprofit = $row1['profit'];
        $refcode = $row1['refcode'];
        $referred = $row1['referred'];
        $btc = $row1['btc'];
        $eth = $row1['eth'];
        $shiba = $row1['shiba'];
        $usdt = $row1['usdt'];
        $username = $row1['username'];
        $password = $row1['password'];
    }
    $selecting->reset();

    /*$selecting = new Select($link);
    $selecting->more_details("WHERE email = ?, $admin");
    $wl = $selecting->pull("wl", "settings")[0][0]['wl'];
    $selecting->reset();*/
?>