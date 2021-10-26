<!-- function2.php for the Reservation page - Database of Homeaway
      CSC450 - Computer Science Capstone
      Group 1:
      Elise Frigoli
      Nolan Harre
      Joshua Sibert
      Lor Xiong
      Written:     10/26/21
      Revisions:
      -->




<?php
require_once  'Inc.DBC.php';



function createReservation($conn, $fname, $lname, $email, $phone, $address1, $address2, $zipCode, $Properties)
{

    $sql = "INSERT INTO reservation (fname, lname, email, phone, address1, address2, zipCode, Properties) VALUES (?, ?, ?, ?, ?, ?, ?, ?) ;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../make-reservation.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssssssss", $fname, $lname, $email, $phone, $address1, $address2, $zipCode, $Properties);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location:../index.php?error=none");
    exit();
}
