<?php
session_start();

require_once dirname( dirname( dirname(__FILE__) ) ) . '/Inc.DBC.php';

function deleteReservation($conn, $id)
{
session_start();
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $sql = "DELETE FROM reservation WHERE id=?";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../edit-reservation.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    session_start();
    $_SESSION['status'] = "Reservation successfully deleted.";
    header("location:../edit-reservation.php?success=true");
    exit();
}
