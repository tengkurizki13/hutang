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