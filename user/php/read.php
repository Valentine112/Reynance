<?php
    ini_set('display_errors', 1);
    require "../config/initiate.php";
    require "../../config/db.php";
    require "../../php/func.php";
    require "../../php/query.php";

    if(isset($_POST['action']) && $_POST['action'] === "read"){
        $msgid = clean_str($_POST['msgid']);
        $email = $_SESSION['mail'];
        $one = 1;

        $updating = new Update($link, "SET status = ? WHERE email = ? AND msgid = ?# $one# $email# $msgid");
        if($updating->mutate('iss', 'adminmessage')){
            echo "completed";
        }
    }
?>