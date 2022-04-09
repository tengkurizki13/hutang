<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ./login.php");
}
include_once '../confiq/db.php';

include_once './handlers/home_handler.php';
include_once './handlers/trasaction_handler.php';

include_once './templates/header.php';
include_once './templates/navbar.php';

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'transactions':
            include_once './pages/transactions/index.php';
            break;

        default:
            include_once './pages/dashboard.php';
            break;
    }
} else {
    include_once './pages/dashboard.php';
}

include_once './templates/footer.php';