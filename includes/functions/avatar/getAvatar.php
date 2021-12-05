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
    $avatar = '';

    if (mysqli_num_rows($avatar_query) == 1) {
      $i = 1;
      while ($rows = mysqli_fetch_assoc($avatar_query)) {
        $avatar = $rows['filename'];
        $i++;
      }
    }
    return $avatar;
  }
