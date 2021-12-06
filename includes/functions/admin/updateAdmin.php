<?php

require_once dirname( dirname( dirname(__FILE__) ) ) . '/Inc.DBC.php';

function updateAdmin($conn, $admin_id, $name, $email, $username, $password)
{

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    if($password == '') {
      $sql = "UPDATE admin SET name = ?, email = ?, username = ? WHERE admin_id = ?;";
    } else {
      $sql = "UPDATE admin SET name = ?, email = ?, username = ?, password = ? WHERE admin_id = ?;";
      $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    }

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    if($password == '') {
      mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $username, $admin_id);
    } else {
      mysqli_stmt_bind_param($stmt, "ssssi", $name, $email, $username, $hashedPwd, $user_id);
    }

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

  }
