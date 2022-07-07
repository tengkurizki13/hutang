<?php



if (isset($_POST["action"])) {
    if ($_POST["action"] === "create_trx") {
        $use_for = htmlspecialchars($_POST['use_for']);
        $nominal = htmlspecialchars($_POST['nominal']);
        $person_id = $_GET['person_id'];
        $transaction_at = htmlspecialchars($_POST['transaction_at']);
        $transaction_at = fmt_to_timestamp($transaction_at);
        $due_date = htmlspecialchars($_POST['due_date']);
        $due_date = fmt_to_timestamp($due_date);
        $type = htmlspecialchars($_POST['type']);
        $nol = ":00";
        $transaction_at .= $nol;
        $due_date .= $nol;
 
        
        $errors = [];
        
        foreach ($_POST as $key => $val) {
            if (empty($val)) {
                $new_key = ucfirst($key);

                array_push($errors, str_replace("_", " ", $new_key) . " kosong!");
            }
        }

        if (!empty($nominal) && strlen($nominal) > 11) {
            array_push($errors, "Nominal tidak boleh lebih dari 11");
        }

        if (!empty($wa_num) && strlen($wa_num) < 12) {
            array_push($errors, "wa harus lebih dari 12 angka");
        }

        if (empty($errors)) {
           
                    $insert = mysqli_query($con, "INSERT INTO `transactions`(`type`,`user_id`, `use_for`, `person_id`, `nominal`,`transaction_at`, `due_date`) VALUES ('$type','$session_user_id','$use_for','$person_id','$nominal','$transaction_at','$due_date')");
            if ($insert) {
                $alert = ['success', ['Data di tambahkan!']];
            } else {
                $alert = ['danger', 'Data di gagal tambahkan!'];
            }
        } else {
            $alert = ['danger', $errors];
        }
    }
}

