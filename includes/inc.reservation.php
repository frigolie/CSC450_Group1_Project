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
    $guest_id  = $_POST['guest_id'];
    $property_id = $_POST['property_id'];
    $total_price = $_POST['total_price'];
    $card_type  = $_POST['card_type'];
    $card_number  = $_POST['card_number'];
    $card_code = $_POST['card_code'];
    
    require_once 'functions/reservation/createReservation.php';
    require_once  'Inc.DBC.php';



    createReservation($conn, $fname, $lname, $checkIn, $checkOut, $adults, $kids, $pets, $phone, $Properties, $Comments, $guest_id, $property_id, $total_price, $card_type, $card_number, $card_code);
    header("location: ../make-reservation.php");
    exit();
} else if (isset($_POST["update"])) {

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



    require_once 'functions/reservation/updateReservation.php';
    require_once  'Inc.DBC.php';



    updateReservation($conn, $fname, $lname, $checkIn, $checkOut, $adults, $kids, $pets, $phone, $Properties, $Comments);
    header("location: ../edit-reservation.php");
    exit();
} else if (isset($_POST["delete"])) {

    $id = $_POST["id"];

    require_once 'Inc.DBC.php';
    require_once 'functions/reservation/deleteReservation.php';

    deleteReservation($conn, $id);
} else {
    header("location: ../edit-reservation.php");
    exit();
}
