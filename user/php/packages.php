<?php
    require "../config/db.php";
    require "../php/func.php";
    require "../php/query.php";

    $selecting = new Select($link);
    $selecting->more_details("");
    $value = $selecting->pull("pname, increase, bonus, duration, froms, tos", "package1");
    $selecting->reset();

?>