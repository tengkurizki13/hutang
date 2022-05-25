<div class="container">
    <h1 class="text-center pt-3 pb-3">EDIT PROFILE</h1>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
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
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="fullname" class="form-label"> New Fullname</label>
                    <input type="text" class="form-control" value="<?=$user['name']?>" name="fullname" id="fullname"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label"> New Username</label>
                    <input type="text" class="form-control" value="<?=$user['username']?>" name="username"
                        id="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label"> New Password</label>
                    <input type="password" class="form-control" value="<?=$user['password']?>" name="password"
                        id="password">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label"> New Email</label>
                    <input type="email" class="form-control" value="<?=$user['email']?>" name="email" id="email">
                </div>
                <div class="mb-3">
                    <label for="wa_num" class="form-label"> New WhatApp</label>
                    <input type="text" class="form-control" value="<?=$user['wa_num']?>" name="wa_num" id="wa_num">
                </div>
                <div class="mb-3">
                    <label for="avatar" class="form-label"> New Evatar</label>
                    <input type="file" class="form-control" value="<?=$user['avatar']?>" name="avatar" id="avatar">
                </div>
                <input type="hidden" name="action" value="edit_profile">
                <button type="submit" class="btn btn-primary">Edit & Save</button>

            </form>
        </div>
        <div class="col-4"></div>
    </div>
</div>