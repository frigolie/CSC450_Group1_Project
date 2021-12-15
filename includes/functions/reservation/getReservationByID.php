<?php

function getReservationByID($reservation_id)
{
  include dirname( dirname( dirname(__FILE__) ) ) . '/Inc.DBC.php';

  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }

  $sql = "SELECT *, property.kids AS kids_allowed, property.pets AS pets_allowed, reservation.kids AS kids_reserved, reservation.pets AS pets_reserved FROM property INNER JOIN reservation ON property.property_id=reservation.property_id WHERE reservation.id=$reservation_id;";
  $res_query = mysqli_query($conn, $sql);

  return $res_query;
}
