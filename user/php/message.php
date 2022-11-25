<?php
    ini_set('display_errors', 1);

    require "../config/db.php";
    require "../php/func.php";
    require "../php/query.php";
    
    $email = $_SESSION['mail'];
    $empty = 1;

    function fetching_messages(mysqli $link, string $person_email, int $message_status, $message_status2, int $limit) : array {
        $box = [];
        $selecting = $link->prepare("SELECT * FROM adminmessage WHERE email = ? AND (status = ? OR status $message_status2) ORDER BY id DESC LIMIT $limit");
        $selecting->bind_param('si', $person_email, $message_status);
        $selecting->execute();
        $selecting->store_result();
        $selecting->bind_result($user_id, $user_email, $user_message, $user_title, $user_image, $user_status, $user_msgid, $user_date);
        while($a = $selecting->fetch()){
            $arr = [
                'id' => $user_id,
                'email' => $user_email,
                'message' => $user_message,
                'title' => $user_title,
                'image' => $user_image,
                'status' => $user_status,
                'msgid' => $user_msgid,
                'date' => $user_date
            ];
            array_push($box, $arr);
        }
        return $box;
    }


    //GETTING THE UNOPENDED MESSAGES FIRST
    $unopened = fetching_messages($link, $_SESSION['mail'], 0, "IS NULL", 30);

    //GETTING THE OPENDED MESSAGES
    $opened = fetching_messages($link, $_SESSION['mail'], 1, "= $empty", 15);

?>