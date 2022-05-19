<?php
$aku = $_GET['aku'];

if (isset($aku)) {
    $ambil = mysqli_query($con, "SELECT * FROM users  WHERE wa_num = '$aku' ");
    $letak = mysqli_fetch_assoc($ambil);
    session_start();
    $_SESSION['user'] = $letak;
} else {
    $ambil = mysqli_query($con, "SELECT * FROM users  WHERE name = '$user_login' ");
    $letak = mysqli_fetch_assoc($ambil);
}

?>


<div class="jumbotron  ">
    <div class="gambar text-center">
        <img src="/app/public/css/tengku.jpg" alt="" class="rounded-circle border border-dark border-2" />
        <h2 class="display-6 pt-3"><?=strtoupper($letak['name'])?></h2>
        <a class="text-decoration-none me-auto col-6 fs-3 lead fst-italic"
            href="/app/index.php?page=profile&edit=ganti">edit</a>
    </div>
    <hr class="col-6">
    <div class="data">
        <div class="username">
            <h4 class="col-6 lead fst-italic">Username &nbsp;: <?=ucwords($user['username'])?>
            </h4>

        </div>
        <hr class="col-6">
        <div class="email">
            <h4 class=" col-6 lead fst-italic"> Your Email &nbsp;:&nbsp; <?=ucwords($user['email'])?></h4>

        </div>
        <hr class="col-6">
        <div class="wa">
            <h4 class=" col-6 lead fst-italic"> Your Number &nbsp;:&nbsp; <?=ucwords($user['wa_num'])?></h4>
        </div>
        <hr class="col-6">

    </div>

</div>