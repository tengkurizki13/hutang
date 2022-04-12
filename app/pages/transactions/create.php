<div class="container">
    <h1 class="text-center pt-5 pb-3">create <?=$title?></h1>
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
                <div class="mb-3">
                    <label for="kegunaan" class="form-label">Kegunaan</label>
                    <input type="text" class="form-control" name="use_for" id="kegunaan" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="orang-favorit" class="form-label">Orang-favorit</label>
                    <select class="form-select" name="fav_person" id="fav_person">
                        <option value="-">pilih orang favorit</option>
                        <option value="tengku">Tengku</option>
                        <option value="rizki">rizki</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="orang-baru" class="form-label">Orang-baru</label>
                    <input type="text" class="form-control" name="new_person" id="orang-baru">
                </div>
                <div class="mb-3">
                    <label for="nominal" class="form-label">Nominal</label>
                    <input type="text" class="form-control" name="nominal" id="nominal">
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