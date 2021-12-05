<?php

function countProperties($user_id)
{

    include dirname( dirname( dirname(__FILE__) ) ) . '/Inc.DBC.php';

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $sql = "SELECT * FROM property WHERE owner_id=$user_id";
    $prop_query = mysqli_query($conn, $sql);
    $numProps = 0;
    if (mysqli_num_rows($prop_query) > 0) {
      while ($rows = mysqli_fetch_assoc($prop_query)) {
        $numProps++;
      }
    }

    return $numProps;
  }
