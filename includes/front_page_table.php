<?php
session_start();

include  "Inc.DBC.php";
    $sql = "SELECT * FROM property ORDER BY RAND() ASC LIMIT 3";
    $prop_query = mysqli_query($conn, $sql);
