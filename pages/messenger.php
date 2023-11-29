<?php
include './php_utility/connection.php';

// get the user Email from session variable 
$emailID = "r@gmail.com";

// Prepare and execute query to get names and Picture of friends based on user email
$stmt = $conn->prepare("
    SELECT CONCAT(u.firstName,' ',u.lastName) as name, picture
    FROM friends f
    INNER JOIN users u ON f.friend = u.email
    WHERE f.userId = ?
");
$stmt->bind_param("s", $emailID);
$stmt->execute();

$friends_details = $stmt->get_result();

$stmt->close();
$conn->close();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/messenger.css">
    <title>Messenger</title>
</head>

<body>
    <div class="root">
        <div class="side-nav">
        </div>

        <div class="left-side">
            <?php
            if ($friends_details->num_rows > 0) {
                while ($row = $friends_details->fetch_assoc()) {
                    ?>
                    <div class="friend">
                        <div class="picture">
                            <img src="../assets/profiles/<?php echo $row['picture']; ?>" alt="">
                        </div>
                        <div class="detals">
                            <div class="head">
                                <p class="name">
                                    <?php echo $row['name']; ?>
                                </p>
                                <p>10:50pm</p>
                            </div>
                            <p>Hi</p>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "No matching users found";
            }
            ?>

        </div>


        <div class="right-side">
            <div class="chat-container">
                <!-- Existing chat messages will be displayed here -->
            </div>
            <div class="submit-section">
                <input type="text" id="messageInput" placeholder="Type a message...">
                <button id="sendMessage" onclick="sendMessage()">Send</button>
            </div>
        </div>


    </div>

</body>

<script>
    let messageCounter = 0;

    function sendMessage() {
        var messageInput = document.getElementById('messageInput');
        var message = messageInput.value.trim();

        if (message !== '') {
            var chatContainer = document.querySelector('.chat-container');
            var messageElement = document.createElement('div');
            messageElement.classList.add('message');

            // Alternating messages between left and right
            if (messageCounter % 2 === 0) {
                messageElement.classList.add('right');
            }

            messageElement.textContent = message;
            chatContainer.appendChild(messageElement); // Append new message
            messageInput.value = ''; // Clear input field after sending message

            messageCounter++;
        }
    }

    messageInput.addEventListener('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            sendMessage();
        }
    });

</script>

</html>