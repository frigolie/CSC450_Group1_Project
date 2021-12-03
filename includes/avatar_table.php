<?php
session_start();

include  "Inc.DBC.php";
    $sql = "SELECT avatar.user_id AS avatar_user_id, avatar_id, filename, user.username FROM avatar INNER JOIN user ON user.user_id=avatar.user_id ORDER BY user.username ASC";
    $avatar_query = mysqli_query($conn, $sql);
