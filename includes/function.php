<?php
session_start();

require_once  'Inc.DBC.php';


function emptyInputSignup($fname, $lname, $email, $username, $password, $confirmpassword)
{

    require_once  'Inc.DBC.php';
    $result;
    if (empty($fname) || empty($lname) || empty($username) || empty($email) || empty($password) || empty($confirmpassword)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidfname($fname)
{
    require_once  'Inc.DBC.php';
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $fname)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidlname($lname)
{
    require_once  'Inc.DBC.php';
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $lname)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function invalidUser($username)
{
    require_once  'Inc.DBC.php';
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    require_once  'Inc.DBC.php';
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function pwdMatch($password, $confirmpassword)
{
    require_once  'Inc.DBC.php';
    $result;
    if ($password !==  $confirmpassword) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function uidExists($conn, $username, $email)
{

    $sql = "SELECT * FROM user WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}


function createUser($conn, $fname, $lname, $email, $username, $password)
{
    require_once  'Inc.DBC.php';
    $sql = "INSERT INTO user (fname, lname, email, username, password) VALUES (?, ?, ?, ?, ?) ;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $fname, $lname, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../login.php?error=none");
    exit();
}


function emptyInputLogin($username, $password)
{

    require_once  'Inc.DBC.php';
    $result;
    if (empty($username) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $password)
{
    require_once  'Inc.DBC.php';
    $uidExist = uidExists($conn, $username, $username);

    if ($uidExist === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    $pwdHashed = $uidExist["password"];
    $checkPwd = password_verify($password, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["user_id"] = $uidExist["user_id"];
        $_SESSION["username"] = $uidExist["username"];
        header("location: ../index.php");
        exit();
    }
}
