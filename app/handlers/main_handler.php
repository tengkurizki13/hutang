<?php

$session_user_id = $_SESSION['user']['id'];
$session_user_name = $_SESSION['user']['name'];

require 'export/excel/vendor/autoload.php';
require 'export/pdf/vendor/autoload.php';



$query = mysqli_query($con, "SELECT * FROM users WHERE id ='$session_user_id'");
$user = mysqli_fetch_assoc($query);

$page_now = isset($_GET['page']) ? $_GET['page'] : 'home';

function rupiah($number)
{

    $hasil_rupiah = "Rp " . number_format(empty($number) ? 0 : $number, 2, ',', '.');
    return $hasil_rupiah;

}

function dateRfc3309($datetime)
{
    return date('Y-m-d\TH:i:s', strtotime($datetime));
}

function fmt_to_timestamp($date)
{
    $date = str_replace("T", " ", $date);
    // $date = $date . ":00";

    return $date;
}



function insert_persons($con, $name)
{
    $person = is_person_exists($con, $name);
    if ($person[0]) {
        return $person[1];
    }
    global $session_user_id;
    $insert = mysqli_query($con, "INSERT INTO persons(name,user_id) VALUES('$name','$session_user_id')");
    $last_insert_id = mysqli_insert_id($con);

    return $last_insert_id;
}

function is_person_exists($con, $name)
{
    global $session_user_id;
    $person = mysqli_query($con, "SELECT * FROM persons WHERE name='$name' AND user_id=' $session_user_id' ");
    $row = mysqli_fetch_assoc($person);

    if (mysqli_num_rows($person) > 0) {
        return [true, $row['id']];
    }

    return [false];
}

function get_all_person($con)
{
    global $session_user_id;
    $person = mysqli_query($con, "SELECT * FROM persons WHERE user_id ='$session_user_id'");
    $persons = [];

    while ($row = mysqli_fetch_assoc($person)) {
        array_push($persons, $row);
    }

    return $persons;
}

$persons = get_all_person($con);