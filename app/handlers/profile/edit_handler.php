<?php

$user = $_SESSION['user'];

if (isset($_POST["action"])) {
    if ($_POST["action"] === "edit_profile") {
        $fullname = htmlspecialchars($_POST['fullname']);
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $avatar = htmlspecialchars($_POST['avatar']);
        $email = htmlspecialchars($_POST['email']);
        $wa_num = htmlspecialchars($_POST['wa_num']);

        $errors = [];

        // unset($_POST['avatar']);
        unset($_POST['password']);

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
        if (isset($_FILES['avatar'])) {

            $error_code = $_FILES['avatar']['error'];

            if ($error_code === 0) {
                [$moved, $avatar_name, $errors_msg] = upload_avatar();
            }
            if (!$moved) {
                array_push($errors, ...$errors_msg);
            }

        }

        if (empty($errors)) {

            $query = "UPDATE `users` SET `name`='$fullname',`username`='$username',`email`='$email',`wa_num`='$wa_num'";

            if (!empty($password)) {
                $query .= ",`password` ='$password'";
            }

            $query .= " WHERE id ='$session_user_id'";

            $update = mysqli_query($con, $query);

            // $user_login = $_SESSION['user']['name'];

            if ($update) {
                $alert = ['success', ['Alhamdulillah Sudah Diedit!']];
                session_start();
                $_SESSION['user']['name'] = $fullname;
                $_SESSION['user']['username'] = $username;
                $_SESSION['user']['email'] = $email;
                $_SESSION['user']['wa_num'] = $wa_num;
                $_SESSION['user']['avatar'] = $avatar_name;

                // header("Location: /app/index.php?page=profile");

            } else {
                $alert = ['danger', ['Data di gagal tambahkan!']];
            }

        } else {
            $alert = ['danger', $errors];
        }
    }

}

function upload_avatar()
{
    $avatar = $_FILES['avatar'];
    global $session_user_id;

    $imageFileType = strtolower(pathinfo($avatar['name'], PATHINFO_EXTENSION));
    $allowableFileType = ['jpg', 'jpeg', 'png', 'gif'];

    $errors = [];

    // if ext not valid, reject!
    if (!in_array($imageFileType, $allowableFileType)) {
        array_push($errors, "Avatar tidak di valid!");
    }

    // if bigger than 1 mb, reject!
    if ($avatar['size'] > 1000000) {
        array_push($errors, "Avatar harus lebih kecil dari 1 mb!");
    }

    $target_dir = "./public/avatar/";
    $avatar_name = $session_user_id . "_" . time() . "." . $imageFileType;
    $target_file = $target_dir . $avatar_name;

    if (empty($errors)) {

        $moved = move_uploaded_file($avatar['tmp_name'], $target_file);
    }

    return [$moved, $avatar_name, $errors];
}