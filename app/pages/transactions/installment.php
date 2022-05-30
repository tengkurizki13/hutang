<div class="container">
    <div class="row">
        <h1>Installment</h1>
        <div class="col-6">
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
            <form method="post">
                <div class="mb-3">
                    <label for="temp_nominal" class="form-label">Installment_Nominal</label>
                    <input type="text" class="form-control" value="<?=$temp_nominal?>" name="temp_nominal"
                        id="temp_nominal">
                </div>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Jumlah Hutang</th>
                            <td><?=rupiah($transaction['nominal'])?></td>
                        </tr>
                        <tr>
                            <th>Jumlah Angsuran</th>
                            <td><?=rupiah($_POST['temp_nominal'])?></td>
                        </tr>
                        <tr>
                            <th>Sisa Angsuran</th>
                            <td><?=rupiah($transaction['nominal'] - intval($_POST['temp_nominal']))?></td>
                        </tr>
                    </tbody>
                </table>
                <input type="hidden" name="action" value="installment">
                <button class="btn btn-primary">Save</button>
                <a class="btn btn-danger" href="/app/index.php?page=transactions&view=<?=$where?>">Cancel</a>
            </form>
        </div>
    </div>
</div>