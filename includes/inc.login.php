 <!-- inc.login.php- Database of Homeaway
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

        $username = $_POST["username"];
        $password = $_POST["password"];

        require_once 'function.php';
        require_once  'Inc.DBC.php';


        if (emptyInputLogin($username, $password) !== false) {
            header("location: ../login.php?error=emptyinput");
            exit();
        }
        loginUser($conn, $username, $password);
    } else {
        header("location:login.php");
        exit();
    }
