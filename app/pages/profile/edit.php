<?php
$ambil = mysqli_query($con, "SELECT * FROM users WHERE name='$user_login' ");
$letak = mysqli_fetch_assoc($ambil);

?>

<div class="jumbotron  ">
    <h1 class="text-center py-3">EDIT PROFILE</h1>
    <div class="data ">
        <?php

if (isset($alert)):
?>
        <div class="alert alert-<?=$alert[0]?> alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                <?php

foreach ($alert[1] as $alert_msg) {
    echo '<li><strong>' . $alert_msg . '</strong></li>';
}

?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
endif;
?>
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
            <div class=" wa pb-5">
                <label for="password">New password</label>
                <input name="password" class="col-6" type="password" id="password">
            </div>
            <div class=" wa pb-5">
                <label for="avatar">New avatar</label>
                <input name="avatar" class="col-6" type="file" id="avatar">
            </div>
            <div class="submit">
                <input type="hidden" name="action" value="edit_profile">
                <input name="edit" class="col-6" type="submit">
            </div>
        </form>

    </div>

</div>