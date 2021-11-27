<?php
session_start();

  if (isset($_POST['upload'])) {

    require_once  'Inc.DBC.php';
    require_once 'function4.php';

    $property_id = $_POST['propertyID'];
    $user_id = $_POST['userID'];

    $file1 = $_FILES["img1"]["name"];
    $temp1 = $_FILES["img1"]["tmp_name"];
    $folder1 = "../graphic/uploads/".$file1;
    $feat1 = 1;
    if ($file1 != '') {
      uploadImage($conn, $file1, $temp1, $folder1, $property_id, $user_id, $feat1);
    }

    $file2 = $_FILES["img2"]["name"];
    $temp2 = $_FILES["img2"]["tmp_name"];
    $folder2 = "../graphic/uploads/".$file2;
    $feat2 = 0;
    if ($file2 != '') {
      uploadImage($conn, $file2, $temp2, $folder2, $property_id, $user_id, $feat2);
    }

    $file3 = $_FILES["img3"]["name"];
    $temp3 = $_FILES["img3"]["tmp_name"];
    $folder3 = "../graphic/uploads/".$file3;
    $feat3 = 0;
    if ($file3 != '') {
      uploadImage($conn, $file3, $temp3, $folder3, $property_id, $user_id, $feat3);
    }

    $file4 = $_FILES["img4"]["name"];
    $temp4 = $_FILES["img4"]["tmp_name"];
    $folder4 = "../graphic/uploads/".$file4;
    $feat4 = 0;
    if ($file4 != '') {
      uploadImage($conn, $file4, $temp4, $folder4, $property_id, $user_id, $feat4);
    }

    $file5 = $_FILES["img5"]["name"];
    $temp5 = $_FILES["img5"]["tmp_name"];
    $folder5 = "../graphic/uploads/".$file5;
    $feat5 = 0;
    if ($file5 != '') {
      uploadImage($conn, $file5, $temp5, $folder5, $property_id, $user_id, $feat5);
    }

    header("location: ../add-image-dev.php?success=true");
    exit();

} else {
    header("location: ../add-image-dev.php");
    exit();
}
