<?php

function getPropertyByID($property_id)
{

    include dirname( dirname( dirname(__FILE__) ) ) . '/Inc.DBC.php';

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $sql = "SELECT * FROM property WHERE property_id=$property_id";
    $prop_query = mysqli_query($conn, $sql);

    return $prop_query;
  }
