<?php
session_start();

include  "Inc.DBC.php";
    $sql = "SELECT * FROM avatar INNER JOIN user ON user.user_id=avatar.user_id ORDER BY user.username ASC";
    $prop_query = mysqli_query($conn, $sql);
