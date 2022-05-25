<div class="jumbotron ">
    <div class="gambar text-center">
        <img src="/app/public/avatar/<?=$user['avatar']?>" alt="" class="rounded-circle border border-dark border-2" />
        <h2 class="display-6 pt-3"><?=strtoupper($user['name'])?></h2>
        <a class="text-decoration-none me-auto col-6 fs-3 lead fst-italic"
            href="/app/index.php?page=profile&action=edit">edit</a>
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