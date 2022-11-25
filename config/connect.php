<?php
    define('host', 'localhost');
    define('username', 'root');
    define('password', '');
    define('db', 'macrounique');

    $connect = new mysqli(host, username, password, db);
    $connect->set_charset("utf8");
    if (mysqli_connect_error()) {
        die("Failed to connect!!!!");
    }
    
?>