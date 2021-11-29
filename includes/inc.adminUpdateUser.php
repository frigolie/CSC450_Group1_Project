<?php
session_start();

if (isset($_POST["submit"])) {

    $user_id = $_POST["userID"];
    $fname = $_POST["fName"];
    $lname = $_POST["lName"];
    $username = $_POST["username"];
    $email = $_POST["email"];

    require_once  'Inc.DBC.php';
    require_once 'updateUser.php';

    updateUser($conn, $user_id, $fname, $lname, $email, $username);

    header("location: ../admin.php?success=true");
    exit();

} else if (isset($_POST["delete"])) {
    $user_id = $_POST["userID"];

    require_once  'Inc.DBC.php';
    require_once  'deleteUser.php';

    deleteUser($conn, $user_id);

    header("location: ../admin.php?success=true");
    exit();
}

  else {
    header("location: ../admin.php");
    exit();
}
