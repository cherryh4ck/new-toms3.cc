<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styles.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
  <link rel="icon" href="favicon.ico" type="image/x-icon" />
  <title>Toms3 Anarchy - Chat</title>
</head>
<body class="leaderboards-page">
    <nav class="nav-chat">
        <a href="index">go back</a>
    </nav>
    <div class="chat-container">
        <div class="chat-header">
            <span class="dot red"></span>
            <span class="dot yellow"></span>
            <span class="dot green"></span>
            <span class="chat-title">toms3 chat log!!11111</span>
        </div>
        
        <div class="chat-messages" id="chat-box">

        </div>

        <div class="chat-input-area">
            <p>you cannot send messages... yet</p>
        </div>
    </div>

    <script>
        const chatBox = document.getElementById('chat-box');

        function updateChat() {
            fetch('php/getChatData.php') 
                .then(response => response.json())
                .then(data => {
                    const isAtBottom = chatBox.scrollHeight - chatBox.clientHeight <= chatBox.scrollTop + 1;
                    
                    chatBox.innerHTML = ''; 

                    data.forEach(msg => {
                        const msgDiv = document.createElement('div');
                        msgDiv.className = 'message';
                        
                        const time = msg.date.split(' ')[1].substring(0, 5);
                        
                        const timeSpan = document.createElement('span');
                        timeSpan.className = 'timestamp';
                        timeSpan.textContent = `[${time}] `;
                        msgDiv.appendChild(timeSpan);

                        if (msg.event_type === 'EVENT') {
                            msgDiv.classList.add('system');
                            const systemText = document.createElement('span');
                            systemText.className = 'text';
                            systemText.textContent = `${msg.author} ${msg.message}`;
                            msgDiv.appendChild(systemText);
                        } else {
                            const userSpan = document.createElement('span');
                            userSpan.className = 'username';
                            userSpan.textContent = `${msg.author}: `;
                            msgDiv.appendChild(userSpan);
                            
                            const textSpan = document.createElement('span');
                            
                            let textClass = 'text';
                            if (msg.event_type === 'CHAT_GREENTEXT') textClass = 'greentext';
                            if (msg.event_type === 'CHAT_REDTEXT') textClass = 'redtext';
                            
                            textSpan.className = textClass;
                            textSpan.textContent = msg.message; 
                            
                            msgDiv.appendChild(textSpan);
                        }

                        chatBox.appendChild(msgDiv);
                    });

                    if (isAtBottom) {
                        chatBox.scrollTop = chatBox.scrollHeight;
                    }
                })
                .catch(error => console.error('Error al obtener el chat:', error));
        }
        updateChat();
        setInterval(updateChat, 3000);
    </script>
</body>
</html>