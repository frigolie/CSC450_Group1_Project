<?php
session_start();

require_once dirname( dirname( dirname(__FILE__) ) ) . '/Inc.DBC.php';

function updateReservation($conn, $id, $fname, $lname, $checkIn, $checkOut, $adults, $kids, $pets, $phone, $comments, $total_price)
{

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $sql = "UPDATE reservation SET fname = ?, lname = ?, checkIn = ?, checkOut = ?, adults = ?, kids = ?, pets= ?, phone = ?, comments = ?, total_price = ? WHERE id = ?";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../edit-reservation.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssiisssdi", $fname, $lname, $checkIn, $checkOut, $adults, $kids, $pets, $phone, $comments, $total_price, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    $_SESSION['status'] = "Reservation successfully updated!";
    header("location:../edit-reservation.php?success=true");
    exit();
}
