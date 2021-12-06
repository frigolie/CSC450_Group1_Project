<?php

function getAdminAvatar($admin_id)
{

    include dirname( dirname( dirname(__FILE__) ) ) . '/Inc.DBC.php';

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $sql = "SELECT admin_avatar FROM admin WHERE admin_id = $admin_id";
    $avatar_query = mysqli_query($conn, $sql);
    $avatar = '';

    if (mysqli_num_rows($avatar_query) == 1) {
      while ($rows = mysqli_fetch_assoc($avatar_query)) {
        $avatar = $rows['admin_avatar'];
      }
    }

    return $avatar;
  }
