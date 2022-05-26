<?php

if (isset($_POST['action'])) {
    if ($_POST['action'] === 'edit_trx') {
        $use_for = htmlspecialchars($_POST['use_for']);
        $new_person = htmlspecialchars($_POST['new_person']);
        $nominal = htmlspecialchars($_POST['nominal']);
        $transaction_at = htmlspecialchars($_POST['transaction_at']);
        $transaction_at = fmt_to_timestamp($transaction_at);
        $id = $_GET['id'];

        $query = mysqli_query($con, "UPDATE `transactions` SET `use_for`='$use_for',`nominal`='$nominal' WHERE id = '$id'");

    }
}