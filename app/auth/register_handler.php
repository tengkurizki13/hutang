<?php

echo "<pre>" . print_r([
    "register_handler.php - 3",
    $_POST,
], 1) . "</pre>";

if (isset($_POST['action'])) {
    if ($_POST['action'] === 'register') {
        $name = htmlspecialchars($_POST['name']);
        $username = htmlspecialchars($_POST['username']);
        $wa_num = htmlspecialchars($_POST['wa_num']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $errors = [];

        // if (empty($username)) {
        //     array_push($errors, "username kosong");
        // }
        // if (empty($name)) {
        //     array_push($errors, "name kosong");
        // }
        // if (empty($email)) {
        //     array_push($errors, "email kosong");
        // }

        if (!empty($email) && strpos($email, "@") === false) {
            array_push($errors, "email tidak valid");
        }
        // if (empty($password)) {
        //     array_push($errors, "password kosong");
        // }
        if (!empty($wa_num) && strlen($wa_num) < 12) {
            array_push($errors, "wa_num kurang dari 12 nomer");}

        if (!is_numeric($wa_num)) {
            array_push($errors, "wa harus number");
        }
        if (!empty($password) && strlen($password) < 6) {
            array_push($errors, "password kurang dari 6 kata");
        }

        if (empty($errors)) {

            $q = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
            $cek = mysqli_num_rows($q);

            if ($cek === 0) {

                $insert = mysqli_query($con, "INSERT INTO `users`(`name`,`username`,`wa_num`, `email`, `password`) VALUES ('$name','$username','$wa_num','$email','$password')");
            }

            if ($insert) {
                $alert = ['success', ['berhasil menambahkan data']];

            } else {
                $alert = ['danger', ['username sudah dipakai']];
            }

        } else {
            $alert = ['danger', $errors];
        }

    }}