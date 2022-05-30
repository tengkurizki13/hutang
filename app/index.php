<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ./login.php");
}

include_once '../confiq/db.php';
include_once './handlers/main_handler.php';

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'profile':
            include_once './handlers/profile/edit_handler.php';
            include_once './handlers/profile/profile_handler.php';
            break;
        case 'transactions':
            include_once './handlers/transactions/create_trx_handler.php';
            include_once './handlers/transactions/delete_handler.php';
            include_once './handlers/transactions/edit.handler.php';
            include_once './handlers/transactions/transaction_handler.php';
            include_once './handlers/transactions/status_handler.php';
            include_once './handlers/transactions/installment_handler.php';
            break;
        default:
            include_once './handlers/home/home_handler.php';
            break;
    }
} else {
    include_once './handlers/home/home_handler.php';
}

include_once './templates/header.php';
include_once './templates/navbar.php';

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'profile':
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'edit':
                        include_once './pages/profile/edit.php';
                        break;
                    default:
                        include_once './pages/profile/index.php';
                        break;
                }
            } else {
                include_once './pages/profile/index.php';
            }
            break;
        case 'transactions':
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'create':
                        include_once './pages/transactions/create.php';
                        break;
                    case 'edit':
                        include_once './pages/transactions/edit.php';
                        break;
                    case 'installment':
                        include_once './pages/transactions/installment.php';
                        break;
                    default:
                        include_once './pages/transactions/index.php';
                        break;
                }
            } else {
                include_once './pages/transactions/index.php';
            }
            break;
        default:
            include_once './pages/dashboard.php';
            break;
    }
} else {
    include_once './pages/dashboard.php';
}
echo "<pre>" . print_r([
    "index.php - 79",

], 1) . "</pre>";
include_once './templates/footer.php';