<?php
require_once dirname( dirname( dirname(__FILE__) ) ) . '/Inc.DBC.php';

function updateAdminAvatar($conn, $filename, $tempname, $folder, $admin_id)
{

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $sql = "UPDATE admin SET admin_avatar = ? WHERE admin_id = ?;";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../editAdmin.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "si", $filename, $admin_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    move_uploaded_file($tempname, $folder);

  }
