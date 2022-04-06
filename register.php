<?php

$titel = 'register';
include_once './app/templates/header.php';
include_once './confiq/db.php';
include_once './app/auth/register_handler.php';

?>



<img src="./aasetCss/images/jam.jpg" alt="" srcset="" style="position: absolute; width:100%; height:100%; opacity:0.5;">
<div class="row w-100">
    <div class="col-4"></div>
    <div class="col-4">

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

        <div class="card">
            <div class="card-body border shadow ">
                <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                    <h1 class=' text-center pb-3 fw-bold fst-italic'>REGISTER BOSS!!</h1>
                    <div class="mb-3 ">
                        <label for="name" class='form-label'>Enter Name</label>
                        <input type="text" class='form-control' id='name' value="<?=$name?>" name='name' required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class='form-label'>Enter Username</label>
                        <input type="text" class='form-control' id='username' value="<?=$username?>" name='username'
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class='form-label'>Enter Email</label>
                        <input type="email" class='form-control' id='email' value="<?=$email?>" name='email'>
                    </div>
                    <div class="mb-3">
                        <label for="password" class='form-label'>Enter Password</label>
                        <input type="password" class='form-control' id='password' name='password' required>
                    </div>

                    <div class="mb-3">
                        <label for="wa_num" class='form-label'>Enter WhatApp Number</label>
                        <input type="text" class='form-control' id='wa_num' name='wa_num' required placeholder="">
                    </div>
                    <input type="hidden" name="action" value='register'>
                    <button type="submit" class='btn btn-primary col-12 rounded-pill' name='submit'>Daftar</button>
                </form>
                <div class="register mt-5">Already Have An Account <a class="fst-italic" href="./login.php">Login</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4"></div>
</div>

<?php
include_once './app/templates/footer.php';
?>