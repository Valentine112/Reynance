<?php
    ini_set('display_errors', 1);

    include "../../email/email.php";
    include "../../config/db.php";
    include "../../php/func.php";
    include "../../php/query.php";
    include "../../services/Mailing.php";


    if(isset($_POST['action']) && $_POST['action'] == "signupprocess"):
        $fname = clean_str($_POST['fname']);
        $lname = clean_str($_POST['lname']);
        $uname = clean_str($_POST['uname']);
        $email = clean_str($_POST['email']);
        $pass = clean_str($_POST['password']);
        $referred = clean_str($_POST['referred']);

        if(!empty($fname) && !empty($uname) && !empty($email) && !empty($pass)):
            $selecting = new Select($link);
            $selecting->more_details("WHERE email = ?, $email");
            $value = $selecting->pull("email", "users");
            $selecting->reset();

            $selecting->more_details("WHERE username = ?, $uname");
            $value1 = $selecting->pull("username", "users");
            $selecting->reset();

            if($value[1] > 0):
                echo "error 2";
            elseif($value1[1] > 0):
                echo "error 3";
            else:
                $token = bin2hex(random_bytes(64));
                $refcode = random_int(1000, 9999).time();

                $subject = ["fname", "lname", "username", "email", "password", "token", "refcode", "referred"];
                $items = [$fname, $lname, $uname, $email, $pass, $token, $refcode, $referred];

                $link->autocommit(FALSE);
                $inserting = new Insert($link, "users", $subject, "");
                if($inserting->push($items, 'ssssssss')):
                    $inserting->reset();

                    $body = email_body();

                    $mailer = new Mailing($email, "invest@delunance.com", "Delunance", $uname);
                    $mailer->config();
                    $mailer->set_params($body, 'Welcome Message');
                    //$mailer->send();

                    
                    $link->autocommit(TRUE);
                    echo "success";
                else:
                    echo "Yelloo there";
                endif;
            endif;
        else:
            echo "error 1";
        endif;
    endif;
?>