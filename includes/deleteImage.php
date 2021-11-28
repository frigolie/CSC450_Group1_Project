<?php
require_once  'Inc.DBC.php';

function deleteImage($conn, $image_id, $property_id)
{

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $sql = "DELETE FROM image WHERE image_id = ?;";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../edit-property.php?property_id=" . $property_id . "&error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $image_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../edit-property.php?property_id=" . $property_id . "&success=true");
    exit();

  }
