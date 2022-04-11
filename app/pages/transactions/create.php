<div class="container">
    <h1 class="text-center pt-5 pb-5">create <?=($where === 'depts') ? '- Hutang' : '- Piutang'?></h1>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="kegunaan" class="form-label">Kegunaan</label>
                    <input type="text" class="form-control" name="use_for" id="kegunaan" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="orang" class="form-label">Orang</label>
                    <input type="text" class="form-control" name="person" id="orang">
                </div>
                <div class="mb-3">
                    <label for="nominal" class="form-label">Nominal</label>
                    <input type="text" class="form-control" name="nominal" id="nominal">
                </div>
                <div class="mb-3">
                    <label for="waktu_receivable"
                        class="form-label">Waktu<?=($where === 'depts') ? '- Hutang' : '- Piutang'?></label>
                    <input type="datetime-local" class="form-control" name="transaction_at" id="waktu_receivable">
                </div>
                <div class="mb-3">
                    <label for="kapan_bayar" class="form-label">kapan bayar</label>
                    <input type="datetime-local" class="form-control" name="transaction_at" id="kapan_bayar">
                </div>
                <button type="submit" class="btn btn-primary">buat
                    <?=($where === 'depts') ? '- Hutang' : '- Piutang'?></button>
            </form>
        </div>
        <div class="col-4"></div>
    </div>


</div>