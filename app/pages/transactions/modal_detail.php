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