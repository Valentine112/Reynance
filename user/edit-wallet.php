<?php
    require "config/initiate.php";
    require "php/index.php";
    include "sidebar/index.html";

    $id = $_SESSION['id'];

    $selecting = new Select($link);
    $selecting->more_details("WHERE id = ?, $id");
    $value = $selecting->pull("btc, eth, shiba, usdt", "users");
    $selecting->reset();

    $data = $value[0][0];

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

            <p class="text-center" id="message"></p>
            <div class="wallet-box row justify-content-around">
                <div class="col-11 col-md-5">
                    <label for="Bitcoin">Bitcoin</label>
                    <input type="text" placeholder="bitcoin address" class="form-control" id="btc" value="<?= $data['btc']; ?>">
                </div>

                <div class="col-11 col-md-5">
                    <label for="Ethereum">Ethereum</label>
                    <input type="text" placeholder="ethereum address" class="form-control" id="eth" value="<?= $data['eth']; ?>">
                </div>

                <div class="col-11 col-md-5">
                    <label for="Shiba">Shiba</label>
                    <input type="text" placeholder="shiba address" class="form-control" id="shiba" value="<?= $data['shiba']; ?>">
                </div>

                <div class="col-11 col-md-5">
                    <label for="USDT">USDT</label>
                    <input type="text" placeholder="usdt address" class="form-control" id="usdt" value="<?= $data['usdt']; ?>">
                </div>

                <div class="col-11 col-md-11">
                    <label for="pass">Enter password to confirm</label>
                    <input type="password" class="form-control" id="pass" placeholder="Confirm password" require>
                </div>

                <div class="col-11 col-md-6 pt-5">
                    <button class="form-control btn btn-primary" onclick="update()">Update</button>
                </div>
            </div>
        </div>
    </main>
</body>

<script>
    var msg = document.getElementById("message")

    function update() {
        var password = document.getElementById("pass")
        var btc = document.getElementById("btc")
        var eth = document.getElementById("eth")
        var shiba = document.getElementById("shiba")
        var usdt = document.getElementById("usdt")

        var url = "action=Update&btc=" + btc.value + "&eth=" + eth.value + "&shiba=" + shiba.value + "&usdt=" + usdt.value + "&pass=" + pass.value

        var ajx = new XMLHttpRequest()
        ajx.addEventListener("load", completeHandler, false)
        ajx.open("POST", "PHP/edit-wallet.php");
        ajx.setRequestHeader("Content-type","application/x-www-form-urlencoded")
        ajx.send(url)
    }

    function completeHandler(ev) {
        var result = ev.target.responseText
        console.log(result)
        if(result == "success"){
            msg.classList.remove("text-danger")
            msg.classList.add("text-success")

            msg.innerHTML = "Successfully updated profile"
        }
        else if(result == "error 2"){
            msg.classList.remove("text-success")
            msg.classList.add("text-danger")

            msg.textContent = "Password is incorrect"
        }else{
            msg.classList.remove("text-success")
            msg.classList.add("text-danger")

            msg.textContent = "Failed to update profile"
        }
    }
</script>
</html>