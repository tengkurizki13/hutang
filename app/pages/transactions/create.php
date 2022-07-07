<div class="container">
    <h1 class="text-center pt-5 pb-3">Create <?=$title?></h1>
    <div class="row">
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
            <form action="<?=$_SERVER['REQUEST_URI']?>" method="post">
            <?php if($_GET['orang']) :?>
                <div class="mb-3">
                    <label for="wa_num" class="form-label">wa_num</label>
                    <input type="text" class="form-control" name="wa_num" value="<?=$wa_num?>" id="wa_num"
                        aria-describedby="emailHelp">
                </div>
            <?php  endif;?>
                <div class="mb-3">
                    <label for="kegunaan" class="form-label">Kegunaan</label>
                    <input type="text" class="form-control" name="use_for" value="<?=$use_for?>" id="kegunaan"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="nominal" class="form-label">Nominal</label>
                    <input type="text" class="form-control" value="<?=$nominal?>" name="nominal" id="nominal">
                </div>
                <div class="mb-3">
                    <label for="waktu_receivable" class="form-label">Waktu <?=$title?></label>
                    <input type="datetime-local" class="form-control" name="transaction_at" id="waktu_receivable">
                </div>
                <div class="mb-3">
                    <label for="kapan_bayar" class="form-label">kapan bayar</label>
                    <input type="datetime-local" class="form-control" name="due_date" id="kapan_bayar">
                </div>
                <input type="hidden" name="type" value="<?=$where?>">
                <input type="hidden" name="action" value="create_trx">
                <button type="submit" class="btn btn-primary">buat
                    <?=$title?></button>
                <a class="btn btn-danger" href="/app/index.php?page=transactions&view=<?=$where?>">Cancel</a>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
</div>