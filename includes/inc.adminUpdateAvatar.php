<?php
session_start();

if (isset($_POST['deleteAvatar'])) {

    require_once  'Inc.DBC.php';
    require_once 'functions/avatar/deleteAvatar.php';

    $user_id = $_POST['avatarUserID'];
    $avatar_id = $_POST['avatarID'];

    deleteAvatar($conn, $avatar_id, $user_id);

    header("location: ../admin.php?updated_avatar=" . $avatar_id . "&success=true");
    exit();

} else if (isset($_POST['upload'])) {

    require_once  'Inc.DBC.php';
    require_once 'functions/avatar/updateAvatar.php';

    $user_id = $_POST["avatarUserID"];
    $avatar_id = $_POST["avatarID"];

    if (isset($_FILES["avatar"]) && $_FILES["avatar"]["name"] != '') {
      $file = "" . time() . "_" . $_FILES["avatar"]["name"];
      $temp = $_FILES["avatar"]["tmp_name"];

      $folder = "../graphic/uploads/avatars/" . $file;

      updateAvatar($conn, $file, $temp, $folder, $avatar_id);
      header("location: ../admin.php?avatar_id=" . $avatar_id . "&success=true");
      exit();

    } else {
      header("location: ../admin.php?avatar_id=" . $avatar_id . "&success=false");
      exit();
    }

} else {
    header("location: ../my-account.php");
    exit();
}
