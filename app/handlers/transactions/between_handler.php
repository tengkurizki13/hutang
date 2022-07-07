<?php 





if (isset($_POST["action"])) {
    if ($_POST["action"] === "create_person") {
        
        $fav_person = htmlspecialchars($_POST['fav_person']);
        $new_person = htmlspecialchars($_POST['new_person']);
        $wa_num = htmlspecialchars($_POST['wa_num']);
      
        if (empty($fav_person)) {
            unset($_POST['fav_person']);
        } else {
            unset($_POST['new_person']);
            header("Location: /app/index.php?page=transactions&view=".$where."&action=create&person_id=$fav_person");
            exit;
        }

        $errors = [];

        $select = mysqli_query($con,"SELECT * FROM `persons` WHERE name = '$new_person' OR wa= '$wa_num'");
        $cek = mysqli_num_rows($select);

        if($cek > 0){
            array_push($errors, "nama atau nomer sudah ada di person favoritee boss");
        }

        if(empty($errors)){

            $query = mysqli_query($con,"INSERT INTO `persons`(`name`, `user_id`, `wa`) VALUES ('$new_person','$session_user_id','$wa_num')");

            if ($query) {
                $alert = ['success', ['Data di tambahkan!']];
            } else {
                $alert = ['danger', 'Data di gagal tambahkan!'];
            }

            $id_new_person = insert_persons($con, $new_person);
          

            header("Location: /app/index.php?page=transactions&view=".$where."&action=create&person_id=$id_new_person");

        }else {
            $alert = ['danger', $errors];
        }

       

        // if(!empty($new_person)){
        //     // header("Location: /app/index.php?page=transactions&view=".$where."&action=create&new=$new_person&orang=baru");
        //     // exit;
        // }else{
            
        //     // header("Location: /app/index.php?page=transactions&view=".$where."&action=create&fav=$fav_person");
        //     // exit;
        // }

      


    }}