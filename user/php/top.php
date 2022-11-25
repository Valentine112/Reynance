<?php
    ini_set('display_errors', 1);

    require "../config/db.php";
    require "../php/func.php";
    require "../php/query.php";
    
    include "../services/Mailing1.php";
    require "t-mail/t-mail.php";

    $error_mssg = NULL;

    $token = $_GET['method'];
    $email = $_SESSION['mail'];
    $_SESSION['crypto_name'] = $token;

    $result1 = clean_str($token);

    (string) $crypto = "";
    (string) $wallet = "";
    switch ($result1) {
        case 'bitcoin':
            $crypto = "Bitcoin";
            $wallet = "bwallet";
            break;
        case 'ethereum':
            $crypto = "Ethereum";
            $wallet = "ewallet";
            break;
        case 'usdt':
            $crypto = "USDT";
            $wallet = "usdt";
            break;
        case 'shiba':
            $crypto = "SHIBA";
            $wallet = "pm";
            break;
        default:
            $crypto = "Unknown";
            break;
    }

    $selecting = $link->prepare("SELECT $wallet FROM admin WHERE email = ?");
    $selecting->bind_param('s', $emaila);
    $selecting->execute();
    $selecting->bind_result($wallet_address);
    $selecting->store_result();
    $selecting->fetch();

    if(isset($_POST['submit'])):

        $error = TRUE;
        $paths = [];
        $address = clean_str($_POST['address']);
        $amount = $_POST['amount']; //filter_var($_POST['amount'], FILTER_VALIDATE_INT);
        $btctnx = bin2hex(random_bytes(32));

        $photo = $_FILES['tranx-proof'];
        
        $folder = "folder";
        $folder1 = "../../user/folder";

        if(!is_dir($folder)){
            mkdir($folder, 0777);
        }

        $valid_ext = ["png", "jpg", "jpeg"];
        $photo_path1 = "";

        $tnx = uniqid('tnx');

        $name = $photo['name'];
        $len = count($_FILES);

        if($amount == "" || $len < 1 && is_int($amount)):
            $msg = "No Field should be left empty!";
        else:
            if($len == 1):
                $name = $photo['name'];
                $size = $photo['size'];
                $tmp_name = $photo['tmp_name'];

                $ext_name = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                $photo_name = pathinfo($name, PATHINFO_FILENAME);


                if(!in_array($ext_name, $valid_ext)):
                    $error = true;
                elseif($size > 5000000):
                    $error = true;
                else:
                    $date = Date("y_m_d");
                    $date1 = Date("y/m/d");
                    $rand = random_int(0, 9999);
                    
                    $photo_path = $folder."/".$photo_name.".".$ext_name;
                    $photo_path1 = $folder1."/".$photo_name.".".$ext_name;
                    if(move_uploaded_file($tmp_name, $photo_path)):
                        array_push($paths, $photo_path1);
                        $error = false;
                    endif;
                endif;
            endif;

            if(!$error):
                $company = "Coretiflex";
                $pending = "pending";
                $empty = "";


                $btctnx = uniqid("btcid");
                $subject = ["usd", "image", "btctnx", "email", "status", "type", "tnxid"];
                
                $items = [$amount, $photo_path1, $btctnx, $email, $pending, $_SESSION['crypto_name'], $tnx];

                $inserting = new Insert($link, "btc", $subject, "");
                if($inserting->push($items, 'issssss')):

                    $body = tmail_body($_SESSION['username'], $amount, strtoupper($_SESSION['crypto_name']), $tnx, $date1);

                    $mailer = new Mailing($email, "invest@coretiflex.com", "Coretiflex", $_SESSION['username']);
                    $mailer->config();
                    $mailer->set_params($body, 'Payment Details');
                    if($mailer->send()):
                        $error_mssg = true;
                    endif;
                endif;
            endif;
        endif;
    endif;
?>    