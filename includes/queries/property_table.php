<?php
session_start();

include  dirname( dirname(__FILE__) ) . '/Inc.DBC.php';
    $sql = "SELECT * FROM property INNER JOIN user ON property.owner_id=user.user_id ORDER BY property_id ASC";
    $prop_query = mysqli_query($conn, $sql);
