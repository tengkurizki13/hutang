<!-- <?php




$titel = 'register';
include_once './app/templates/header.php';


if ($_POST){
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $wa = htmlspecialchars($_POST['wa_num']);
    $avatar = htmlspecialchars($_POST['avatar']);
    

  
    $errors = [];
     

    if (empty($username)) {
        array_push($errors, "username kosong");
    }

    if (empty($email)) {
        array_push($errors, "email kossong");
    }
    if (!empty($email) && strpos($email,"@") === false) {
        array_push($errors, "email tidak valid");
    }
    if (empty($password)) {
        array_push($errors, "password kosong");
    }
    if (!empty($password) && strlen($password) < 6) {
        array_push($errors, "password kurang dari 6 kata");
    }
    if (empty($wa)) {
        array_push($errors, "wa_num kosong");
    }
    if (!empty($wa) && strlen($wa) < 6) {
        array_push($errors, "wa_num kurang dari 12 nomer");
    }
}




if(empty($errors) && isset($_POST['submit'])){
    include_once './confiq/db.php';

    $insert = mysqli_query($con, "INSERT INTO `users`(`name`, `email`, `password`, `wa_num`, `avatar`) VALUES ('".$username."','".$email."','".$password."','".$wa."','".$avatar."')");

    mysqli_close($con);

    if ($insert) {
        $alert = ['success',['berhasil menambahkan data']];
   
    }else{
        $alert = ['danger',['gagal menambahkan data']];
    }

}else{
    $alert = ['danger',$errors];
}

?>

<div class="row w-100">
    <div class="col-4"></div>
    <div class="col-4">
        <h1 class='mt-5'>REGISTER BOSS!!</h1>
        <?php
       
       if(isset($alert)) :
        ?>
        <div class="alert alert-<?= $alert[0] ?> alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                <?php
            
            foreach ($alert[1] as $alert_msg) {
                echo '<li><strong>'. $alert_msg .'</strong></li>';
            }

            ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
       endif;
       ?>


        <form action="<?= $_SERVER['PHP_SELF']?>" method="post">


            <div class="mb-3">
                <label for="username" class='form-label'>username</label>
                <input type="text" class='form-control' id='username' name='username'>
            </div>
            <div class="mb-3">
                <label for="email" class='form-label'>email</label>
                <input type="email" class='form-control' id='email' name='email'>
            </div>
            <div class="mb-3">
                <label for="password" class='form-label'>password</label>
                <input type="password" class='form-control' id='password' name='password'>
            </div>

            <div class="mb-3">
                <label for="wa_num" class='form-label'>wa_num</label>
                <input type="text" class='form-control' id='wa_num' name='wa_num'>
            </div>
            <div class="mb-3">
                <label for="avatar" class='form-label'>avatar</label>
                <input type="text" class='form-control' id='avatar' name='avatar'>
            </div>
            <button type="submit" class='btn btn-primary' name='submit'>Daftar</button>
        </form>
    </div>
    <div class="col-4"></div>
</div>

<?php
include_once './app/templates/footer.php';
?> -->