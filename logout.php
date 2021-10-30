 <!-- logout.php- Database of Homeaway
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
    session_start();

    session_unset();
    session_destroy();

    header("Location: index.php");
