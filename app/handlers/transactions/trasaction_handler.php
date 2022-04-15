<?php
$page = "Transactions";
if (isset($_GET['view'])) {
    switch ($_GET['view'] === 'depts') {
        case 'value':
            $where = 'depts';
            $title = 'hutang';
            break;

        default:
            $where = 'receivables';
            $title = 'piutang';
            break;
    }
} else {
    $where = 'depts';
    $title = 'hutang';

}

$query = mysqli_query($con, "SELECT * FROM transactions WHERE type = '$where' AND user_id ='$session_user_id'");

$transactions = [];

while ($row = mysqli_fetch_assoc($query)) {
    array_push($transactions, $row);

}