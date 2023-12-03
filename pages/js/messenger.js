
let messageCounter = 0;

messageInput.addEventListener('keydown', function (event) {
    if (event.key === 'Enter') {
        event.preventDefault();
        sendMessage();
    }
});

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


async function postToServer() {

    const apiUrl = 'http://localhost/Web-project/pages/model/addMessage.php'
    try {
        const m = {
            msg: "0000",
            sender: 'r@g.c',
            receiver: 'h@g.c'
        };
        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(m)

        });

        if (!response.ok) {
            throw new Error('Network response was not ok.');
        }

        const data = await response.json();
        console.log('API Response: ', data);

    } catch (error) {
        console.error('There was a problem with the fetch operation:', error);
    }
};

postToServer();