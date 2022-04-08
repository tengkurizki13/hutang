<?php

session_start();

if (isset($_SESSION['user'])) {
    header("Location: /app/index.php");
}

$page = "login";

include_once __DIR__ . '/app/templates/header.php';

include_once __DIR__ . '/confiq/db.php';

include_once __DIR__ . '/app/auth/login_handler.php';

?>
<!-- <img src="./aasetCss/images/zzz" alt="" srcset=""
    style="position: absolute; width:100%; height:100%; opacity:0.5;"> -->
<div class="container">

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h1 class="pt-5 pb-3 fw-bold fst-italic text-center"></h1>
            <div class="card">
                <div class="card-body border shadow">
                    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
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
                        <div class="mb-3">
                            <label for="username" class="form-label">Name</label>
                            <input type="text" class="form-control" id="username" value="<?=$username?>" name="username"
                                aria-describedby="usernameHelp">
                            <div id="usernameHelp" class="form-text">Masukan Username</div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" value="<?=$password?>"
                                name="password" aria-describedby="passwordHelp">
                            <div id="passwordHelp" class="form-text">Masukan Password</div>
                        </div>
                        <input type="hidden" name="action" value='login'>

                        <button type="submit" class="btn btn-primary col-12 rounded-pill ">Login</button>
                    </form>
                    <div class="register mt-5">if you not have account , <a class="fst-italic"
                            href="./register.php">klik here</a></div>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>



<?php
include_once __DIR__ . './app/templates/footer.php';

?>