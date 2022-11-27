<?php
    require "config/initiate.php";
    require "php/index.php";
    include "sidebar/index.html";
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
        .payment-method img{
            height: 100px;
            width: 100px;
        }

    </style>
    <title>Dashboard</title>
</head>
<body>
    <main>
        <!-- User profile -->
        <div class="container-fluid col-lg-9">
            <?php include "header/header.php"; ?>

            <section class="payment-method">
                <div class="row justify-content-around align-items-center">
                    <div class="pt-5 col-12 col-md-6 text-center">
                        <div class="h3 text-warning">Bitcoin</div>
                        <div><img src="images/funds-logo/btc.png" alt=""></div>
                        <div><a href="pay.php?method=bitcoin">Add funds</a></div>
                    </div>
                    <div class="pt-5 col-12 col-md-6 text-center">
                        <div class="h3">Ethereum</div>
                        <div><img src="images/funds-logo/eth.png" alt=""></div>
                        <div><a href="pay.php?method=ethereum">Add funds</a></div>
                    </div>
                    <div class="pt-5 col-12 col-md-6 text-center">
                        <div class="h3 text-danger">Shiba</div>
                        <div><img src="images/funds-logo/pm.png" alt=""></div>
                        <div class="pt-4"><a href="pay.php?method=shiba">Add funds</a></div>
                    </div>
                    <div class="pt-5 col-12 col-md-6 text-center">
                        <div class="h3 text-success">USDT</div>
                        <div><img src="images/funds-logo/tron.png" alt=""></div>
                        <div><a href="pay.php?method=usdt">Add funds</a></div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>
</html>
