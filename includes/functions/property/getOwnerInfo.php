<?php

function getOwnerInfo($owner_id)
{

    include dirname( dirname( dirname(__FILE__) ) ) . '/Inc.DBC.php';

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $sql = "SELECT * FROM user WHERE user_id=$owner_id";
    $owner_query = mysqli_query($conn, $sql);

    return $owner_query;
  }
