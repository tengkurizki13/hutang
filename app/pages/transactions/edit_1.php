<div class="container">
    <h1 class="text-center pt-3 pb-3">Edit Transaksi <?=($where === 'depts') ? '- Hutang' : '- Piutang'
?></h1>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="kegunaan" class="form-label">Kegunaan</label>
                    <input type="text" class="form-control" name="use_for" id="kegunaan" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="orang" class="form-label">Orang</label>
                    <input type="text" class="form-control" name="new_person" id="orang">
                </div>
                <div class="mb-3">
                    <label for="nominal" class="form-label">Nominal</label>
                    <input type="text" class="form-control" name="nominal" id="nominal">
                </div>
                <div class="mb-3">
                    <label for="kapan_bayar" class="form-label">kapan bayar</label>
                    <input type="datetime-local" class="form-control" name="transaction_at" id="kapan_bayar">
                </div>

                <input type="hidden" name="action" value="edit_trx">
                <button type="submit" class="btn btn-primary">Edit & Save</button>
                <a class="btn btn-danger" href="/app/index.php?page=transactions&view=<?=$where?>">Cancel</a>

            </form>
        </div>
        <div class="col-4"></div>
    </div>
</div>