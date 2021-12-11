<?php
session_start();
include  "Inc.DBC.php";

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])) {

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $role = test_input($_POST['role']);

    if (empty($username)) {
        header("Location: ../adminlogin.php?error=Username is Required");
    } else if (empty($password)) {
        header("Location: ../adminlogin.php?error=Password is Required");
    } else {

        // Hashing the password
        $password = md5($password);

        $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            // the user name must be unique
            $row = mysqli_fetch_assoc($result);
            if ($row['password'] === $password && $row['role'] == $role) {
                $_SESSION['name'] = $row['name'];
                $_SESSION['admin_id'] = $row['admin_id'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['username'] = $row['username'];

                header("Location: ../admin.php");
            } else { header("Location: ../adminlogin.php?error=Incorect Username or password");
            }
        } else {
            header("Location: ../adminlogin.php?error=Please enter your username or password again");
        }
    }
} else {
    header("Location: ../adminlogin.php");
}
