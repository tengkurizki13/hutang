<?php

if (isset($_POST['action'])) {
    if ($_POST['action'] === 'status') {
        $trx_id = $_POST['id'];
        $trx_status = $_POST['status'];

        $query = mysqli_query($con, "UPDATE `transactions` SET `status`='$trx_status' WHERE id = $trx_id AND user_id = $session_user_id ");

        if ($query) {
            $alert = ["success", ['status berhasil diupdate', 'mantap']];
        } else {
            $alert = ["danger", ['status berhasil diupdate', 'yahh']];

        }

    }
}

// $status = $transactions[0]['status'];

// if (isset($_GET['action'])) {
//     switch ($_GET['action']) {
//         case 'paid':
//             $status = 'paid';
//             break;
//         case 'installment':
//             $status = 'installment';
//             break;

//         default:
//             $status = 'unpaid';
//             break;
//     }

// } else {
//     $status = 'unpaid';
//