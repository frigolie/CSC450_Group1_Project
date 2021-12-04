<?php
    //gathers data from message posting
    $recipient = $POST['recipient'];
    $theSubject = $POST['subject'];
    $content = $POST['content'];
    $date = date("Y-m-d");//gets date from computer(not sure if this is correct format for date in database)
    $sender = $_SESSION["user_id"];//current user that is logged in

    //make sure all required feilds are here
    if(!empty($recipient) || !empty($theSubject) || !empty($content) ||
    !empty($date) || !empty($sender)){
        require 'Inc.BDC.php';

        //prepared statement for message table
        $INSERT = "INSERT INTO message (subject, creator_id, message_body, create_date)
        VALUES(?, ?, ?, ?)";

        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("sibs", $theSubject, $sender, $content, $date);

        //execute prepared statement for message table
        $stmt->execute();
        $stmt->close();

        //get that message's id for recipient table
        $messageNumber = mysqli_insert_id($conn);

        //prepared statement for message recipient table
        $INSERT = "INSERT INTO message_recipient (recipient_id, message_id)
        VALUES(?, ?)";

        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("ii", $recipient, $messageNumber);

        //execute prepared statement for the message recipient table
        $stmt->execute();
        $stmt->close();

        //close database
        $conn->close();
    }
    else{
        die();
    }
?>