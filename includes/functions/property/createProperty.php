<?php
require_once dirname( dirname( dirname(__FILE__) ) ) . '/Inc.DBC.php';

function createProperty($conn, $name, $description, $address, $city, $state, $zip, $bedrooms, $bathrooms, $kids, $pets, $price, $owner_id)
{

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $sql = "INSERT INTO property (name, description, address, city, state, zip, bedrooms, bathrooms, kids, pets, price, owner_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../add-property.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssssssiidi", $name, $description, $address, $city, $state, $zip, $bedrooms, $bathrooms, $kids, $pets, $price, $owner_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

  }
