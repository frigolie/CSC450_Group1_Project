<?php

function getPastStays($user_id)
{
  include dirname( dirname( dirname(__FILE__) ) ) . '/Inc.DBC.php';

  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }

  $sql = "SELECT * FROM property INNER JOIN reservation ON property.property_id=reservation.property_id WHERE property.owner_id=$user_id AND reservation.checkIn < NOW();";
  $past_stays = mysqli_query($conn, $sql);

  return $past_stays;
}
