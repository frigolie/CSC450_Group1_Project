<!-- inc.resrvation.php- Database of Homeaway
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

if (isset($_POST["submit"])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $zipCode = $_POST['zipCode'];
    $Properties = $_POST['Properties'];



    require_once 'function2.php';
    require_once  'Inc.DBC.php';



    createReservation($conn, $fname, $lname, $email, $phone, $address1, $address2, $zipCode, $Properties);
} else {
    header("location: ../make-reservation.php");
    exit();
}
