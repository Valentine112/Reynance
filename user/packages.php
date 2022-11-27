<?php
    require "config/initiate.php";
    require "php/index.php";
    require "php/packages.php";
    include "sidebar/index.html";

    $id = $_SESSION['id'];
    $email = $_SESSION['mail'];

    $selecting = new Select($link);
    $selecting->more_details("WHERE id = ?, $id");
    $value1 = $selecting->pull('walletbalance', 'users');
    $selecting->reset();

    if(isset($_POST['choosen'])){
        $pname = $link->real_escape_string($_POST['pname']);
        $increase = $link->real_escape_string($_POST['increase']);
        $bonus = $link->real_escape_string($_POST['bonus']);
        $duration = $link->real_escape_string($_POST['duration']);
        $froms = $link->real_escape_string($_POST['froms']);
        $tos = $link->real_escape_string($_POST['tos']);

        if($value1[0][0]['walletbalance'] < $froms) {
            $msg = "<span class='alert alert-danger'>Insufficient balance!</span>";
        }else{
            $zero = 0;

            $selecting = new Select($link);
            $selecting->more_details("WHERE email = ?, $email");
            $value1 = $selecting->pull("activate, bonus, pname, email", "users");
            $selecting->reset();

            $updating = new Update($link, "SET pname = ?, increase = ?, counting = ?, bonus = ?, duration = ?, pdate = ?, froms = ?, tos = ?, activate = ? WHERE email = ?# $pname# $increase# $duration# $bonus# $duration# $zero# $froms# $tos# $zero# $email");

            if($value1[1] > 0){
                $row = $value1[0][0];
                if(isset($row['email']) &&  $row['pname']== $pname){
                    $msg= "<span class='alert alert-warning'>Package already selected you can only upgrade package!</span>";
                }else{
                    
                    if(isset($row['activate']) &&  $row['activate']=='1'){
                        $msg= "<span class='alert alert-warning'>A Package is already running!</span>";
                    }else{
                        if($updating->mutate("siiiisiiss", "users")) {
                            $msg= " <span class='alert alert-success'>$pname package has been successfully selected! Click <b><a href='running.php'>HERE</a></b> to activate package.</span>";
                        } else {
                            $msg= "<span class='alert alert-danger'>Package was not selected !</span>";
                        }
                    }  
                }
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
        .package-div{
            background: linear-gradient(145deg, #FF3252, #74ebd5);
            padding: 25px 10px;
        }
        .select-plan{
            background-color: #fff;
        }
        .form-box .package-name{
            color: #fff;
            font-size: 20px;
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
                <div class="col-12 text-center justify-content-center">
                    <?php
                        if(isset($msg) && !empty($msg)):
                            echo $msg;
                        endif;
                    ?>
                </div>
                <div class="package-cover row justify-content-around align-items-center">
                    <?php if($value[1] > 0): ?>
                        <?php foreach($value[0] as $ind => $data): ?>
                            
                            <form class="pt-3 col-12 col-lg-5 row form-box" method="POST">
                                <input type="hidden" name="pname" value=" <?php echo $data['pname'];?>">
                                <input type="hidden" name="froms" value=" <?php echo $data['froms'];?>">
                                    <input type="hidden" name="tos" value=" <?php echo $data['tos'];?>">
                                <input type="hidden" name="bonus" value=" <?php echo $data['bonus'];?>">
                                <input type="hidden" name="increase" value=" <?php echo $data['increase'];?>">
                                <input type="hidden" name="duration" value=" <?php echo $data['duration'];?>">

                                <div class="col-10 mx-auto package-div package-div-<?= $ind; ?> text-center">
                                    <div class="package-name"><?= $data['pname'];?></div>
                                    <div class="pt-3 h4">
                                        <sup>$</sup>
                                        <span><?= $data['froms']; ?></span> 
                                            - 
                                        <span><?php
                                                if($data['tos'] == 0){
                                                    echo "Upwards";
                                                }else{
                                                    echo $data['tos'];
                                                }
                                            ?>
                                        </span>
                                    </div>
                                    <div><small><?= $data['duration']; ?> days</small></div>
                                    <hr>
                                    <div>
                                        <ul class="text-left">
                                            <li>
                                                <?= $data['increase']; ?>% daily increment <br>
                                                <small>This will be added to your balance after the package is ended</small>
                                            </li>
                                            <br>
                                            <li>
                                                $<?= $data['bonus']; ?> activation bonus
                                                <br>
                                                <small>This bonus would be added to your balance after you successfully activate the package</small>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="pt-3">
                                        <button type="submit" name="choosen" class="btn btn-fill select-plan">Select Plan</button>
                                    </div>
                                </div>
                            </form>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </section>
        </div>
    </main>
</body>