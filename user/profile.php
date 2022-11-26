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
    </style>
    <title>Dashboard</title>
</head>
<body>
    <main>
        <!-- User profile -->
        <div class="container-fluid col-lg-9">
            <?php include "header/header.php"; ?>
            <form action="" onsubmit="event.preventDefault()">
                <section>
                    <p class="text-center" id="message"></p>
                    <div class="col-12 col-lg-6 mx-auto outer-body">
                        <div class="row justify-content-around">
                            <div class="pt-5 col-md-6 col-lg-9">
                                <label for="first">Firstname</label><br>
                                <input type="text" class="form-control" id="first" value="<?= $_SESSION['fname']; ?>" >
                            </div>
                            <div class="col-xs-12 pt-5 col-md-6 col-lg-9">
                                <label for="last">Lastname</label><br>
                                <input type="text" class="form-control" id="last" value="<?= $_SESSION['lname']; ?>" >
                            </div>
                        </div>
                        <div class="pt-5 row justify-content-around">
                            <div class="col-12 col-md-10 col-lg-9">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" value="<?= $_SESSION['mail']; ?>" disabled >
                            </div>
                        </div>
                        <div class="row justify-content-around">
                            <div class="col-12 pt-5 col-md-6 col-lg-9">
                                <label for="phone">Phone number</label><br>
                                <input type="text" class="form-control" id="phone" value="<?= $_SESSION['phone']; ?>" >
                            </div>
                            <div class="col-12 pt-5 col-md-6 col-lg-9">
                                <label for="joined">Date joined</label><br>
                                <input type="text" class="form-control" id="joined" value="<?= $_SESSION['joined']; ?>" disabled >
                            </div>
                        </div>
                        <div class="pt-5 row justify-content-around">
                            <div class="col-12 col-md-12 col-lg-9">
                                <label for="pass">Enter password to confirm</label>
                                <input type="password" class="form-control" id="pass" require>
                            </div>
                        </div>
                        <div class="pt-5 row justify-content-center">
                            <div class="col-xs-3 col-md-3">
                                <button class="btn btn-primary form-control" onclick="update()">Update</button>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </main>
</body>
</html>