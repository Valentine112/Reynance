<?php
        ini_set('display_errors', 1);

    include "../../config/db.php";
    include "../../php/func.php";
    include "../../php/query.php";

    if(isset($_POST['action']) && $_POST['action'] === "change" && !empty($_POST['pass']) && !empty($_POST['token'])){
        $pass = clean_str($_POST['pass']);
        $token = clean_str($_POST['token']);

        $updating = new Update($link, "SET password = ? WHERE token = ?# $pass# $token");
        if($updating->mutate('ss', "users")){
            echo "set";
        }
    }
?>