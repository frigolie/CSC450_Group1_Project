<?php
  $host = 'localhost';
  $dbName = 'csc45up1_HomeAway';
  $user = 'csc45up1_HA';
  $pass = 'W2^BSUtL54-4';

  $conn = mysqli_connect($host, $user, $pass, $dbName);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
?>