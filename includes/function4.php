<?php
require_once  'Inc.DBC.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function uploadImage($conn, $filename, $tempname, $folder, $property_id, $user_id, $featured)
{

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $sql = "INSERT INTO image (filename, property_id, user_id, featured) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../add-image-dev.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "siii", $filename, $property_id, $user_id, $featured);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    move_uploaded_file($tempname, $folder);

  }
