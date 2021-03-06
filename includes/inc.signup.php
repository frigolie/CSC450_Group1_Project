<?php
session_start();

if (isset($_POST["submit"])) {

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];


    require_once  'Inc.DBC.php';
    require_once 'functions/user/loginFunctions.php';



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
      $_SESSION['status'] = "invalid email";
        header("location: ../register.php?error=invalidEmail&fname=$fname&lname=$lname&email=$email&username=$username");
        exit();
    }

    if (pwdMatch($password, $confirmpassword) !== false) {
       $_SESSION['status'] = "passwords don't match";
        header("location: ../register.php?error=passwordsdontmatch&fname=$fname&lname=$lname&email=$email&username=$username");
        exit();
    }
    if (uidExists($conn, $username, $email) !== false) {
        $_SESSION['status'] = "username has been taken";
        header("location: ../register.php?error=usernametaken&fname=$fname&lname=$lname&email=$email&username=$username");
        exit();
    }

    createUser($conn, $fname, $lname, $email, $username, $password, $confirmpassword);
    header("location: ../login.php?success=true");
    exit();
} else {
    header("location: ../register.php");
    exit();
}
