<?php

function getAvatar($user_id)
{

    include dirname( dirname( dirname(__FILE__) ) ) . '/Inc.DBC.php';

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $sql = "SELECT * FROM avatar WHERE user_id=$user_id";
    $avatar_query = mysqli_query($conn, $sql);

    return $avatar_query;
  }
