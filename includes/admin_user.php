 <!-- admin_user.php- Database of Homeaway
      CSC450 - Computer Science Capstone
      Group 1:
      Elise Frigoli
      Nolan Harre
      Joshua Sibert
      Lor Xiong
      Written:     10/29/21
      Revisions:
      -->


 <?php
    include  "Inc.DBC.php";
    if (isset($_SESSION['username']) && isset($_SESSION['admin_id'])) {

        $sql = "SELECT * FROM admin ORDER BY admin_id ASC";
        $res = mysqli_query($conn, $sql);
    } else {
        header("Location: index.php");
    }
