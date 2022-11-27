<?php
    ini_set('display_errors', 1);

    require "../config/db.php";
    require "../php/func.php";
    require "../php/query.php";

    $id = $_SESSION['id'];
    $email = $_SESSION['mail'];

    $selecting = new Select($link);
    $selecting->more_details("WHERE id = ? LIMIT 1, $id");
    $value = $selecting->pull("pdate, pname, duration, increase, usd, refcode, walletbalance, initial_balance, profit, counting, activate", "users");
    $selecting->reset();
    if($value[1] > 0) {
        $row = $value[0][0];

        $pdate = $row['pdate'];
        $pkgName = $row['pname'];
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

    $withdrawn = 0;
    $wstatus = 'completed';
    $selecting->more_details("WHERE email = ? AND status = ?, $email, $wstatus");
    $value = $selecting->pull("SUM(moni) as wtotal", "wbtc");


    if($value[0][0]['wtotal'] != ""){
        $withdrawn = $value[0][0]['wtotal'];
    }else{
        $withdrawn = 0;
    }

    if(isset($pdate) && ($pdate != null && $pdate != '0') && ($duration != null || $duration != 0) && $active == 1) {

        $percentage = ($increase/100) * $usd;

        $ptime = strtotime($pdate);
        $ctime = strtotime(date('Y-m-d H:i:s'));

        $daysCount = (60 * 60) * 24;

        $daysCount = (($ctime - $ptime)/$daysCount);

        $daysCount = floor($daysCount);

        $zero = 0;
        $empty = "";

        // First check if there is a running package
        if($active === 1):

            // Check if the due date has been reached
            if($daysCount >= $duration):
                if($pkgName == "MINING"):
                    // MINING PACKAGE


                else:
                    // REGULAR PACKAGES

                    // Due date has been reached
                    // Save profit and reset
                    $totalProfit = $percentage * $duration;
                    // Reset

                    $updating = new Update($link, "SET activate = ?, walletbalance = walletbalance + ?, profit = ?, increase = ?, pname = ?, counting = ?, duration = ?, froms = ? WHERE email = ?#, $zero# $totalProfit# $zero# $zero# $empty# $zero# $zero# $zero# $email");
                    $updating->mutate('iiiisiiis', 'users');
                endif;

            else:
                if($pkgName == "MINING"):
                    // MINING PACKAGE

                    // Check if a 3 day interval has been reached
                    $interval = $daysCount % 3;
                    print_r($interval);


                else:
                    // REGULAR PACKAGES
                    // Due date hasn't been reached yet
                    $totalProfit = $percentage * $daysCount;

                    $updating = new Update($link, "SET profit = ? WHERE email = ?# $totalProfit# $email");
                    $updating->mutate('is', 'users');
                endif;

            endif;
        endif;

        /*
        if(isset($days) && $days == 0 || $days < 0 || $Date2 == (date("Y/m/d")) || $counting == 0) {

            $pp = $percentage;
            //UPDATE THE PACKAGE WHEN IT HAS ENDED TO DEFAULT 0 AND ADD THE PROFIT TO THE BALANCE

            $zero = 0;
            $empty = "";
            $new_balance = $wallet_balance + $profit;

            $updating = new Update($link, "SET activate = ?, walletbalance = ?, profit = ?, increase = ?, pname = ?, counting = ? WHERE email = ?#, $zero# $new_balance# $zero# $zero# $empty# $zero# $email");
            if($updating->mutate('iiiisis', 'users')){
                $percentage = $pp = 0;
            }

        }else{
            if($counting != $days) {
                $times = $duration - $days;
                $pp = $percentage;
                 
                $days_profit = $pp * $times;

                $updating = new Update($link, "SET profit = ?, counting = ? WHERE email = ?# $days_profit# $days# $email");
                $updating->mutate('iis', 'users');
                 
                
                $_SESSION['pprofit'] = $percentage;
            }
        }*/
    }else{
        $daily = "";
        $percentage ="0";
    }

?>