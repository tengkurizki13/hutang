<div class="container">
    <h1 class="mb-5">CHOOSE PERSON</h1>

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

 <div class="accordion" id="accordionExample">
        <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Choose Person Favorite 
                    </button>
                    </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
                    <select class="form-select mb-3" name="fav_person" id="fav_person">
                        <option value="">pilih orang favorit</option>
                        <?php foreach ($persons as $person): ?>
                        <option value="<?=$person['id']?>"><?=$person['name']?></option>
                        <?php endforeach;?>
                    </select>
                 <input type="hidden" name="action" value="create_person">
                    <button type="submit" class="btn btn-primary">Lanjut
                    <?=$title?></button>
      </div>
    </div>
  </div>
  <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Choose New Person
        </button>
        </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
    <div class="accordion-body">
      <label for="orang-baru" class="form-label">Orang-baru</label>
                    <input type="text" class="form-control" name="new_person" id="orang-baru">
                    <label for="wa_num" class="form-label">wa_num</label>
                    <input type="text" class="form-control mb-3" name="wa_num"  id="wa_num"
                        aria-describedby="emailHelp">
                 <input type="hidden" name="action" value="create_person">
                        <button type="submit" class="btn btn-primary">Lanjut
                    <?=$title?></button>
    </div>

                        </form>
</div>
</div>