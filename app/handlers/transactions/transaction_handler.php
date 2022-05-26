<?php
$page = "Transactions";

if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'depts':
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

$query = mysqli_query($con, "SELECT t.id, t.type, t.user_id, t.use_for, t.person_id, t.nominal, t.temp_nominal, t.status, t.transaction_at, t.due_date, t.created_at, t.updated_at, p.name FROM transactions as t LEFT JOIN persons as p ON t.person_id = p.id WHERE t.type = '$where' AND t.user_id='$session_user_id'");

$transactions = [];

while ($row = mysqli_fetch_assoc($query)) {
    $row["trx_status"] = [];

    switch ($row["status"]) {
        case 'paid':
            $row["status_badge_color"] = ['success', ''];
            array_push($row['trx_status'], "unpaid");
            break;
        case 'unpaid':
            $row["status_badge_color"] = ['danger', ''];
            array_push($row['trx_status'], "paid");
            break;
        default:

            $row["status_badge_color"] = ['warning', 'text-dark'];
            array_push($row['trx_status'], "unpaid");
            array_push($row['trx_status'], "paid");
            break;
    }

    array_push($transactions, $row);

    // echo "<pre>" . print_r([
    //     "transaction_handler.php - 49",
    //     $transactions,
    // ], 1) . "</pre>";

}