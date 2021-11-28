<?php
session_start();



if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once 'loginFunctions.php';
    require_once  'Inc.DBC.php';


    if (emptyInputLogin($username, $password) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }
    loginUser($conn, $username, $password);
} else {
    header("location: ../login.php");
    exit();
}
