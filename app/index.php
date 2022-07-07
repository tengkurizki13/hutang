<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ./login.php");
}

include_once '../confiq/db.php';
include_once './handlers/main_handler.php';

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'Most_Freq_Trx':
            include_once './handlers/persons/Detail_Handler.php';
            break;
        case 'profile':
            include_once './handlers/profile/edit_handler.php';
            include_once './handlers/profile/profile_handler.php';
            break;
        case 'transactions':
            include_once './handlers/transactions/delete_handler.php';
            include_once './handlers/transactions/status_handler.php';
            include_once './handlers/transactions/filter_handler.php';
            include_once './handlers/transactions/pagination_handler.php';
            include_once './handlers/transactions/sort_handler.php';
            include_once './handlers/transactions/transaction_handler.php';
            include_once './handlers/transactions/create_trx_handler.php';
            include_once './handlers/transactions/between_handler.php';
            include_once './handlers/transactions/export_spreadsheet.php';
            include_once './handlers/transactions/installment_handler.php';
            include_once './handlers/transactions/edit.handler.php';
            break;
        default:
            include_once './handlers/home/home_handlers.php';
            break;
    }
} else {
    include_once './handlers/home/home_handlers.php';
}

include_once './templates/header.php';
include_once './templates/navbar.php';

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'Most_Freq_Trx':
            include_once './pages/persons/index.php';
            break;
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
                    case 'export':
                        include_once './export/pdf/Export-pdf.php';
                        break;
                    case 'installment':
                        include_once './pages/transactions/installment.php';
                        break;
                    case 'between':
                        include_once './pages/transactions/between.php';
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

$jsScripts = [];

// load JS (javascript)
if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'transactions':
            include_once './js/transactions.php';
            break;
    }
}

include_once './templates/footer.php';