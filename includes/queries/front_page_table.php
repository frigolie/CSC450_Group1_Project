<?php
session_start();

include  dirname( dirname(__FILE__) ) . '/Inc.DBC.php';
    $sql = "SELECT * FROM property ORDER BY RAND() ASC LIMIT 3";
    $prop_query = mysqli_query($conn, $sql);
