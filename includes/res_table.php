<?php
session_start();

include  "Inc.DBC.php";
if (isset($_SESSION['username']) && isset($_SESSION['admin_id'])) {

    $sql = "SELECT * FROM reservation ORDER BY id ASC";
    $res_query = mysqli_query($conn, $sql);
} else {
    header("Location: index.php");
}
