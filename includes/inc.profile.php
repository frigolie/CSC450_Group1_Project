<?php
session_start();

if (isset($_POST["updateUser"])) {

    $user_id = $_POST["userID"];
    $fname = $_POST["fName"];
    $lname = $_POST["lName"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmPassword"];

    require_once 'Inc.DBC.php';
    require_once 'functions/user/updateUser.php';
    require_once 'functions/user/loginFunctions.php';

    if (pwdMatch($password, $confirmpassword) !== false) {
        header("location: ../edit-account.php?user_id=" . $user_id . "&error=passwordsdontmatch");
        exit();
    }

    updateUser($conn, $user_id, $fname, $lname, $email, $username, $password);

    header("location: ../edit-account.php?user_id=" . $user_id . "success=true");
    exit();

} else if (isset($_POST["deleteUser"])) {
    $user_id = $_POST["userID"];

    require_once  'Inc.DBC.php';
    require_once  'functions/user/deleteUser.php';

    deleteUser($conn, $user_id);

    header("location: ../logout.php?success=true");
    exit();

} else if (isset($_POST['uploadAvatar'])) {

    require_once 'Inc.DBC.php';
    require_once 'functions/avatar/uploadAvatar.php';

    $user_id = $_POST["avatarUserID"];

    if (isset($_FILES["avatar"]) && $_FILES["avatar"]["name"] != '') {
      $file = "" . time() . "_" . $_FILES["avatar"]["name"];
      $temp = $_FILES["avatar"]["tmp_name"];

      $folder = "../graphic/uploads/avatars/" . $file;

      uploadAvatar($conn, $file, $temp, $folder, $user_id);
      header("location: ../edit-account.php?user_id=" . $user_id . "&success=true");
      exit();

    } else {
      header("location: ../edit-account.php?user_id=" . $user_id . "&success=false");
      exit();
    }

  }  else if (isset($_POST['updateAvatar'])) {

    require_once  'Inc.DBC.php';
    require_once 'functions/avatar/updateAvatar.php';

    $user_id = $_POST["avatarUserID"];
    $avatar_id = $_POST["avatarID"];

    if (isset($_FILES["avatar"]) && $_FILES["avatar"]["name"] != '') {
      $file = "" . time() . "_" . $_FILES["avatar"]["name"];
      $temp = $_FILES["avatar"]["tmp_name"];

      $folder = "../graphic/uploads/avatars/" . $file;

      updateAvatar($conn, $file, $temp, $folder, $avatar_id);
      header("location: ../edit-account.php?user_id=" . $user_id . "&success=true");
      exit();

    } else {
      header("location: ../edit-account.php?user_id=" . $user_id . "&success=false");
      exit();
    }

} else if (isset($_POST['deleteAvatar'])) {

    require_once  'Inc.DBC.php';
    require_once 'functions/avatar/deleteAvatar.php';

    $user_id = $_POST['avatarUserID'];
    $avatar_id = $_POST['avatarID'];

    deleteAvatar($conn, $avatar_id, $user_id);

    header("location: ../edit-account.php?user_id=" . $user_id . "&success=true");
    exit();

}
  else {
    header("location: ../edit-account.php");
    exit();
}
