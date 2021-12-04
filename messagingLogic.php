<?php
    $theUser = $_SESSION["user_id"];

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
            echo "<option value='user_id'>$firstName $lastName</option>";
        }
        $conn->close();
    }//end of getUsers()

    //for listing the messages in a user's inbox
    function listMessages(){
        require 'Inc.DBC.php';
        //get data from message_recipient table
        $sql = "SELECT recipient_id, message_id 
        FROM message_recipient
        WHERE recipient_id = '$theUser'";
        $resultSet = $conn->query($sql);

        while($rows = $resultSet->fetch_assoc()){
            //set the first variables
            $recipient_id = $rows['recipient_id'];
            $message_id = $rows['message_id'];

            //get other info needed specific to this user
            $sql = 
            "SELECT id, creator_id, create_date, subject
            FROM message
            WHERE id='$message_id'";
            $messageInfo = $conn->query($sql);
            $extraData = $messageInfo->fetch_assoc();

            //set the next set of variables
            $linkValue = $extraData['id']; //need for hyperlink to carry this identifier
            $creator_id = $extraData['creator_id'];
            $create_date = $extraData['create_date'];
            $subject = $extraData['subject'];

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
            echo "<tr>"; 
            echo "<th scope="row"><input type="checkbox" id="msg1" name="msg1" value=""></th>";
            echo "<td>$firstName $lastName</td>";
            echo "<td>$create_date</td>";
            echo "<td><a class="open-message-btn blue-text" data-value='$linkValue'>$subject</a></td>";
            echo "</tr>";
        }
        $conn->close();
    }//end of listMessages()

?>