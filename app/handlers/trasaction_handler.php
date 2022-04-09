<?php

if (isset($_GET['view'])) {
    switch ($_GET['view'] === 'depts') {
        case 'value':
            $where = 'depts';
            break;

        default:
            $where = 'receivables';
            break;
    }
} else {
    $where = 'depts';

}

$query = mysqli_query($con, "SELECT * FROM transactions WHERE type = '$where'");

$transactions = [];

while ($row = mysqli_fetch_assoc($query)) {
    array_push($transactions, $row);

}