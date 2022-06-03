<div class="container">
    <h1>Dashboard</h1>


    <div class="row mt-5 ">
        <div class="col-3" style="height:170px;">
            <div class="card   text-dark  bg-secondary bg-gradient mb-3" style="max-width: 18rem;">
                <h5 class="card-header text-center">Jumlah Hutang</h5>
                <div class="card-body">
                    <h5 class="card-title">Gambar</h5>

                    <h5><?=rupiah($resultdepts['nominal'])?></h5>

                    <a href="#" class="btn btn-dark">Detail</a>
                </div>
            </div>
        </div>
        <div class="col-3" style="height:170px;">
            <div class="card  text-dark  bg-secondary bg-gradient mb-3" style="max-width: 18rem;">
                <h5 class="card-header text-center">Jumlah Piutang</h5>
                <div class="card-body">
                    <h5 class="card-title">Gambar</h5>

                    <h5><?=rupiah($resultreceivables['nominal'])?></h5>

                    <a href="#" class="btn btn-dark">Detail</a>
                </div>
            </div>
        </div>
        <div class="col-3" style="height:170px;">
            <div class="card  text-dark  bg-secondary mb-3 bg-gradient" style="max-width: 18rem;">
                <h5 class="card-header text-center">Jumlah TRX Hutang</h5>
                <div class="card-body">
                    <h5 class="card-title">Gambar</h5>
                    <h5><?=$resultCountdepts?></h5>
                    <a href="#" class="btn btn-dark">Detail</a>
                </div>
            </div>
        </div>
        <div class="col-3" style="height:170px;">
            <div class="card  text-dark  bg-secondary mb-3 bg-gradient" style="max-width: 18rem;">
                <h5 class="card-header text-center">Jumlah TRX piutang</h5>
                <div class="card-body">
                    <h5 class="card-title">Gambar</h5>
                    <h5><?=$resultCountreceivables?></h5>
                    <a href="#" class="btn btn-dark">Detail</a>
                </div>
            </div>
        </div>
        <div class="col-3 mt-5" style="height:170px;">
            <div class="card   text-dark  bg-secondary bg-gradient mb-3" style="max-width: 18rem;">
                <h5 class="card-header text-center">Jumlah Hutang</h5>
                <div class="card-body">
                    <h5 class="card-title">Gambar</h5>
                    <ol>
                        <li>fulan bin bejo</li>
                    </ol>
                    <a href="#" class="btn btn-dark">Detail</a>
                </div>
            </div>
        </div>
        <div class="col-3 mt-5" style="height:170px;">
            <div class="card   text-dark  bg-secondary bg-gradient mb-3" style="max-width: 18rem;">
                <h5 class="card-header text-center">Jumlah Hutang</h5>
                <div class="card-body">
                    <h5 class="card-title">Gambar</h5>
                    <ol>
                        <li>fulan bin bejo</li>
                    </ol>
                    <a href="#" class="btn btn-dark">Detail</a>
                </div>
            </div>
        </div>
    </div>
</div>