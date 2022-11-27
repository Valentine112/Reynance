<?php
    ini_set('display_errors', 1);

    require "../config/initiate.php";
    require "../../config/db.php";
    require "func.php";
    require "query.php";

    if(isset($_POST['action']) && $_POST['action'] == 'Update'){

        $btc = clean_str($_POST['btc']);
        $eth = clean_str($_POST['eth']);
        $shiba = clean_str($_POST['shiba']);
        $usdt = clean_str($_POST['usdt']);
        $pass = clean_str($_POST['pass']);

        $id = $_SESSION['id'];

        if($pass === $_SESSION['pass']){
            $updating = new Update($link, "SET btc = ?, eth = ?, shiba = ?, usdt = ? WHERE id = ?# $btc# $eth# $shiba# $usdt# $id");
            if($updating->mutate('ssssi', 'users')):
                echo "success";
            else:
                echo "error 1";
            endif;

        }else{
            echo "error 2";
        }

        $link->close();
    }else{
        echo "hello";
    }
?>