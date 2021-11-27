<?php
session_start();

if (isset($_POST["submit"])) {

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
    require_once 'updateProperty.php';

    updateProperty($conn, $property_id, $name, $description, $address, $city, $state, $zip, $bedrooms, $bathrooms, $kids, $pets, $price);

} else if (isset($_POST["delete"])) {

    $property_id = $_POST["propertyID"];

    require_once 'Inc.DBC.php';
    require_once 'deleteProperty.php';

    deleteProperty($conn, $property_id);

} else {
    header("location: ../edit-property.php");
    exit();
}
