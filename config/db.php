<?php
    define('host', 'localhost');
    define('username', 'root');
    define('password', '');
    define('db', 'reynance');

    $link = new mysqli(host, username, password, db);
    $link->set_charset("utf8");
    if (mysqli_connect_error()) {
        die("Failed to connect!!!!");
    }
    
?>