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
                    
                        <h2 class="form-title">Recover Password</h2>
                        <p id="response"></p>
                        <div id="smsgSubmit" class="h5 text-center hidden"></div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="lemail" placeholder="Email"/>
                        </div>
                        <div>
                            <span>Remembered? </span><a href="login.php">Login here</a>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up" onclick="forgotForm()"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Are you new here? <a href="signup.php" class="signhere-link">Register here</a>
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