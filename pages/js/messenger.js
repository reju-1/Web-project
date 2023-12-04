
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
        messageElement.classList.add('right');

        messageElement.textContent = message;
        chatContainer.appendChild(messageElement); // Append new message
        messageInput.value = ''; // Clear input field after sending message

        //get current chat person and user email from session
        const msgObj = {
            msg: message,
            sender: 'r@g.c',
            receiver: 'h@g.c'
        };

        postToServer(msgObj);

    }
}


async function postToServer(msgObj) {

    const apiUrl = 'http://localhost/Web-project/pages/model/addMessage.php'
    try {

        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(msgObj)

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

setInterval(async () => {

    const apiUrl = 'http://localhost/Web-project/pages/model/getMessages.php';
    try {

        const msgObj = {
            sender: 'r@g.c',
            receiver: 'h@g.c'
        };

        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(msgObj)

        });

        if (!response.ok) {
            throw new Error('Network response was not ok.');
        }

        const data = await response.json();
        addToDOM(data);

    } catch (error) {
        console.error('There was a problem with the fetch operation:', error);
    }
}, 2000);

function addToDOM(apiData) {

    if (apiData.rows != 'empty') {

        const { messages } = apiData;

        let chatContainer = document.querySelector('.chat-container');
        chatContainer.innerHTML = '';

        messages.map((message) => {

            const { id, sender, receiver, msg } = message;

            let messageElement = document.createElement('div');
            messageElement.classList.add('message');

            // Alternating messages between left and right
            if (sender === "r@g.c") {
                messageElement.classList.add('right');
            }

            messageElement.textContent = msg;
            chatContainer.appendChild(messageElement);


        })

    }
}