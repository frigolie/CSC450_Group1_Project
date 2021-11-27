<?php
require_once  'Inc.DBC.php';

function deleteProperty($conn, $property_id)
{

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $sql = "DELETE FROM property WHERE property_id = ?;";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../edit-property.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $property_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../my-properties.php?success=true");
    exit();

  }
