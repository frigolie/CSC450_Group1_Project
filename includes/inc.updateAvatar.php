<?php
session_start();

if (isset($_POST['deleteAvatar'])) {

    require_once  'Inc.DBC.php';
    require_once 'deleteAvatar.php';

    $user_id = $_POST['avatarUserID'];
    $avatar_id = $_POST['avatarID'];

    deleteAvatar($conn, $avatar_id, $user_id);

    header("location: ../edit-account.php?user_id=" . $user_id . "&success=true");
    exit();

} else if (isset($_POST['upload'])) {

    require_once  'Inc.DBC.php';
    require_once 'uploadAvatar.php';

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

} else {
    header("location: ../my-account.php");
    exit();
}
