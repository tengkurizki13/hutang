<div class="container">
    <h1 class="mb-3">transactions <?=($where === 'depts') ? '- Hutang' : '- Piutang'
?></h1>

    <a href="/app/index.php?page=transactions&view=<?=$where?>&action=create" class="btn btn-primary"><i
            class="bi bi-clipboard-plus"></i> Tambah</a>

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
                    <span class="badge bg-danger"><?=$transaction['status']?></span>
                </td>
                <td><?=date("d F Y H:i:s", strtotime($transaction['due_date']))?></td>
                <td>
                    <button class="btn btn-info btn-sm"><i class="bi bi-eye"></i></button>
                    <button class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                    <button class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></button>

                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>