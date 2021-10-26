<!-- inc.signup.php-- Database of Homeaway
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

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];



    require_once 'function.php';
    require_once  'Inc.DBC.php';


    if (emptyInputSignup($fname, $lname, $email, $username, $password, $confirmpassword) !== false) {
        header("location: ../register.php?error=emptyinput");
        exit();
    }
    if (invalidfname($fname) !== false) {
        header("location: ../register.php?error=invalidFirstname");
        exit();
    }
    if (invalidlname($lname) !== false) {
        header("location: ../register.php?error=invalidLastname");
        exit();
    }
    if (invalidUser($username) !== false) {
        header("location: ../register.php?error=invalidUsername");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../register.php?error=invalidEmail");
        exit();
    }

    if (pwdMatch($password, $confirmpassword) !== false) {
        header("location: ../register.php?error=invalidpassword");
        exit();
    }
    if (uidExists($conn, $username, $email) !== false) {
        header("location: ../register.php?error=usernametaken");
        exit();
    }

    createUser($conn, $fname, $lname, $email, $username, $password, $confirmpassword);
} else {
    header("location: ../register.php");
    exit();
}
