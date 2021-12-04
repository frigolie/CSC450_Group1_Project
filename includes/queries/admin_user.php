<?php
session_start();

include  dirname( dirname(__FILE__) ) . '/Inc.DBC.php';
if (isset($_SESSION['username']) && isset($_SESSION['admin_id'])) {

    $sql = "SELECT * FROM admin ORDER BY admin_id ASC";
    $admin_query = mysqli_query($conn, $sql);
} else {
    header("Location: index.php");
}
