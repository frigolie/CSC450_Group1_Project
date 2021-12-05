<?php
require_once dirname( dirname( dirname(__FILE__) ) ) . '/Inc.DBC.php';

function deleteAvatar($conn, $avatar_id, $user_id)
{

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $sql = "DELETE FROM avatar WHERE avatar_id = ?;";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../edit-account.php?user_id=" . $user_id . "&error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $avatar_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

  }
