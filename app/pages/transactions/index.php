<div class="container">
    <h1 class="mb-3">transactions <?=($where === 'depts') ? '- Hutang' : '- Piutang'
?></h1>

    <a href="/app/index.php?page=transactions&view=<?=$where?>&action=create" class="btn btn-primary mb-3"><i
            class="bi bi-clipboard-plus "></i> Tambah</a>
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
    <table class="table table-striped table-bordered mt-3">
        <thead class="table-dark ">
            <tr>
                <th>No.</th>
                <th>Untuk</th>
                <th>Orang</th>
                <th>Nominal</th>
                <th>status</th>
                <th>Jatuh Tempo</th>
                <th>action</th>
            </tr>
        </thead>
        <?php if (count($transactions) === 0): ?>
        <tbody>
            <tr>
                <td colspan="7" class="text-center">
                    Data Kosong
                </td>
            </tr>
        </tbody>

        <?php endif;?>
        <tbody>
            <?php
$num = 1;
foreach ($transactions as $transaction):

?>
            <tr>
                <td><?=$num++?></td>
                <td><?=$transaction['use_for']?></td>
                <td><?=$transaction['name']?></td>
                <td><?=rupiah($transaction['nominal'] - $transaction['temp_nominal'])?></td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span
                                class="badge bg-<?=$transaction['status_badge_color'][0]?> <?=$transaction['status_badge_color'][1]?>"><?=$transaction['status']?></span>

                        </button>
                        <ul class="dropdown-menu">

                            <li>
                                <?php foreach ($transaction['trx_status'] as $ts): ?>
                                <form action="" method="post">
                                    <input type="hidden" name="action" value="status">
                                    <input type="hidden" name="id" value="<?=$transaction['id']?>">
                                    <input type="hidden" name="status" value="<?=$ts?>">
                                    <button class="dropdown-item" href="#"><?=Ucwords($ts)?></button>
                                </form>
                                <?php endforeach;?>
                            </li>
                            <?php if ((count($transaction['trx_status']) === 1 && $transaction['status'] !== 'paid') || $transaction['status'] === 'installment'): ?>
                            <li><a class="dropdown-item"
                                    href="/app/index.php?page=transactions&view=<?=$where?>&action=installment&id=<?=$transaction['id']?>">Installment</a>
                            </li>
                            <?php endif;?>
                        </ul>
                    </div>
                </td>
                <td><?=date("d F Y H:i:s", strtotime($transaction['due_date']))?></td>
                <td>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                        data-bs-target="#trx_modal_<?=$transaction['id']?>"> <i class="bi bi-eye"></i></button>
                    <a href="/app/index.php?page=transactions&view=<?=$where?>&action=edit&id=<?=$transaction['id']?>&name=<?=$transaction['name']?>"
                        class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                    <form method="post" class="form_trx_delete" onclick="return confirm('yakin boss??')">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?=$transaction['id']?>">
                        <button
                            href="/app/index.php?page=transactions&view=depts&action=delete&id=<?=$transaction['id']?>"
                            class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></button>
                    </form>

                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>

<?php
$num = 1;
foreach ($transactions as $transaction):

?>



<div class="modal fade" id="trx_modal_<?=$transaction['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?=$transaction['type']?>
                    #<?=$transaction['id']?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table  ">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Kegunaan</th>
                            <th scope="col">Nominal</th>
                            <th scope="col">Jumlah Angsuran</th>
                            <th scope="col">Pemilik Akun</th>
                            <th scope="col">Transaksi Ke</th>
                            <th scope="col">Jatuh Tempo</th>
                            <th scope="col">status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><?=$num++?></th>
                            <td><?=$transaction['name']?></td>
                            <td><?=$transaction['use_for']?></td>
                            <td><?=rupiah($transaction['nominal'])?></td>
                            <td><?=rupiah($transaction['temp_nominal'])?></td>
                            <td><?=$session_user_name?></td>
                            <td><?=$transaction['id']?></td>
                            <td><?=$transaction['due_date']?></td>
                            <td><?=$transaction['status']?></td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<?php endforeach;?>