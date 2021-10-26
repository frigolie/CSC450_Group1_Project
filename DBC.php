  <!-- DBC.php- Database of Homeaway
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

    /* 
$host = 'localhost';
$dbName = 'prjrentals';
$user = 'root';
$pass = 'mysql';

$conn = mysqli_connect($host, $user, $pass, $dbName);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
} 
*/

    $host = 'ns6455.hostgator.com';
    $dbName = 'csc45up1_HomeAway';
    $user = 'csc45up1_HA';
    $pass = 'US51A5NXHS)n';

    $conn = mysqli_connect($host, $user, $pass, $dbName);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
