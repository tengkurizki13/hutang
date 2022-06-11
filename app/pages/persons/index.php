<div class="container">
    <h1 class="text-center">List Persons <?=$title?> </h1>
    <div class="dropdown my-3">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
            aria-expanded="false">
            Dropdown button
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item"
                    href="/app/index.php?page=Most_Freq_Trx&view=<?=$where?>&filter=trx_<?=$where?>">Berdasarkan
                    transaction terbanyak</a></li>
            <li><a class="dropdown-item"
                    href="/app/index.php?page=Most_Freq_Trx&view=<?=$where?>&filter=nominal_<?=$where?>">Berdasarkan
                    nominal terbanyak</a></li>
            <li><a class="dropdown-item"
                    href="/app/index.php?page=Most_Freq_Trx&view=<?=$where?>&filter=name_<?=$where?>">Berdasarkan
                    name</a></li>
        </ul>
    </div>

    <h2>berdasarkan namanya :</h2>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th scope="col">Nominal</th>
                <th scope="col">Jumlah Transaction</th>
            </tr>
        </thead>
        <tbody>

            <?php
$num = 1;
foreach ($transactions as $transaction):

?>
            <tr>
                <th scope="row"><?=$num++?></th>
                <td><?=$transaction['name']?></td>
                <td><?=$transaction['SUM(t.nominal)']?></td>
                <td><?=$transaction['COUNT(p.name)']?></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>