<?php
    require "config/initiate.php";
    require "php/referral.php";
    include "sidebar/index.html";

    if(isset($_POST['claim'])):
        if($_POST['verified'] == 0):
            $person = clean_str($_POST['person']);
            $one = 1;
            $refbonus = 20;
            $email = $_SESSION['mail'];

            $selecting = new Select($connect);
            $selecting->more_details("WHERE email = ? AND verify = ?, $person, $zero");
            $value1 = $selecting->pull("verify", "users");
            $selecting->reset();

            if($value1[1] > 0){
                $connect->autocommit(FALSE);
                $updating = new Update($link, "SET verify = ? WHERE email = ?# $one# $person");
                if($updating->mutate("is", "users")):
                    $updating = new Update($connect, "SET walletbalance = walletbalance + ? WHERE email = ?# $refbonus# $email");
                    if($updating->mutate("is", "users")):
                        $connect->autocommit(TRUE);

                        header("location: referral.php");
                    endif;
                endif;
            }
        endif;
    endif;
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
        .alert{
            border: 1px solid #f1f1f1;
            color: grey;
        }
        .big-box{
            font-family: 'Roboto', sans-serif!important;
            font-size: 15px;
        }
    </style>
    <title>Dashboard</title>
</head>
<body>
    <main>
        <!-- User profile -->
        <div class="container-fluid col-lg-9">
            <?php include "header/header.php"; ?>
            <div class="big-box">
                <div class="alert col-12 col-md-7 mx-auto text-center">You get $20 for every referral that you claim</div>
                    <?php if($value[1] < 1): ?>
                        <?php
                            echo "<div class='pt-5 col-12 h3 text-center' style='font-family: montserrat, sans-serif; margin-bottom: 10%; margin-top: 10%;'>Nobody has signed in through your referral code</div>";
                        ?>
                    <?php else: ?>
                        <section class="pt-5 section">
                            <?php foreach($value[0] as $data): ?>
                                <form method="post">
                                    <div class="row main col-12 mx-auto justify-content-around align-items-center">
                                        <div class="col-12 col-md-8">
                                            <span><?= $data['username']; ?></span> has registered on Delunance by using your referral code
                                        </div>
                                        <input type="hidden" name="person" value="<?= $data['email']; ?>">
                                        <input type="hidden" name="verified" value="<?= $data['verify']; ?>">
                                        <div class="col-12 mx-auto text-center col-md-4"><button class="btn btn-primary" name="claim">Claim referral</button></div>
                                    </div>
                                </form>
                            <?php endforeach; ?>
                        </section>
                    <?php endif; ?>
                    <hr>
                    <section class="pt-4 mx-auto">
                    <div class="text-center">Referral Link: </div>
                    <div class="col-6 mx-auto text–center">
                        <input type="text" class="form-control col-md-12" value="https://reynance.com/signup.php?referred=<?php echo $refcode;?>" id="myInputs"><br>

                        <button onclick="myFunctions()" class="col-12 btn btn-info btn-fill mx-auto">Copy Referral Link</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>