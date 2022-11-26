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
    <link rel="stylesheet" href="css/index.css">
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
            <!-- Account status -->
            <section class="account-info col-12 mx-auto">
                <div class="row account-container account-1 justify-content-between">
                    <div class="col-md-5">
                        <div>
                            <div class="title-head">Balance</div>
                            <div class="h2">
                                <sup>$</sup><?= $wallet_balance; ?>.<span class="h6">00</span>
                            </div>
                            <div class="title-date">
                                <?php
                                    $date1 = Date("d-m-y");

                                    echo date_formatting("j", date_S($date1)[2], "l").", ".date_formatting('!m', date_S($date1)[1], 'M')." ".date_S($date1)[0];
                                ?>
                            </div>
                        </div>
                        <div>
                            <i class="card-icon-indicator mdi mdi-account-circle bg-inverse-icon-success"></i>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div>
                            <div class="title-head">Interest</div>
                            <div class="h2">
                                <sup>$</sup><?= $profit; ?>.<span class="h6">00</span>
                            </div>
                            <div class="title-date">
                                <?php
                                    $date1 = Date("d-m-y");

                                    echo date_formatting("j", date_S($date1)[2], "l").", ".date_formatting('!m', date_S($date1)[1], 'M')." ".date_S($date1)[0];
                                ?>
                            </div>
                        </div>
                        <div>
                            <i class="card-icon-indicator mdi mdi-account-circle bg-inverse-icon-success"></i>
                        </div>
                    </div>
                </div>
                <div class="row account-container account-2 justify-content-between">
                    <div class="col-md-5">
                        <div>
                            <div class="title-head">Growth rate</div>
                            <div class="h2">
                                <?= $increase; ?><span class="h6">%</span>
                            </div>
                            <div class="title-date">
                                <?php
                                    $date1 = Date("d-m-y");

                                    echo date_formatting("j", date_S($date1)[2], "l").", ".date_formatting('!m', date_S($date1)[1], 'M')." ".date_S($date1)[0];
                                ?>
                            </div>
                        </div>
                        <div>
                            <i class="card-icon-indicator mdi mdi-account-circle bg-inverse-icon-success"></i>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div>
                            <div class="title-head">Withdrawn</div>
                            <div class="h2"><sup>$</sup><?= $withdrawn; ?>.<span class="h6">00</span></div>
                            <div class="title-date">
                                <?php
                                    $date1 = Date("d-m-y");

                                    echo date_formatting("j", date_S($date1)[2], "l").", ".date_formatting('!m', date_S($date1)[1], 'M')." ".date_S($date1)[0];
                                ?>
                            </div>
                        </div>
                        <div>
                            <i class="card-icon-indicator mdi mdi-basket bg-inverse-icon-warning"></i>
                        </div>
                    </div>
                </div>
            </section>
            <hr>
            <section class="activities row col-12 justify-content-start">

            </section>
        </div>
    </main>
</body>
<script src="assets/package/dist/bundle.js"></script>
</html>