<?php
session_start();

include  dirname( dirname(__FILE__) ) . '/Inc.DBC.php';
if (isset($_SESSION['username']) && isset($_SESSION['admin_id'])) {

    $sql = "SELECT * FROM user ORDER BY user_id ASC";
    $user_query = mysqli_query($conn, $sql);
} else {
    header("Location: index.php");
}
