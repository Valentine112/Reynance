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
        table{
            font-family: 'Open Sans', sans-serif;
        }
        td, th{
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        td{
            font-size: 15px;
        }
        tr:nth-child(even) {
            background-color: #f1f1f1;
        }
        .wallet-box > div{
            padding: 10px 0;
        }
        .wallet-box > div label{
            font-size: 15px;
            color: grey;
        }
    </style>
    <title>Dashboard</title>
</head>
<body>
    <main>
        <!-- User profile -->
        <div class="container-fluid col-lg-9">
            <?php include "header/header.php"; ?>
            <div class="wallet-box row justify-content-around">
                <div class="col-11 col-md-5">
                    <label for="Bitcoin">Bitcoin</label>
                    <input type="text" placeholder="bitcoin address" class="form-control">
                </div>

                <div class="col-11 col-md-5">
                    <label for="Bitcoin">Ethereum</label>
                    <input type="text" placeholder="bitcoin address" class="form-control">
                </div>

                <div class="col-11 col-md-5">
                    <label for="Bitcoin">Shiba</label>
                    <input type="text" placeholder="bitcoin address" class="form-control">
                </div>

                <div class="col-11 col-md-5">
                    <label for="Bitcoin">USDT</label>
                    <input type="text" placeholder="bitcoin address" class="form-control">
                </div>

                <div class="col-11 col-md-6 pt-5">
                    <button class="form-control btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </main>
</body>
</html>