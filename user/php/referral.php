<?php
    ini_set('display_errors', 1);
    
    $id = $_SESSION['id'];
    $email = $_SESSION['mail'];
    $refcode = $_SESSION['refcode'];
    $zero = 0;

    $selecting = new Select($link);
    $selecting->more_details("WHERE id = ? LIMIT 1, $id");
    $value = $selecting->pull("pdate, duration, increase, usd, refcode, walletbalance, initial_balance, profit, counting, activate", "users");
    $selecting->reset();
    if($value[1] > 0) {
        $row = $value[0][0];

        $pdate = $row['pdate'];
        $duration = $row['duration'];
        $increase = $row['increase'];
        $usd = $row['usd'];
        $refcode = $row['refcode'];
        $wallet_balance = $row['walletbalance'];
        $initial_balance = $row['initial_balance'];
        $profit = $row['profit'];
        $counting = $row['counting'];
        $active = $row['activate'];

        if($wallet_balance == null) $wallet_balance = 0;
        if($profit == null) $profit = 0;
        if($increase == null) $increase = 0;
        if($counting == null) $counting = 0;
        if($duration == null) $duration = 0;
        if($usd == null) $usd = 0;
    
    }

    
    $selecting->more_details("WHERE referred = ? AND verify = ?, $refcode, $zero");
    $value = $selecting->pull("username, email, verify", "users");
    $selecting->reset();

?>