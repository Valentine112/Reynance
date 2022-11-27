<?php
    require "config/initiate.php";
    require "php/index.php";
    require "php/top.php";
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
    </style>
    <title>Dashboard</title>
</head>
<body>
    <main>
        <!-- User profile -->
        <div class="container-fluid col-lg-9">
            <?php include "header/header.php"; ?>

            <section>
                <?php if($error_mssg === TRUE): ?>
                    <div class="alert alert-success text-center">
                        <strong>Successfully sent for revision</strong>
                    </div>
                <?php elseif($error_mssg === FALSE): ?>
                    <div class="alert alert-danger text-center">
                        <strong>Failed! please try again later . . .</strong>
                    </div>
                <?php endif; ?>
                <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']).'?method='.strtolower($_SESSION['crypto_name']); ?>" method="post" enctype="multipart/form-data">
                    <header>
                        Deposit <?= $crypto; ?>
                    </header>
                    <div class="pt-4">
                        <div class="col-10 col-md-7">
                            <label for="address">Official wallet address</label>
                            <input type="text" name="address" class="form-control wallet-address" value="<?= $wallet_address; ?>" readonly>
                            <br>
                            <button type="button" class="btn btn-primary" onclick="copy(this)">Copy</button>
                            <div id="copy" class="col-12 alert alert-info d-none">Copied</div>
                        </div>
                        <div class="pt-4 col-10 col-md-7">
                            <label for="amount">Deposit amount:</label>
                            <input type="number" name="amount" class="form-control" placeholder="Enter amount" aria-placeholder="Enter amount">
                        </div>
                        <div class="pt-4 col-10 col-md-7">
                            <label for="amount">Screenshot of the <?= $crypto; ?> transaction:</label>
                            <input type="file" name="tranx-proof" class="form-control">
                        </div>
                        <br>
                        <div>
                            <button type="submit" name="submit" class="btn btn-fill btn-success btn-md submit">Submit</button>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </main>
</body>

<script>
    function copy(self) {
        var wallet_address = document.querySelector(".wallet-address").value
        navigator.clipboard.writeText(wallet_address)
        var copied = document.getElementById("copy")

        copied.classList.remove("d-none")
        copied.classList.add("d-block")

        setTimeout(() => {
            copied.classList.remove("d-block")
            copied.classList.add("d-none")
        }, 2000);
    }
</script>
</html>