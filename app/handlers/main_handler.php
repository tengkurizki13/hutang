<?php

$session_user_id = $_SESSION['user']['id'];

$query = mysqli_query($con, "SELECT * FROM users WHERE id ='$session_user_id'");
$user = mysqli_fetch_assoc($query);

$page_now = isset($_GET['page']) ? $_GET['page'] : 'home';

function rupiah($number)
{

    $hasil_rupiah = "Rp " . number_format($number, 2, ',', '.');
    return $hasil_rupiah;

}