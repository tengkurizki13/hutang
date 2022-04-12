<?php

if (isset($_POST['action'])) {
    if ($_POST['action'] === 'create_trx') {
        $use_for = htmlspecialchars($_POST['use_for']);
        $fav_person = htmlspecialchars($_POST['fav_person']);
        // $new_person = htmlspecialchars($_POST['new_person']);
        $new_person = 1;
        $nominal = htmlspecialchars($_POST['nominal']);
        // $transaction_at = htmlspecialchars($_POST['transaction_at']);
        $transaction_at = "2022-04-07 09:47:39";
        // $due_date = htmlspecialchars($_POST['due_date']);
        $due_date = "2022-04-07 09:47:39";
        $type = htmlspecialchars($_POST['type']);
        $type = $where;

        $errors = [];

        if (empty($use_for)) {
            array_push($errors, "isi keperluan ente boss!!");
        }

        if (empty($nominal)) {
            array_push($errors, "isi nominal boss!!");}

        if (empty($errors)) {

            $insert = mysqli_query($con, "INSERT INTO `transactions`(`type`,`use_for`, `person_id`, `nominal`,`transaction_at`, `due_date`) VALUES ('$type','$use_for','$new_person','$nominal','$transaction_at','$due_date')");

            if ($insert) {
                $alert = ['success', ['berhasil menambahkan data']];
                header("Location: /app/index.php?page=transactions&view=$where");

            } else {
                $alert = ['danger', ['username sudah dipakai']];
            }

        } else {
            $alert = ['danger', $errors];
        }
    }
}