<?php
session_start();

if (isset($_POST["createProperty"])) {

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
    $owner_id    = $_POST["userID"];

    require_once  'Inc.DBC.php';
    require_once 'functions/property/createProperty.php';

    createProperty($conn, $name, $description, $address, $city, $state, $zip, $bedrooms, $bathrooms, $kids, $pets, $price, $owner_id);

    header("location: ../my-properties.php?success=true");
    exit();

} else if (isset($_POST["updateProperty"])) {

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

    header("location: ../edit-property.php?property_id=" . $property_id . "&success=true");
    exit();

} else if (isset($_POST["deleteProperty"])) {

    $property_id = $_POST["propertyID"];

    require_once 'Inc.DBC.php';
    require_once 'functions/property/deleteProperty.php';

    deleteProperty($conn, $property_id);

    header("location: ../my-properties.php?success=true");
    exit();

} else if (isset($_POST['uploadImg'])) {

    require_once  'Inc.DBC.php';
    require_once 'functions/image/uploadImage.php';

    $property_id = $_POST['imagePropertyID'];
    $user_id = $_POST['imageUserID'];

    $file = "" . time() . "_" . $_FILES["img"]["name"];
    $temp = $_FILES["img"]["tmp_name"];
    $folder = "../graphic/uploads/property_images/" . $file;
    $feat = 0;

    uploadImage($conn, $file, $temp, $folder, $property_id, $user_id, $feat);

    header("location: ../edit-property.php?property_id=" . $property_id . "&success=true");
    exit();

} else if (isset($_POST['deleteImg'])) {

    require_once  'Inc.DBC.php';
    require_once 'functions/image/deleteImage.php';

    $image_id = $_POST['deleteImgID'];
    $property_id = $_POST['deletePropertyID'];

    deleteImage($conn, $image_id, $property_id);

    header("location: ../edit-property.php?property_id=" . $property_id . "&success=true");
    exit();

} else {
    header("location: ../add-property.php");
    exit();
}
