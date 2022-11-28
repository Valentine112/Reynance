<?php
    require "config/initiate.php";
    require "php/index.php";
    require "php/running.php";
    include "sidebar/index.html";

    include "../services/Mailing1.php";
    require "t-mail/t-mail.php";

    $id = $_SESSION['id'];

    //Switch package
    if(isset($_POST['switch'])){
        $zero = 0;
        $empty = "";
        $profit = clean_str($_POST['profit']);
        $profiting = $value[0][0]['profit'];

        if($profit == null || $profit == ""){
            $profit = 0;
        }

        $updating = new Update($link, "SET activate = ?, pdate = ?, walletbalance = walletbalance + ?, profit = ?, increase = ?, pname = ?, bonus = ? WHERE email = ?# $zero# $zero# $profiting# $zero# $zero# $empty# $zero# $email");

        if($updating->mutate('isiiisis', "users")):
            $msg = "<div class='alert alert-info text-center col-12 col-md-8 mx-auto'>Package Ended with profit of $profit you can now switch or enjoy a new package !</div>";
        else:
            $msg = "<div class='alert alert-info col-12 col-md-8 mx-auto text-center'>Package cannot be ended/switched!</div>";
        endif;
    }

    //Activate package
    if(isset($_POST['activate'])){
    
        $usd = $_POST['usd'];
        $cdate = date('Y-m-d H:i:s');

        $selecting = new Select($link);
        $selecting->more_details("WHERE email = ?, $email");
        $value1 = $selecting->pull("walletbalance, pname, increase, pdate, date, usd, duration, profit, activate, froms, tos, bonus, username", "users");
        $selecting->reset();
        if($value[1] > 0){
            $data = $value1[0][0];

            $from = $data['froms'];
            $to = $data['tos'];
            $bonus = $data['bonus'];
            $pname1 = $data['pname'];
            $username = $data['username'];

            // Check if a package has been selected
            if($pname1 !== ""):

                $one = 1;

                if($to == 0) $to = 10000000000000;

                $updating = new Update($link, "SET activate = ?, pdate = ?, usd = ?, walletbalance = walletbalance + ? WHERE email = ?# $one# $cdate# $usd# $bonus# $email");

                if(isset($data['activate']) &&  $data['activate'] == '1'){
                    $msg = "<div class='alert alert-info col-12 col-md-8 mx-auto text-center'>Package is already active!</div>";
                }else{
                    if($data['walletbalance'] >= $from && $data['walletbalance'] >= $usd && $usd >= $from && $usd <= $to){

                        //$link->autocommit(FALSE);
                        $updating->mutate("isiis", "users");

                        // Save the investment
                        $subject = ["user", "package", "amount", "date"];
                        $items = [$id, $pname1, $usd, $cdate];

                        $inserting = new Insert($link, "investments", $subject, "");
                        $inserting->push($items, 'isis');
                        $inserting->reset();

                        // Saving the investment ENDS

                        $msg = "<div class='alert alert-success col-12 col-md-8 mx-auto text-center'>Your package is successfully activated!</div>";

                        $body = activation("User", "Amount", "Package name", "Bonus", "Date", $username, $usd, $pname1, $bonus, $cdate, "");

                        $mailer = new Mailing($email, "invest@reynance.com", "Reynance", $_SESSION['username']);
                        $mailer->config();
                        $mailer->set_params($body, 'Package Activation');
                        if($mailer->send()):
                            $link->autocommit(TRUE);
                        endif;

                    }else{
                        $msg = "<div class='alert alert-info col-12 col-md-8 mx-auto text-center'>Package cannot be activated, insufficient balance or amount greater than package maximum value ! </div>";
                    }
                }
            else:
                $msg = "<div class='alert alert-info col-12 col-md-8 mx-auto text-center'>You need to select a <a href='packages.php'>package</a> first</div>";
            endif;
        }
    }
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Running Packages</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="css/general.css">
    <style>
        body{
            background-color: snow;
        }
        h2{
            font-family: 'montserrat', sans-serif;
        }
        .segments{
            margin-top: 3%;
        }
        .segments > div:first-child{
            color: grey;
            font-family: "Open Sans", sans-serif;
            font-size: 14px;
        }
        .segments > div:last-child{
            font-family: "montserrat", sans-serif;
            font-size: 25px;
            margin-top: 3%;
            color: #0CC9F9;
            font-weight: bold;
        }
        input[type="text"] {
            border: 0;
            border-bottom: 2px solid #0CC9F9;
        }

        @media screen and (max-width: 767px) {
            .segments{

            }
        }
    </style>
</head>
<body>

    <div class="container">
        <?php include "header/header.php"; ?>
        <?php
            if(isset($msg) && $msg != ""){
                echo $msg;
            }
        ?>
        <?php
            if($value[1] > 0):
                $row = $value[0][0];

                if(isset($row['activate']) &&  $row['activate']== '1'){ 
                    $sec = 'Active &nbsp;&nbsp;<i style="background-color:green;color:#fff; font-size:20px;" class="fa  fa-refresh" ></i>';
                }else{
                    $sec ='Not Active &nbsp;&nbsp;<i class="fa fa-times" style=" font-size:20px;color:red"></i>';
                    $usd = 'No investment';
                }

                if(isset($row['pdate']) &&  $row['pdate']== '0'){
                    $date = 'No investment';
                    $start= $row['duration'];
                }else{
                    $date = $row['pdate'];
                    $start= $row['date'];
                }

                if($row['pname'] == "" || $row['pname'] == null){
                    $row['pname'] = "No investment";
                }

                if($percentage == "" || $percentage == null){
                    $percentage = 0;
                }
                
            endif;
            
        ?>
        <form method="post">
            <section class="pt-3">
                <div class="row align-items-center justify-content-around">
                    <div class="segments col-12 col-md-5 col-lg-4 text-center">
                        <div>Package name</div>
                        <div class="pkg-info"><?= $row['pname']; ?></div>
                    </div>

                    <div class="segments col-12 col-md-5 col-lg-4 text-center">
                        <div>Amount Invested</div>
                        <div class="pkg-info"><?= $usd; ?></div>
                    </div>

                    <div class="segments col-12 col-md-5 col-lg-4 text-center">
                        <div>Percentage Increase</div>
                        <div class="pkg-info"><?= $row['increase']; ?>%</div>
                    </div>

                    <div class="segments col-12 col-md-5 col-lg-4 text-center">
                        <div>Profit</div>
                        <div class="pkg-info">$<?= $percentage; ?></div>
                    </div>

                    <div class="segments col-12 col-md-5 col-lg-4 text-center">
                        <div>Activation date</div>
                        <div class="pkg-info"><?= $date; ?></div>
                    </div>
                    
                    <div class="segments col-12 col-md-5 col-lg-4 text-center">
                        <div>End date</div>
                        <div class="pkg-info"><?= $Date2; ?></div>
                    </div>

                    <div class="segments col-12 col-md-5 col-lg-4 text-center">
                        <div>Days to end</div>
                        <div class="pkg-info"><?= $days; ?></div>
                    </div>

                    <div class="segments col-12 col-md-5 col-lg-4 text-center">
                        <div>Status</div>
                        <div class="pkg-info"><?= $sec; ?></div>
                    </div>

                    <div class="segments col-12 col-md-5 col-lg-4 text-center">
                        <div>Bonus</div>
                        <div class="pkg-info">$<?= $row['bonus']; ?></div>
                    </div>

                    <div class="segments col-12 col-md-7 col-lg-6 text-center">
                        <div>Amount to invest</div>
                        <div class="">
                            <input type="text" name="usd" placeholder="Amount to invest" class="form-control" style="border-radius:5px;width:100%;">
                        </div>
                    </div>
                </div>
                <div class="pt-5 row col-12 justify-content-around text-center">
                    <div class="pt-3 col-12 col-md-6">
                        <button type="submit" name="activate" class="btn btn-success">Activate package</button>
                    </div>

                    <div class="pt-3 col-12 col-md-6">
                        <input type="hidden" name="profit" value="<?php echo $percentage; ?>">
                        <button type="submit" name="switch" class="btn btn-info">Switch/End package</button>
                    </div>
                </div>
            </form>
        </section class="pb-5">
    </div>
</body>
</html>