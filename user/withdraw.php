<?php
    include "../services/Mailing1.php";
    require "config/initiate.php";
    require "php/index.php";
    require "php/withdraw.php";
    include "sidebar/index.html";
    require "t-mail/t-mail.php";

    if(isset($_POST['submit'])) {

        $usd = $link->real_escape_string($_POST['usd']);
        $mode = $link->real_escape_string($_POST['mode']);
        $wallet = $link->real_escape_string($_POST['wallet']);
        $upassword = $link->real_escape_string($_POST['password']);
        $j = $usd;
        $tnx = uniqid('tnx');
        $cdate = date('Y-m-d H:i:s');
      
        $subject = ['moni', 'mode', 'email', 'status', 'tnx', 'wal', 'date'];
        $items = [$j, $mode, $email, "pending", $tnx, $wallet, $cdate];

        $wl = 200;

        $inserting = new Insert($link, "wbtc", $subject, "LIMIT 1");

        if($password == $upassword){
            if($pdbalance >= $j) {
                if($j < $wl){
                    $msg = "Minimum withdrawal is $wl USD";
                }else {
                    $link->autocommit(FALSE);
                    if($inserting->push($items, 'issssss')){
                        $updating = new Update($link, "SET walletbalance = walletbalance - ? WHERE email = ?# $j# $email");

                        if($updating->mutate("is", "users")){
                            $body = activation("User", "Amount", "Address", "Transaction Id", "Date", $username, $j, $wallet, $tnx, $cdate, "<li><b>Payment Mode:</b> $mode</li><br>");

                            $mailer = new Mailing($email, "invest@reynance.com", "Reynance", $_SESSION['username']);
                            $mailer->config();
                            $mailer->set_params($body, 'Withdrawal');
                            if($mailer->send()):
                                $link->autocommit(TRUE);
                            endif;
                        }
                    }
                }
            }else{
                $msg = "You do not have up to that amount";
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <style>
        .welcome span{
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <title>Dashboard</title>
</head>
<body>
    <main>
        <!-- User profile -->
        <div class="container-fluid col-lg-9">
            <?php include "header/header.php"; ?>

            <section class="pt-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <div class="content">
                            <?php if(isset($msg) && $msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>

                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Amount you want to withdraw (in American Dollars)</label>
                                                <input required="" name="usd" type="number" class="form-control" placeholder="Amount (Integers only)">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Preferred withdrawal mode</label>
                                                <select name="mode" class="form-control" id="plan" onchange="selectAddress(this)">
                                                    <option value="">select an account type</option>

                                                    <option value="BITCOIN" data-value="<?= $btc; ?>">Bitcoin</option>

                                                    <option value="ETHEREUM" data-value="<?= $eth; ?>">Ethereum</option>

                                                    <option value="SHIBA" data-value="<?= $shiba; ?>">SHIBA</option>

                                                    <option value="Usdt" data-value="<?= $usdt; ?>">USDT</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row notice">
                                        <ul>
                                            <li>If you selected bitcoin as your withdrawal mode, enter your correct bitcoin wallet.</li>
                                            <li>If you selected ethereum as your withdrawal mode, enter your correct ethereum wallet.</li>
                                            <li>If you selected perfect money as your withdrawal mode, enter your correct shiba wallet.</li>
                                            <li>If you selected Shiba as your withdrawal mode, enter your correct Shiba wallet.</li>
                                            <li>If you entered wrong details and we send money to someone else's account, we won't be responsible for it.</li>
                                            <li>If any issue is encountered while disbursing your money, an administrator will contact you via your email.</li>
                                        </ul>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Account details</label>
                                                <textarea required="" name="wallet" class="form-control"
                                                id="walletAddress" placeholder="Enter correct details"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Enter your password to confirm your withdrawal</label>
                                                <input name="password" type="password" class="form-control" placeholder="Enter password">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <button type="submit" name="submit" class="btn btn-info btn-fill pull-right">Withdraw funds</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>
<script>
    function selectAddress(self) {
        var val = self.options[self.selectedIndex].getAttribute("data-value")
        document.getElementById("walletAddress").value = val
    }
</script>
</html>