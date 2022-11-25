<?php
    ini_set('display_errors', 1);

    require "../config/db.php";
    require "../php/func.php";
    require "../php/query.php";

    $error = 0;
    $two = (60 * 60) * 2;

    if(isset($_GET['token']) && !empty($_GET['token'])){
        $token = clean_str($_GET['token']);
        $selecting = new Select($link);
        $selecting->more_details("WHERE token = ?, $token");
        $value = $selecting->pull("forgot, token", "users");
        if($value[1] > 0){
            $error = false;
            $data = $value[0][0];
            $time = $data['forgot'];
            $token = $data['token'];

            if(time() - $time > $two){
                $error = 2;
            }else{
                $error = 0;
            }
        }else{
            $error = 1;
        }
    }else{
        $error = 1;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reynance</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        .form-title{
            color: #DF4076;
        }
    </style>
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" onsubmit="event.preventDefault()" id="signup-form" class="signup-form">
                    
                        <h2 class="form-title">Change Password</h2>
                        <div id="smsgSubmit" class="h5 text-center hidden"></div>

                        <div class="form-group">
                            <input type="text" class="form-input" name="password" id="lpassword" placeholder="New password"/>
                        </div>
                        <div>
                            <a href="forgot.php">Forgotten password?</a>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Change Password" onclick="newPassForm()"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Are you new here? <a href="signup.php" class="loginhere-link">Signup here</a>
                    </p>
                </div>
            </div>
        </section>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>