<?php
session_start();

include  dirname( dirname(__FILE__) ) . '/Inc.DBC.php';
    $sql = "SELECT user.user_id AS id_number, user.username FROM user LEFT JOIN avatar ON user.user_id = avatar.user_id WHERE avatar.user_id IS NULL ORDER BY user.username ASC";
    $avatar_user_query = mysqli_query($conn, $sql);
