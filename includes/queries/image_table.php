<?php
session_start();

include  dirname( dirname(__FILE__) ) . '/Inc.DBC.php';
    $sql = "SELECT * FROM property INNER JOIN image ON property.property_id=image.property_id ORDER BY property.name ASC";
    $image_query = mysqli_query($conn, $sql);
