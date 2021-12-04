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
    $owner_id     = $_POST["userID"];

    require_once  'Inc.DBC.php';
    require_once 'functions/property/createProperty.php';

    createProperty($conn, $name, $description, $address, $city, $state, $zip, $bedrooms, $bathrooms, $kids, $pets, $price, $owner_id);

    header("location: ../my-properties.php?success=true");
    exit();
} else {
    header("location: ../add-property.php");
    exit();
}
