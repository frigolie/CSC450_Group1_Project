<?php
session_start();

require_once dirname( dirname( dirname(__FILE__) ) ) . '/Inc.DBC.php';

function createReservation($conn, $fname, $lname, $checkIn, $checkOut, $adults, $kids, $pets, $phone, $comments, $guest_id, $property_id, $total_price, $card_type, $card_number, $card_code)

{
    $sql = "INSERT INTO reservation (fname, lname, checkIn, checkOut, adults, kids, pets, phone, comments, guest_id, property_id, total_price, card_type, card_number, card_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../make-reservation.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssssiisssiidsss", $fname, $lname, $checkIn, $checkOut, $adults, $kids, $pets, $phone, $comments, $guest_id, $property_id, $total_price, $card_type, $card_number, $card_code);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
     $_SESSION['status'] = "Reservation successfully booked!";
    header("location:../upcoming-reservations.php?success=true");
    exit();
}
