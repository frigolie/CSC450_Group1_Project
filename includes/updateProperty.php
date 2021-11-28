<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once  'Inc.DBC.php';

function updateProperty($conn, $property_id, $name, $description, $address, $city, $state, $zip, $bedrooms, $bathrooms, $kids, $pets, $price)
{

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $sql = "UPDATE property SET name = ?, description = ?, address = ?, city = ?, state = ?, zip = ?, bedrooms = ?, bathrooms = ?, kids = ?, pets = ?, price = ? WHERE property_id = ?;";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../edit-property.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssssssiidi", $name, $description, $address, $city, $state, $zip, $bedrooms, $bathrooms, $kids, $pets, $price, $property_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../my-properties.php?success=true");
    exit();

  }
