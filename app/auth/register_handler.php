<?php


if (isset($_POST['action'])) {
    if ($_POST['action'] === 'register') {
        $name = htmlspecialchars($_POST['name']);
        $username = htmlspecialchars($_POST['username']);
        $wa_num = htmlspecialchars($_POST['wa_num']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);


$errors = [];

if (!empty($wa_num) && strlen($wa_num) < 12) {
    array_push($errors, "wa_num kurang dari 12 nomer");}

// if (!empty($email) && strpos($email,"@") === false) {
//     array_push($errors, "email tidak valid");
// }
// if (empty($password)) {
//     array_push($errors, "password kosong");
// }
if (!is_numeric($wa_num)) {
        array_push($errors, "wa harus number");
    }
if (!empty($password) && strlen($password) < 6) {
    array_push($errors, "password kurang dari 6 kata");
}



if (empty($errors)) {
   
    $insert = mysqli_query($con, "INSERT INTO `users`(`name`,`username`,`wa_num`, `email`, `password`) VALUES ('$name','$username','$wa_num','$email','$password')"); 

    if ($insert) {
        $alert = ['success',['berhasil menambahkan data']];
   
    }else{
        $alert = ['danger',['gagal menambahkan data']];
    }

}else{
    $alert = ['danger',$errors];
}
    


                
    }}
    