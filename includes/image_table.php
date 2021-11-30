<?php
session_start();

include  "Inc.DBC.php";
    $sql = "SELECT * FROM property INNER JOIN image ON property.property_id=image.property_id ORDER BY property.name ASC";
    $prop_query = mysqli_query($conn, $sql);
