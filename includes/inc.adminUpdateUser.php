<?php
session_start();

if (isset($_POST["submit"])) {

  require_once  'Inc.DBC.php';
  require_once 'loginFunctions.php';
  require_once 'updateUser.php';

    $user_id = $_POST["userID"];
    $fname = $_POST["fName"];
    $lname = $_POST["lName"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = '';
    if (isset($_POST["password"]) && isset($_POST["confirmpassword"])) {
      $password = $_POST["password"];
      $confirmpassword = $_POST["confirmpassword"];
      if (pwdMatch($password, $confirmpassword) !== false) {
          header("location: ../admin.php?error=passwordsdontmatch");
          exit();
      }
    }

    updateUser($conn, $user_id, $fname, $lname, $email, $username, $password);

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
