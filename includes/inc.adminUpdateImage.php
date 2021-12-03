<?php
session_start();

if (isset($_POST['uploadImg'])) {

  require_once  'Inc.DBC.php';
  require_once 'uploadImage.php';

  $property_id = $_POST['imagePropertyID'];
  $user_id = 1;

  $file = "" . time() . "_" . $_FILES["img"]["name"];
  $temp = $_FILES["img"]["tmp_name"];
  $folder = "../graphic/uploads/property_images/" . $file;
  $feat = 0;

  uploadImage($conn, $file, $temp, $folder, $property_id, $user_id, $feat);

  header("location: ../admin.php?updatedProperty=" . $property_id . "&success=true");
  exit();

}
else if (isset($_POST['deleteImg'])) {

    require_once  'Inc.DBC.php';
    require_once 'deleteImage.php';

    $property_id = '';
    $image_id = $_POST["imageID"];

    deleteImage($conn, $image_id, $property_id);

    header("location: ../admin.php?deleted_image=" . $image_id . "&success=true");
    exit();

} else if (isset($_POST['updateImg'])) {

    require_once  'Inc.DBC.php';
    require_once 'updateImage.php';

    $image_id = $_POST["imageID"];

    if (isset($_FILES["img"]) && $_FILES["img"]["name"] != '') {
      $file = "" . time() . "_" . $_FILES["img"]["name"];
      $temp = $_FILES["img"]["tmp_name"];

      $folder = "../graphic/uploads/property_images/" . $file;

      updateImage($conn, $file, $temp, $folder, $image_id);
      header("location: ../admin.php?image_id=" . $image_id . "&success=true");
      exit();

    } else {
      header("location: ../admin.php?image_id=" . $image_id . "&success=false");
      exit();
    }

} else {
    header("location: ../my-account.php");
    exit();
}
