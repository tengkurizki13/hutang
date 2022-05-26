<?php

$transaction = $transactions[0];

if (isset($_POST['action'])) {
    if ($_POST['action'] === 'installment') {
        $trx_id = $transaction['id'];
        $trx_temp_nominal = $_POST['temp_nominal'];

        $query = mysqli_query($con, "UPDATE `transactions` SET `status`='installment',`temp_nominal`='$trx_temp_nominal' WHERE id = '$trx_id' AND user_id = '$session_user_id'");

        if ($query) {
            $alert = ["success", ['status berhasil diupdate', 'mantap']];
        } else {
            $alert = ["danger", ['status berhasil diupdate', 'yahh']];

        }

    }
}