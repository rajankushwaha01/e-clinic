<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Help Center</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    html, body {
      height: 100%;
      margin: 0;
      display: flex;
      flex-direction: column;
      font-family: 'Segoe UI', sans-serif;
    }
    body {
      background: linear-gradient(to right, #ff9a9e, #fecfef);
    }
    .content {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 30px;
    }
    .card {
      max-width: 750px;
      padding: 35px;
      border-radius: 18px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.25);
      background: #fff;
      animation: fadeIn 1s ease-in-out;
    }
    h3 {
      text-align: center;
      font-weight: bold;
      color: #6A1B9A;
      margin-bottom: 20px;
    }
    ul li {
      margin-bottom: 12px;
      font-size: 16px;
    }
    footer {
      background: #004d40;
      color: white;
      text-align: center;
      padding: 12px;
      border-radius: 12px 12px 0 0;
      font-size: 14px;
      width: 100%;
    }
    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(-20px);}
      to {opacity: 1; transform: translateY(0);}
    }

    /* Chatbot Button */
    .chat-btn {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background: #6A1B9A;
      color: white;
      border: none;
      border-radius: 50%;
      width: 60px;
      height: 60px;
      font-size: 28px;
      display: flex;
      justify-content: center;
      align-items: center;
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
      cursor: pointer;
      transition: 0.3s;
    }
    .chat-btn:hover {
      background: #9C27B0;
      transform: scale(1.1);
    }

    /* Chatbox */
    .chat-box {
      position: fixed;
      bottom: 90px;
      right: 20px;
      width: 300px;
      height: 400px;
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.3);
      display: none;
      flex-direction: column;
      overflow: hidden;
    }
    .chat-header {
      background: #6A1B9A;
      color: white;
      padding: 12px;
      font-weight: bold;
      text-align: center;
    }
    .chat-body {
      flex: 1;
      padding: 10px;
      overflow-y: auto;
      font-size: 14px;
    }
    .chat-footer {
      padding: 8px;
      border-top: 1px solid #ddd;
      display: flex;
      gap: 5px;
    }
    .chat-footer input {
      flex: 1;
      padding: 6px;
      border-radius: 8px;
      border: 1px solid #ccc;
    }
    .chat-footer button {
      background: #6A1B9A;
      color: white;
      border: none;
      padding: 6px 12px;
      border-radius: 8px;
    }
  </style>
</head>
<body>
  <div class="content">
    <div class="card">
      <h3>❓ Help Center</h3>
      <p>If you face any issues with registration, login, or appointment booking:</p>
      <ul>
        <li>✅ Check if your internet connection is working.</li>
        <li>✅ Make sure you entered correct email and password.</li>
        <li>📧 Contact support at <b>support@rajaneclinic.com</b></li>
        <li>📞 Call us at <b>+91-8756580056</b></li>
      </ul>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <p>© 2025 E Clinic | Designed by <b>Rajan Kushwaha (Integral University Student)</b></p>
  </footer>

  <!-- Chatbot Button -->
  <button class="chat-btn" id="chatToggle">💬</button>

  <!-- Chatbox -->
  <div class="chat-box" id="chatBox">
    <div class="chat-header">E Clinic Chat Support</div>
    <div class="chat-body" id="chatBody">
      <p><b>Bot:</b> Hello 👋 How can I help you today?</p>
    </div>
    <div class="chat-footer">
      <input type="text" id="chatInput" placeholder="Type your message...">
      <button id="sendBtn">Send</button>
    </div>
  </div>

  <script>
    const chatToggle = document.getElementById("chatToggle");
    const chatBox = document.getElementById("chatBox");
    const sendBtn = document.getElementById("sendBtn");
    const chatInput = document.getElementById("chatInput");
    const chatBody = document.getElementById("chatBody");

    chatToggle.addEventListener("click", () => {
      chatBox.style.display = chatBox.style.display === "flex" ? "none" : "flex";
    });

    sendBtn.addEventListener("click", () => {
      const msg = chatInput.value.trim();
      if(msg !== "") {
        let userMsg = document.createElement("p");
        userMsg.innerHTML = "<b>You:</b> " + msg;
        chatBody.appendChild(userMsg);
        chatInput.value = "";

        // simple bot reply
        setTimeout(() => {
          let botMsg = document.createElement("p");
          botMsg.innerHTML = "<b>Bot:</b> Thank you! Our team will contact you soon.";
          chatBody.appendChild(botMsg);
          chatBody.scrollTop = chatBody.scrollHeight;
        }, 1000);
      }
    });
  </script>
</body>
</html>
