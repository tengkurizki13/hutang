<?php
$ambil = mysqli_query($con, "SELECT * FROM users WHERE name='$user_login' ");
$letak = mysqli_fetch_assoc($ambil);

if (isset($_POST['edit'])) {
    $name = htmlspecialchars($_POST['name']);
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $wa = htmlspecialchars($_POST['wa']);

    $update = mysqli_query($con, "UPDATE `users` SET `name`='$name',`username`='$username',`email`='$email',`wa_num`='$wa' WHERE name='$user_login'");

    header("Location: /app/index.php?page=profile&aku=$wa");

}

?>

<div class="jumbotron  ">
    <h1 class="text-center py-3">EDIT PROFILE</h1>
    <div class="data">
        <form action="" class="edit" method="post">
            <div class="name pb-3">
                <label for="name">New Name</label>
                <input name="name" class="col-6" type="text" id="name" placeholder="<?=ucwords($letak['name'])?>">
            </div>
            <div class="username pb-3">
                <label for="username">New Username</label>
                <input name="username" class="col-6" type="text" id="username"
                    placeholder="<?=ucwords($letak['username'])?>">
            </div>
            <div class="email pb-3">
                <label for="email">New Email</label>
                <input name="email" class="col-6" type="text" id="email" placeholder="<?=ucwords($letak['email'])?>">
            </div>
            <div class=" wa pb-5">
                <label for="WA Number">New WA Number</label>
                <input name="wa" class="col-6" type="text" id="WA Number" placeholder="<?=ucwords($letak['wa_num'])?>">
            </div>
            <div class="submit">

                <input name="edit" class="col-6" type="submit">
            </div>
        </form>

    </div>

</div>