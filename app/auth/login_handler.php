<?php

if (isset($_POST['action'])) {
    if ($_POST['action'] === 'login') {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        $errors = [];

        if (empty($username)) {
            array_push($errors, "username kosong");
        }

        if (empty($password)) {
            array_push($errors, "password kosong");
        }
        if (!empty($password) && strlen($password) < 6) {
            array_push($errors, "password kurang dari 6 kata");
        }

        if (empty($errors)) {

            $query = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'  OR  email = '$username'");

            if (mysqli_num_rows($query) > 0) {
                $result = mysqli_fetch_assoc($query);

                if ($password === $result['password']) {

                    session_start();

                    $_SESSION['user'] = $result;
                    unset($_SESSION['user']['password']);

                    echo "<pre>" . print_r([
                        "login_handler.php - 33",
                        $_SESSION,
                    ], 1) . "</pre>";die;
                    header("Location: /revisihutang/app/index.php");
                    exit;
                }
            }

            array_push($errors, "login gagal");
        }

        $alert = ['danger', $errors];
    }}