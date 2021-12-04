<?php

require_once  'Inc.DBC.php';

function updateUser($conn, $user_id, $fname, $lname, $email, $username, $password)
{

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    if($password == '') {
      $sql = "UPDATE user SET fname = ?, lname = ?, email = ?, username = ? WHERE user_id = ?;";
    } else {
      $sql = "UPDATE user SET fname = ?, lname = ?, email = ?, username = ?, password = ? WHERE user_id = ?;";
      $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    }

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    if($password == '') {
      mysqli_stmt_bind_param($stmt, "ssssi", $fname, $lname, $email, $username, $user_id);
    } else {
      mysqli_stmt_bind_param($stmt, "sssssi", $fname, $lname, $email, $username, $hashedPwd, $user_id);
    }

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

  }
