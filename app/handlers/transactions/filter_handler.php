<?php 


$is_filter = false;

if (isset($_GET['filter'])) {
    $filter_mode = $_GET['filter'];
    switch ($filter_mode) {
        case 'unpaid':
            $filter = 'unpaid';
            break;
        case 'paid':
            $filter = 'paid';
            break;
        default:
            $filter = 'installment';
            break;
    }

    $is_filtered = true;
}

$filtered_get = $is_filtered ? "&filter=$filter_mode" : '';