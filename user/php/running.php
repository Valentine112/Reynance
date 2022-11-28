<?php
    ini_set('display_errors', 1);

    $email = $_SESSION['mail'];

    $selecting = new Select($link);
    $selecting->more_details("WHERE email = ?, $email");
    $value = $selecting->pull("pname, increase, pdate, date, usd, duration, profit, activate, walletbalance, counting, bonus", "users");
    $selecting->reset();

    if($value[1] > 0):
        $row = $value[0][0];
        $profit = $row['profit'];
        $pdate = $row['pdate'];
        $duration = $row['duration'];
        $increase = $row['increase'];
        $usd = $row['usd'];
        $profiting = $row['profit'];
        $counting = $row['counting'];
        $wallet_balance = $row['walletbalance'];

        
        if(isset($row['pdate']) &&  ($row['pdate'] != '0' && $row['pdate'] != '') && isset($row['duration'])  && isset($row['increase'])  && isset($row['usd']) && $row['activate'] == 1):

            
            $endpackage = new DateTime($pdate);
            $endpackage->modify( '+ '.$duration. 'day');
            $Date2 = $endpackage->format('Y-m-d');
            $current=date("Y/m/d");

            $diff = abs(strtotime($Date2) - strtotime($current));
            $one = 1;

            $date3 = new DateTime($Date2);
            $date3->modify( '+'. $one.'day');
            $date4 = $date3->format('Y-m-d');

            $days=floor($diff / (60*60*24));

            $daily = $duration - $days;
            $percentage = ($increase/100) * $daily * $usd;

            $one = 1;
            $f = date('Y-m-d', strtotime($Date2 . ' + '. $one.'day'));
 
        else:
            $daily ="";
            $percentage ="";
            $Date = "0";
            $days ="No investment";
            $diff = "";
            $Date2 = 'No investment';
        endif;
    endif;
    
?>