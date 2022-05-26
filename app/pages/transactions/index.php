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
                <td><?=$transaction['nominal']?></td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn  dropdown-toggle" data-bs-toggle="dropdown"
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
                            <?php if (count($transaction['trx_status']) === 1 && $transaction['status'] !== 'paid'): ?>
                            <li><a class="dropdown-item" href="#">Installment</a></li>
                            <?php endif;?>
                        </ul>
                    </div>
                </td>
                <td><?=date("d F Y H:i:s", strtotime($transaction['due_date']))?></td>
                <td>
                    <button class="btn btn-info btn-sm"><i class="bi bi-eye"></i></button>
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