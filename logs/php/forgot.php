<?php
    session_start();

    include "../../email/email.php";
    include "../../config/db.php";
    include "../../php/func.php";
    include "../../php/query.php";
    include "../../services/Mailing.php";

    if(!empty($_POST['action']) && $_POST['action'] === "forgot"):
        $data = clean_str($_POST['email']);

        $selecting = new Select($link);
        $selecting->more_details("WHERE email = ? OR username = ?, $data, $data");
        $value = $selecting->pull("email, token, username", "users");
        $selecting->reset();

        if($value[1] > 0):
            $val = $value[0][0];
            $email = $val['email'];
            $token = $val['token'];
            $uname = $val['username'];
            $time = time();
            
            $link->autocommit(FALSE);
            $updating = new Update($link, "SET forgot = ? WHERE email = ?# $time# $email");
            if($updating->mutate("ss", "users")):
                $body = forgot_email($token);

                $mailer = new Mailing($email, "invest@delunance.com", "Delunance", $uname);
                $mailer->config();
                $mailer->set_params($body, 'Recover Password');
                if($mailer->send_mail()):
                    $link->autocommit(TRUE);
                    echo "set";
                endif;
            else:
                echo "error 2";
            endif;
        else:
            echo "error 1";
        endif;
    endif;
?>