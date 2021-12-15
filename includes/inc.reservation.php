<?php
session_start();


if (isset($_POST["createReservation"])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $html_checkIn =$_POST['checkIn'];
    $checkIn=date("Y-m-d H:i:s",strtotime($html_checkIn));
    $html_checkOut =$_POST['checkOut'];
    $checkOut=date("Y-m-d H:i:s",strtotime($html_checkOut));
    $adults = $_POST['adults'];
    $kids  = $_POST['kids'];
    $pets   = $_POST['pets'];
    $phone  = $_POST['phone'];
    $comments = $_POST['comments'];
    $guest_id  = $_POST['guest_id'];
    $property_id = $_POST['property_id'];
    $total_price = $_POST['total_price'];
    $card_type  = $_POST['card_type'];
    $card_number  = $_POST['card_number'];
    $card_code = $_POST['card_code'];

    require_once 'functions/reservation/createReservation.php';
    require_once  'Inc.DBC.php';

    createReservation($conn, $fname, $lname, $checkIn, $checkOut, $adults, $kids, $pets, $phone, $comments, $guest_id, $property_id, $total_price, $card_type, $card_number, $card_code);
    header("location: ../make-reservation.php");
    exit();
} else if (isset($_POST["updateReservation"])) {

      $id = $_POST['id'];
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $html_checkIn = $_POST['checkIn'];
      $checkIn = date("Y-m-d H:i:s",strtotime($html_checkIn));
      $html_checkOut = $_POST['checkOut'];
      $checkOut = date("Y-m-d H:i:s",strtotime($html_checkOut));
      $adults = $_POST['adults'];
      $kids  = $_POST['kids'];
      $pets   = $_POST['pets'];
      $phone  = $_POST['phone'];
      $comments = $_POST['comments'];
      $total_price = $_POST['total_price'];

    require_once 'functions/reservation/updateReservation.php';
    require_once  'Inc.DBC.php';

    updateReservation($conn, $id, $fname, $lname, $checkIn, $checkOut, $adults, $kids, $pets, $phone, $comments, $total_price);
    header("location: ../edit-reservation.php");
    exit();
} else if (isset($_POST["deleteReservation"])) {

    $id = $_POST["id"];

    require_once 'Inc.DBC.php';
    require_once 'functions/reservation/deleteReservation.php';

    deleteReservation($conn, $id);
} else {
    header("location: ../edit-reservation.php");
    exit();
}
