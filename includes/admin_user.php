<?php
session_start();

include  "Inc.DBC.php";
if (isset($_SESSION['username']) && isset($_SESSION['admin_id'])) {

    $sql = "SELECT * FROM admin ORDER BY admin_id ASC";
    $res = mysqli_query($conn, $sql);
} else {
    header("Location: index.php");
}
