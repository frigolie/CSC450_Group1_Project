<?php
session_start();

if (isset($_POST["updateUser"])) {

    $user_id = $_POST["userID"];
    $fname = $_POST["fName"];
    $lname = $_POST["lName"];
    $username = $_POST["username"];
    $email = $_POST["email"];

    require_once  'Inc.DBC.php';
    require_once 'functions/user/updateUser.php';

    updateUser($conn, $user_id, $fname, $lname, $email, $username);

    header("location: ../edit-account.php?success=true");
    exit();

} else if (isset($_POST["deleteUser"])) {
    $user_id = $_POST["userID"];

    require_once  'Inc.DBC.php';
    require_once  'functions/user/deleteUser.php';

    deleteUser($conn, $user_id);

    header("location: ../logout.php?success=true");
    exit();
} else if (isset($_POST['updateAvatar'])) {

    require_once  'Inc.DBC.php';
    require_once 'functions/avatar/uploadAvatar.php';

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
      header("location: ../edit-account.php?user_id=" . $user_id);
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
