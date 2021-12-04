<?php

function getPropertyImages($property)
{
    require_once dirname( dirname( dirname(__FILE__) ) ) . '/Inc.DBC.php';
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $sql = "SELECT * FROM image WHERE property_id=$property";
    $img_query = mysqli_query($conn, $sql);
    $images = [];
    if (mysqli_num_rows($img_query) > 0) {
      $i = 1;
      while ($rows = mysqli_fetch_assoc($img_query)) {
        $images[] = $rows;
      }
    }

    return $images;
  }
