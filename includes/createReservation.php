<?php
session_start();

require_once  'Inc.DBC.php';



function createReservation($conn, $fname, $lname, $checkIn, $checkOut, $adults, $kids, $pets, $phone, $Properties, $Comments)
{

    $sql = "INSERT INTO reservation (fname, lname, checkIn, checkOut, adults, kids, pets, phone, Properties, Comments) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../make-reservation.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssssssssss", $fname, $lname, $checkIn, $checkOut, $adults, $kids, $pets, $phone, $Properties, $Comments);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location:../index.php?success=true");
    exit();
}
