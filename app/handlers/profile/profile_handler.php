<?php

$page = "profile";

$user = $_SESSION['user'];

$query = mysqli_query($con, "SELECT * FROM users WHERE id='$session_user_id' ");
$users = mysqli_fetch_assoc($query);