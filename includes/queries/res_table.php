<?php
session_start();

include  dirname( dirname(__FILE__) ) . '/Inc.DBC.php';
if (isset($_SESSION['username']) && isset($_SESSION['admin_id'])) {

    $sql = "SELECT * FROM property INNER JOIN reservation ON property.property_id=reservation.property_id ORDER BY reservation.id ASC";
    $res_query = mysqli_query($conn, $sql);
} else {
    header("Location: index.php");
}
