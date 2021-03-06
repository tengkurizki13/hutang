<?php

if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'depts':
            $where = 'depts';
            $title = "Hutang";
            break;
        default:
            $where = 'receivables';
            $title = "Piutang";
            break;
    }
} else {
    $where = 'depts';
    $title = "Hutang";
}

$now = isset($_GET['now']) && is_numeric($_GET['now']) ? $_GET['now'] : 1;

$query = "SELECT * FROM transactions WHERE user_id = '$session_user_id' AND type='$where'";

if ($is_filtered) {
    $query .= " AND status = '$filter'";
}


$isset_search = isset($_GET['search']) ? $_GET['search'] : '';
if ($isset_search) {
    $query .= " AND use_for like '%$isset_search%'";
}

$all_data = mysqli_query($con, $query);
$all_data = mysqli_num_rows($all_data);


$per_page = 5;

$total_pages = ceil($all_data / $per_page);


$start_page = ($now - 1) * $per_page; 

$now_get = $now ? "&now=$now" : '';