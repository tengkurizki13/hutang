<div class="container">
    <h1 class="mb-3">transactions <?=($where === 'depts') ? '- Hutang' : '- Piutang'
?></h1>

    <div class="row">
        <div class="col-md-12 d-flex justify-content-between pb-0 ">
            <a href="/app/index.php?page=transactions&view=<?=$where?>&action=create" class="btn btn-primary pb-0 ">
                <i class="bi bi-plus-circle"></i> Tambah
            </a>
            <div class="d-flex gap-2">
                <div class="btn-group">
                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                        data-bs-target="#trx_modal_<?=$transaction['id']?>">Export
                    </button>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">filter <?=$filter?>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item"
                                href="/app/index.php?page=transactions&view=<?=$where . $search_get . $sorted_get?>&filter=unpaid">unpaid</a>
                        </li>
                        <li>
                            <a class="dropdown-item"
                                href="/app/index.php?page=transactions&view=<?=$where . $search_get . $sorted_get?>&filter=paid">paid</a>
                        </li>
                        <li>
                            <a class="dropdown-item"
                                href="/app/index.php?page=transactions&view=<?=$where . $search_get . $sorted_get?>&filter=installment">installment</a>
                        </li>
                        <?php if ($filtered_get): ?>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item"
                                href="/app/index.php?page=transactions&view=<?=$where . $search_get . $sorted_get?>"><i
                                    class="bi bi-trash"></i> Clear filter</a>
                        </li>
                        <?php endif?>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Sort <?php if ($is_sorted) {echo " ~ " . $sort;}?>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item"
                                href="/app/index.php?page=transactions&view=<?=$where . $search_get . $filtered_get?>&sort=az"><i
                                    class="bi bi-sort-down"></i> A - Z</a>
                        </li>
                        <li>
                            <a class="dropdown-item"
                                href="/app/index.php?page=transactions&view=<?=$where . $search_get . $filtered_get?>&sort=za"><i
                                    class="bi bi-sort-up"></i> Z - A</a>
                        </li>
                        <?php if ($sorted_get): ?>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item"
                                href="/app/index.php?page=transactions&view=<?=$where . $search_get . $filtered_get?>"><i
                                    class="bi bi-trash"></i> Clear Sorting</a>
                        </li>
                        <?php endif?>
                    </ul>
                </div>
                <form action="/app/index.php" method="get" class="d-flex">
                    <input type="hidden" name="page" value="transactions">
                    <input type="hidden" name="view" value="<?=$where?>">
                    <?php if ($sorted_get): ?>
                    <input type="hidden" name="sort" value="<?=$sort_mode?>">
                    <?php endif?>
                    <input class="form-control me-2" id="input_data" name="search" type="search"
                        placeholder="Search by use for" aria-label="Search" value="<?=$search ?? ''?>">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>


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

    <?=$search ? "<h1 class='mt-4'>Hasil dari: " . $search . "</h1>" : ''?>
    <?=$search ? "<p>Di temukan " . $all_data . " data.</p>" : ''?>
    <table class="table table-striped table-bordered mt-3">
        <thead class="table-dark ">
            <tr>
                <th>No.</th>
                <th>Untuk</th>
                <th>Orang</th>
                <th>Nominal</th>
                <th>status</th>
                <th>Jatuh Tempo</th>
                <th class="text-center">Action</th>
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
$num = $start_page + 1;
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
                <td class="text-center">
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
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-printer"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">PDF</a></li>
                            <li><a class="dropdown-item" href="#">Excel</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">RAW</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <?php if ($total_pages > 1): ?>
    <nav>
        <ul class="pagination">
            <?php if ($now > 1): ?>
            <li class="page-item"><a class="page-link"
                    href="/app/index.php?page=transactions&view=depts&now=<?=$now - 1?><?=$search_get . $sorted_get . $filtered_get?>">Previous</a>
                <?php endif;?>

                <?php if ($now - 1 > 1): ?>
            <li class="page-item"><a class="page-link"
                    href="/app/index.php?page=transactions&view=depts&now=<?=$now - 2?><?=$search_get . $sorted_get . $filtered_get?>"><?=$now - 2?></a>
            </li>
            <?php endif?>
            <?php if ($now - 1 > 0): ?>
            <li class="page-item"><a class="page-link"
                    href="/app/index.php?page=transactions&view=depts&now=<?=$now - 1?><?=$search_get . $sorted_get . $filtered_get?>"><?=$now - 1?></a>
            </li>
            <?php endif?>

            <li class="page-item active"><a class="page-link"
                    href="/app/index.php?page=transactions&view=debt<?=$now_get . $search_get . $sorted_get . $filtered_get?>"><?=$now?></a>
            </li>

            <?php if ($now + 1 < ($total_pages + 1)): ?>
            <li class="page-item"><a class="page-link"
                    href="/app/index.php?page=transactions&view=depts&now=<?=$now + 1?><?=$search_get . $sorted_get . $filtered_get?>"><?=$now + 1?></a>
            </li>
            <?php endif?>

            <?php if ($now < $total_pages): ?>
            <li class="page-item"><a class="page-link"
                    href="/app/index.php?page=transactions&view=depts&now=<?=$now + 1?><?=$search_get . $sorted_get . $filtered_get?>">Next</a>
            </li>
            <?php endif;?>
        </ul>
    </nav>
    <?php endif;?>
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
                            <th class="text-center">No</th>
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