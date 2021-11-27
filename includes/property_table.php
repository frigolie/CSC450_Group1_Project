<?php
session_start();

include  "Inc.DBC.php";
if (isset($_SESSION['username']) && isset($_SESSION['admin_id'])) {

    $sql = "SELECT * FROM property INNER JOIN user ON property.user_id=user.user_id ORDER BY property_id ASC";
    $prop_query = mysqli_query($conn, $sql);
} else {
    header("Location: index.php");
}
