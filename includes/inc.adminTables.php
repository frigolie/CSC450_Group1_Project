<?php
session_start();
include  "Inc.DBC.php";

if (isset($_POST["createUser"])) { // Creating a user

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    require_once  'Inc.DBC.php';
    require_once 'functions/user/loginFunctions.php';

    if (emptyInputSignup($fname, $lname, $email, $username, $password, $confirmpassword) !== false) {
        header("location: ../register.php?error=emptyinput");
        exit();
    }
    if (invalidfname($fname) !== false) {
        header("location: ../register.php?error=invalidFirstname");
        exit();
    }
    if (invalidlname($lname) !== false) {
        header("location: ../register.php?error=invalidLastname");
        exit();
    }
    if (invalidUser($username) !== false) {
        header("location: ../register.php?error=invalidUsername");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../register.php?error=invalidEmail");
        exit();
    }
    if (pwdMatch($password, $confirmpassword) !== false) {
        header("location: ../register.php?error=passwordsdontmatch");
        exit();
    }
    if (uidExists($conn, $username, $email) !== false) {
        header("location: ../register.php?error=usernametaken");
        exit();
    }

    createUser($conn, $fname, $lname, $email, $username, $password, $confirmpassword);

    header("location: ../admin.php?newUser=" . $username . "&success=true");
    exit();

} else if (isset($_POST["updateUser"])) { // Updating a user

  require_once  'Inc.DBC.php';
  require_once 'functions/user/loginFunctions.php';
  require_once 'functions/user/updateUser.php';

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

    header("location: ../admin.php?user_id=" . $user_id . "&success=true");
    exit();

} else if (isset($_POST["deleteUser"])) { // Deleting a user
    $user_id = $_POST["userID"];

    require_once  'Inc.DBC.php';
    require_once  'functions/user/deleteUser.php';

    deleteUser($conn, $user_id);

    header("location: ../admin.php?user_id=" . $user_id . "&success=true");
    exit();

} else if (isset($_POST["createProperty"])) { // Creating a property

    $name        = $_POST["propName"];
    $description = $_POST["propDescription"];
    $address     = $_POST["address1"];
    $city        = $_POST["city"];
    $state       = $_POST["state"];
    $zip         = $_POST["zipCode"];
    $bedrooms    = $_POST["bedrooms"];
    $bathrooms   = $_POST["bathrooms"];
    $kids        = $_POST["kidFriendly"];
    $pets        = $_POST["petFriendly"];
    $price       = $_POST["price"];
    $owner_id    = 1;

    require_once  'Inc.DBC.php';
    require_once 'functions/property/createProperty.php';

    createProperty($conn, $name, $description, $address, $city, $state, $zip, $bedrooms, $bathrooms, $kids, $pets, $price, $owner_id);

    header("location: ../admin.php?newProperty=" . $name . "success=true");
    exit();

} else if (isset($_POST["updateProperty"])) { // Updating a property

    $name        = $_POST["propName"];
    $description = $_POST["propDescription"];
    $address     = $_POST["address1"];
    $city        = $_POST["city"];
    $state       = $_POST["state"];
    $zip         = $_POST["zipCode"];
    $bedrooms    = $_POST["bedrooms"];
    $bathrooms   = $_POST["bathrooms"];
    $kids        = $_POST["kidFriendly"];
    $pets        = $_POST["petFriendly"];
    $price       = $_POST["price"];
    $property_id = $_POST["propertyID"];

    require_once 'Inc.DBC.php';
    require_once 'functions/property/updateProperty.php';

    updateProperty($conn, $property_id, $name, $description, $address, $city, $state, $zip, $bedrooms, $bathrooms, $kids, $pets, $price);

    header("location: ../admin.php?property_id=" . $property_id . "&success=true");
    exit();

} else if (isset($_POST["deleteProperty"])) { // Deleting a property

    $property_id = $_POST["propertyID"];

    require_once 'Inc.DBC.php';
    require_once 'functions/property/deleteProperty.php';

    deleteProperty($conn, $property_id);

    header("location: ../admin.php?property_id=" . $property_id . "&success=true");
    exit();

} else if (isset($_POST['uploadAvatar'])) { // Creating an avatar

    require_once 'Inc.DBC.php';
    require_once 'functions/avatar/uploadAvatar.php';

    $user_id = $_POST["avatarUserID"];

    if (isset($_FILES["avatar"]) && $_FILES["avatar"]["name"] != '') {
      $file = "" . time() . "_" . $_FILES["avatar"]["name"];
      $temp = $_FILES["avatar"]["tmp_name"];

      $folder = "../graphic/uploads/avatars/" . $file;

      uploadAvatar($conn, $file, $temp, $folder, $user_id);
      header("location: ../admin.php?avatar_id=" . $user_id . "&success=true");
      exit();

    } else {
      header("location: ../admin.php?user_id=" . $user_id . "&success=false");
      exit();
    }

} else if (isset($_POST['updateAvatar'])) { // Updating an avatar

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
} else if (isset($_POST['deleteAvatar'])) { // Deleting an avatar

    require_once  'Inc.DBC.php';
    require_once 'functions/avatar/deleteAvatar.php';

    $user_id = $_POST['avatarUserID'];
    $avatar_id = $_POST['avatarID'];

    deleteAvatar($conn, $avatar_id, $user_id);

    header("location: ../admin.php?updated_avatar=" . $avatar_id . "&success=true");
    exit();

} else if (isset($_POST['uploadImg'])) { // Creating an image

  require_once  'Inc.DBC.php';
  require_once 'functions/image/uploadImage.php';

  $property_id = $_POST['imagePropertyID'];
  $user_id = 1;

  $file = "" . time() . "_" . $_FILES["img"]["name"];
  $temp = $_FILES["img"]["tmp_name"];
  $folder = "../graphic/uploads/property_images/" . $file;
  $feat = 0;

  uploadImage($conn, $file, $temp, $folder, $property_id, $user_id, $feat);

  header("location: ../admin.php?updatedProperty=" . $property_id . "&success=true");
  exit();

  } else if (isset($_POST['updateImg'])) { // Updating an image

    require_once  'Inc.DBC.php';
    require_once 'functions/image/updateImage.php';

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

  } else if (isset($_POST['deleteImg'])) { // Deleting an image

      require_once  'Inc.DBC.php';
      require_once 'functions/image/deleteImage.php';

      $property_id = '';
      $image_id = $_POST["imageID"];

      deleteImage($conn, $image_id, $property_id);

      header("location: ../admin.php?deleted_image=" . $image_id . "&success=true");
      exit();

  }

 else { // If no form was submitted
    header("location: ../admin.php");
    exit();
}
