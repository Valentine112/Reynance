<?php
    function clean_str(string $data) : string {
        $data = filter_var($data, FILTER_SANITIZE_STRING);
        $data = htmlspecialchars(trim(stripcslashes($data)));
        return $data;
    }
    function clean_int($data) : int {
        $data = htmlspecialchars(trim(stripslashes($data)));
        $data = filter_var($data, FILTER_SANITIZE_NUMBER_INT);
        return (int) $data;
    }
    function check_int($data) : int {
        $data = filter_var($data, FILTER_VALIDATE_INT);
        return (int) $data;
    }
    function date_formatting(string $format, int $num, string $type) {
        $dateObj = DateTime::createFromFormat($format, $num);
        $name = $dateObj->format($type);
        return $name;
    }
    function date_S(string $date) {
        $year = (int) substr($date, 6, 2);
        $month = (int) substr($date, 3, 2);
        $day = (int) substr($date, 0, 2);
        return [$year, $month, $day];
    }
    function sort_on_time($a, $b){
        $t1 = $a['time'];
        $t2 = $b['time'];
        return $t2 - $t1;
    }
?>