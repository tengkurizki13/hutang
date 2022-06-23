<?php


if (isset($_POST['action'])) {
    if ($_POST['action'] === 'create_trx_edit') {
        $use_for = htmlspecialchars($_POST['use_for']);
        $fav_person = $_POST['fav_person'];
        $new_person = htmlspecialchars($_POST['new_person']);
        $nominal = htmlspecialchars($_POST['nominal']);
        $transaction_at = fmt_to_timestamp($_POST['transaction_at']);
        $due_date = fmt_to_timestamp($_POST['due_date']);
        $id = $_POST['trx_id'];
        $type = htmlspecialchars($_POST['type']);

     
        if ($new_person) {
            unset($_POST['fav_person']);
        } else {
            unset($_POST['new_person']);
        }

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
        
        if (empty($errors)) {
            if (!empty($new_person)) {
                $fav_person = insert_persons($con, $new_person);
            }
            
                    $update = mysqli_query($con, "UPDATE `transactions` SET `use_for`='$use_for',`person_id`='$fav_person',`nominal`='$nominal',`transaction_at`='$transaction_at',`due_date`='$due_date' WHERE id = '$id'");


                    if ($update) {
                        $alert = ['success', ['Data di tambahkan!']];
                    } else {
                        $alert = ['danger', 'Data di gagal tambahkan!'];
                    }
        }else {
            $alert = ['danger', $errors];
        }



       

   
    }
}
  
