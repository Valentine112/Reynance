<?php
    ini_set('display_errors', 1);

    require "../config/initiate.php";
    require "../../config/db.php";
    require "func.php";
    require "query.php";

    if(isset($_POST['action']) && $_POST['action'] == 'Update'){

        $fname = clean_str($_POST['fname']);
        $lname = clean_str($_POST['lname']);
        $phone = clean_str($_POST['phone']);
        $pass = clean_str($_POST['pass']);

        $id = $_SESSION['id'];

        if($pass === $_SESSION['pass']){
            $updating = new Update($link, "SET fname = ?, lname = ?, phone = ? WHERE id = ?# $fname# $lname# $phone# $id");
            if($updating->mutate('sssi', 'users')):
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