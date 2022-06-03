<?php

$trx_Type = ["depts", "receivables"];

foreach ($trx_Type as $type) {

    $amount = "amount" . $type;
    $$amount = mysqli_query($con, "SELECT SUM(nominal) - SUM(temp_nominal) as nominal FROM `transactions` WHERE type = '$type' AND user_id = '$session_user_id'");

    $result = "result" . $type;
    $$result = mysqli_fetch_assoc($$amount);

}
foreach ($trx_Type as $type) {

    $count = "count" . $type;
    $$count = mysqli_query($con, "SELECT * FROM `transactions` WHERE type = '$type' AND user_id = '$session_user_id'");

    $resultCount = "resultCount" . $type;
    $$resultCount = mysqli_num_rows($$count);

}