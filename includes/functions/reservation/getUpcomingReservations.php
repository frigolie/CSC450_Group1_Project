<?php

function getUpcoming($user_id)
{
  include dirname( dirname( dirname(__FILE__) ) ) . '/Inc.DBC.php';

  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }

  $sql = "SELECT * FROM reservation WHERE guest_id=$user_id AND checkIn > NOW();";
  $future_res = mysqli_query($conn, $sql);

  return $future_res;
}
