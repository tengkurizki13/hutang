<?php

$page = "Detail";

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

$query = "SELECT COUNT(p.name),SUM(t.nominal),t.id, t.type,t.person_id, t.nominal,t.transaction_at, t.due_date, t.created_at, p.name FROM transactions as t LEFT JOIN persons as p ON t.person_id = p.id WHERE t.type = '$where' AND t.user_id='$session_user_id' GROUP BY p.name";

if (isset($_GET['filter'])) {
    switch ($_GET['filter']) {
        case "nominal_$where":
            $query .= "  ORDER BY `SUM(t.nominal)` DESC";
            break;
        case "name_$where":
            $query .= "  ORDER BY `name` ASC ";
            break;
        case "trx_$where":
            $query .= "  ORDER BY `COUNT(p.name)` DESC";
            break;

        default:
            break;
    }
}

$select = mysqli_query($con, $query);
$transactions = [];

while ($result = mysqli_fetch_assoc($select)) {

    array_push($transactions, $result);

}