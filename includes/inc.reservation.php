<?php
session_start();


if (isset($_POST["submit"])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];
    $adults = $_POST['adults'];
    $kids  = $_POST['kids'];
    $pets   = $_POST['pets'];
    $phone  = $_POST['phone'];
    $Properties = $_POST['Properties'];
    $Comments  = $_POST['Comments'];



    require_once 'createReservation.php';
    require_once  'Inc.DBC.php';



    createReservation($conn, $fname, $lname, $checkIn, $checkOut, $adults, $kids, $pets, $phone, $Properties, $Comments);
} else {
    header("location: ../make-reservation.php");
    exit();
}
