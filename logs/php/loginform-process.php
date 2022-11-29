<?php
    session_start();
    
    ini_set('display_errors', 1);

    include "../../config/db.php";
    include "../../php/func.php";
    include "../../php/query.php";

    if(isset($_POST['action']) && $_POST['action'] == "loginprocess"):
        $email = clean_str($_POST['email']);
        $password = clean_str($_POST['password']);

        $selecting = new Select($link);
        $selecting->more_details("WHERE email = ? OR username = ?, $email, $email");
        $value = $selecting->pull("id, fname, lname, username, email, password, walletbalance, package, date, phone, refcode", "users");
        $selecting->reset();

        if($value[1] > 0):
            $data = $value[0][0];
            $id = $data['id'];
            $fname = $data['fname'];
            $lname = $data['lname'];
            $username = $data['username'];
            $mail = $data['email'];
            $pass = $data['password'];
            $balance = $data['walletbalance'];
            $package = $data['package'];
            $joined = $data['date'];
            $refcode = $data['refcode'];
            $phone = $data['phone'];

            if($pass === $password):
                $_SESSION['id'] = $id;
                $_SESSION['fname'] = $fname;
                $_SESSION['lname'] = $lname;
                $_SESSION['username'] = $username;
                $_SESSION['mail'] = $mail;
                $_SESSION['pass'] = $pass;
                $_SESSION['package'] = $package;
                $_SESSION['joined'] = $joined;
                $_SESSION['refcode'] = $refcode;
                $_SESSION['phone'] = $phone;
                $_SESSION['balance'] = $balance;
                $_SESSION['logged'] = true;
                $_SESSION['logged_at'] = Date("d-m-y H:i:s");
                echo "set";
            else:
                echo "error 1";
            endif;
        else:
            echo "error 1";
        endif;
    endif;
?>