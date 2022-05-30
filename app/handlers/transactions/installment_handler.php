<?php

$transaction = $transactions[0];

if (isset($_POST['action'])) {
    if ($_POST['action'] === 'installment') {
        $trx_id = $transaction['id'];
        $trx_temp_nominal = $_POST['temp_nominal'];

        $select = mysqli_query($con, "SELECT * FROM `transactions` WHERE  id = '$trx_id' AND user_id = '$session_user_id'");
        $transaction = mysqli_fetch_assoc($select);

        $errors = [];

        if ($trx_temp_nominal > $transaction['nominal']) {
            array_push($errors, "Angsuran melebihi batas");
        }

        if (empty($trx_temp_nominal)) {
            array_push($errors, "niat bayar gk");
        }

        if (empty($errors)) {

            $query = mysqli_query($con, "UPDATE `transactions` SET `status`='installment',`temp_nominal`='$trx_temp_nominal' WHERE id = '$trx_id' AND user_id = '$session_user_id'");

            if ($query) {
                $alert = ["success", ['status berhasil diupdate', 'mantap']];
            } else {
                $alert = ["danger", ['status berhasil diupdate', 'yahh']];

            }
        } else {
            $alert = ["danger", $errors];

        }

    }
}