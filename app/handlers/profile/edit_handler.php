<?php

if (isset($_POST["action"])) {
    if ($_POST["action"] === "edit_profile") {
        $name = htmlspecialchars($_POST['name']);
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $avatar = htmlspecialchars($_POST['avatar']);
        $email = htmlspecialchars($_POST['email']);
        $wa = htmlspecialchars($_POST['wa']);

        $errors = [];

        unset($_POST['password']);
        unset($_POST['avatar']);

        foreach ($_POST as $key => $val) {
            if (empty($val)) {
                $new_key = ucfirst($key);

                array_push($errors, str_replace("_", " ", $new_key) . " kosong!");
            }
        }

        if (!empty($password) && strlen($password) < 6) {
            array_push($errors, "password kurang");
        }
        if (!empty($email) && strpos($email, "@") === false) {
            array_push($errors, "email tidak valid");
        }

        if (empty($errors)) {

            $update = "UPDATE `users` SET `name`='$name',`username`='$username',`email`='$email',`wa_num`='$wa',`avatar`='$avatar'";

            if (!empty($password)) {
                $update .= ",`password` ='$password'";
            }

            $update .= " WHERE id ='$session_user_id'";

            $query = mysqli_query($con, $update);

            if ($query) {
                $alert = ['success', ['Data di tambahkan!']];
            } else {
                $alert = ['danger', 'Data di gagal tambahkan!'];
            }

        } else {
            $alert = ['danger', $errors];
        }
    }

}