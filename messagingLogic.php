<?php
    $theUser = '15';
    //$theUser = $_SESSION['user_id'];

    //for getting all the users in the drop down 'To:' menu
    function getUsers(){
        require 'Inc.DBC.php';
        $sql = "SELECT user_id, fname, lname FROM user";
        $resultSet = $conn->query($sql);
        
        while($rows = $resultSet->fetch_assoc())
        {
            //get first and last name
            $firstName = $rows['fname'];
            $lastName = $rows['lname'];
            $tempUser = $rows['user_id'];

            //list one option at a time
            echo "<option value='$tempUser'>$firstName $lastName</option>";
        }
        $conn->close();
    }//end of getUsers()

    //for listing the messages in a user's inbox
    function listMessages(){
        global $theUser;
        require 'Inc.DBC.php';
        //get data from message_recipient table
        $sql = "SELECT recipient_id, createDate, creator_id, subject, id
        FROM message
        WHERE recipient_id = '$theUser'";
        $resultSet = $conn->query($sql) or die($conn->error);

        while($rows = $resultSet->fetch_assoc()){
            //set the variables
            $recipient_id = $rows['recipient_id'];
            $createDate = $rows['createDate'];
            $creator_id = $rows['creator_id'];
            $subject = $rows['subject'];
            $linkValue = $rows['id'];

            //get sender's name
            $sql =
            "SELECT fname, lname
            FROM user
            WHERE user_id = '$creator_id'";
            $nameInfo = $conn->query($sql);
            $nameData = $nameInfo->fetch_assoc();

            //set name
            $firstName = $nameData['fname'];
            $lastName = $nameData['lname'];

            //print results of queries
            //echo "<form method='POST'>";
            echo "<tr>"; 
            echo "<th scope='row'><input name='msg1' type='checkbox' id='msg1' value='$linkValue'></th>";
            echo "<td>$firstName $lastName</td>";
            echo "<td>$createDate</td>";
            echo "<td><button type='submit' class='open-message-btn blue-text' name='viewMessage' value='$linkValue'>$subject</button></td>";
            echo "</tr>";
            //echo "</form>";
        }
        $conn->close();
    }//end of listMessages()

    function sendMessage($recipient, $theSubject, $content, $sender){
        require 'Inc.DBC.php';
        global $theUser;
        $date = date("Y-m-d");//gets date from computer(not sure if this is correct format for date in database)
        if(!empty($recipient) || !empty($theSubject) || !empty($content) ||
        !empty($date) || !empty($sender)){
            //echo 'debug', $recipient, $theSubject, $content, $sender, $date;

            //prepared statement for message table
            $INSERT = "INSERT INTO message (subject, creator_id, messageBody, createDate, recipient_id)
            VALUES(?, ?, ?, $date, ?)";

            if($stmt = $conn->prepare($INSERT)){
                //echo 'executed';
            }
            else{
               die("Errormessage: ". $conn->error);
            }
            $stmt->bind_param("sisi", $theSubject, $sender, $content, $recipient);

            //execute prepared statement for message table
            $stmt->execute();
            $stmt->close();
        }
        else{
            echo nope;
            die();
        }
    }//end of sendMessage()

    function selectMessage($messageId){
        global $theUser;
        require 'Inc.DBC.php';

        //get the data from the database
        $sql = "SELECT * FROM message WHERE id = '$messageId'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $_SESSION['subject'] = $row['subject'];
        $_SESSION['body'] = $row['messageBody'];
        $tempID = $row['creator_id'];
        $_SESSION['id'] = $messageId;

        //get the person's name
        $sql = "SELECT * FROM user WHERE '$tempID' = user_id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $name = $row['fname'] . " " . $row['lname'];
        $_SESSION['sender'] = $name;
        
    }//end of selectMessage

    function displayMessage(){
        require 'Inc.DBC.php';
        if(!empty($_SESSION['sender'])){
            $sender = $_SESSION['sender'];
            $subject = $_SESSION['subject'];
            $body = $_SESSION['body'];
            $id = $_SESSION['id'];
        }
        else{
            $sender = '';
            $subject = '';
            $body = '';
        }
        

        echo "<div class='col-3 col-md-2 mb-4 d-flex align-items-center'>";
        echo "<h4 class='mb-0'>From:</h4>";
        echo "</div>";
        echo "<div class='col-9 col-md-10 mb-4'>";
        echo "<p class='form-control mb-0'>$sender</p>";
        echo "</div>";

        echo "<h4 class='mb-0'>Subject:</h4>";
        echo "</div>";
        echo "<div class='col-9 col-md-10 mb-4'>";
        echo "<p class='form-control mb-0'>$subject</p>";
        echo "</div>";

        echo "<div class='col-12 mb-4'>";
        echo "<textarea class='w-100 p-3' rows='5' disabled>$body</textarea>";
        echo "</div>";
    }

    function deleteMessage(){
        require 'Inc.DBC.php';
        $messageId = $_SESSION['id'];
        mysqli_query($conn, "DELETE FROM message WHERE id = '$messageId'");
    }
?>