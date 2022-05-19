<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ./login.php");
}
include_once '../confiq/db.php';

$session_user_id = $_SESSION['user']['id'];

include_once './handlers/home_handler.php';
include_once './handlers/profile/profile_handler.php';
include_once './handlers//transactions/trasaction_handler.php';
include_once './handlers//transactions/handler.create.trx.php';

include_once './templates/header.php';
include_once './templates/navbar.php';

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'profile':
            if (isset($_GET['edit'])) {
                include_once './pages/profile/edit.php';
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

include_once './templates/footer.php';