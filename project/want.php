<?php
// index.php
session_start();

// Handle AJAX requests
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === "book_ticket") {
            echo "🎟️ Your seat has been booked successfully!";
            exit;
        } elseif ($_POST['action'] === "book_slot") {
            echo "🎤 Your performance slot has been reserved!";
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sunday Open Mic</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
  body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: url('p4.jpg') no-repeat center center fixed;
    background-size: cover;
    color: #fff;
    font-size: 18px;
    overflow-x: hidden;

    /* Center layout */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
  }

  .nav {
    position: absolute;
    top: 20px;
    right: 30px;
    animation: fadeIn 1s ease-in-out;
  }
  .nav a {
    margin-left: 20px;
    text-decoration: none;
    color: #f0f0f0;
    font-weight: bold;
    font-size: 20px;
    transition: color 0.3s ease;
  }
  .nav a:hover {
    color: #ffd700;
  }

  .card {
    background: rgba(0, 0, 0, 0.7);
    border-radius: 15px;
    padding: 35px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.6);
    width: 440px;
    margin: 20px auto;
    text-align: center;
    color: #fff;
    font-size: 20px;
    animation: slideUp 1.2s ease-out;
  }
  .highlight {
    font-size: 36px;
    text-transform: uppercase;
    color: #ffd700;
    font-weight: bold;
    margin-bottom: 25px;
    text-shadow: 0 0 10px rgba(255,215,0,0.8);
    animation: glowText 2s infinite alternate;
  }

  .box-container {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 60px;
    margin-top: 40px;
    animation: fadeIn 1.5s ease-in-out;
  }

  .box {
    background: rgba(0, 0, 0, 0.6);
    border-radius: 15px;
    padding: 40px;
    width: 280px;
    height: 200px;
    text-align: center;
    box-shadow: 0 4px 12px rgba(0,0,0,0.6);
    color: #fff;
    font-size: 20px;
    transform: scale(0.9);
    opacity: 0;
    animation: zoomIn 1s forwards;

    /* Center text + button */
    display: flex;
    flex-direction: column;
    justify-content: center;   /* vertical center */
    align-items: center;       /* horizontal center */
    gap: 60px;
  }
  .box:nth-child(1) { animation-delay: 0.5s; }
  .box:nth-child(2) { animation-delay: 0.8s; }

  /* Make text area consistent */
  .box p {
    min-height: 50px; 
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0;
  }

  .btn {
    padding: 18px 45px;
    border-radius: 12px;
    border: none;
    cursor: pointer;
    font-weight: bold;
    color: #fff;
    font-size: 20px;
    width: 200px;
    height: 60px;
    box-shadow: 0 0 12px rgba(0,0,0,0.4);
    transition: transform 0.3s, box-shadow 0.3s;
    animation: fadeIn 2s ease-in-out;
  }
  .btn:hover {
    transform: scale(1.12);
    box-shadow: 0 0 25px rgba(255,255,255,0.7);
    animation: pulse 1s infinite;
  }
  .ticket-btn {
    background: linear-gradient(to right, #4facfe, #00f2fe);
  }
  .slot-btn {
    background: linear-gradient(to right, #43e97b, #38f9d7);
  }

  .response {
    margin-top: 25px;
    font-weight: bold;
    text-align: center;
    color: #ffd700;
    font-size: 20px;
    opacity: 0;
    animation: fadeIn 1s forwards;
  }

  /* Animations */
  @keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
  }
  @keyframes slideUp {
    from { opacity: 0; transform: translateY(40px); }
    to { opacity: 1; transform: translateY(0); }
  }
  @keyframes zoomIn {
    from { opacity: 0; transform: scale(0.8); }
    to { opacity: 1; transform: scale(1); }
  }
  @keyframes glowText {
    from { text-shadow: 0 0 10px #ffd700, 0 0 20px #ff9900; }
    to { text-shadow: 0 0 20px #fff, 0 0 30px #ffd700; }
  }
  @keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
  }
</style>
</head>
<body>
  <div class="nav">
    <a href="hello.php">HOME</a>
  </div>

  <div class="card">
    <div class="highlight">Sunday Open Mic</div>
    <div>
      <strong>03/08/2025</strong><br>
      06:00 pm - 08:00 pm<br>
      Hindi, English, Gujarati<br>
      16+
    </div>
  </div>

  <div class="box-container">
    <div class="box">
      <p>Book Your Seat!</p>
      <button class="btn ticket-btn" id="ticketBtn">Ticket</button>
    </div>
    <div class="box">
      <p>Want to perform?<br>Book your slot</p>
      <button class="btn slot-btn" id="slotBtn">Slot</button>
    </div>
  </div>

  <div class="response" id="response"></div>

  <script>
    $(document).ready(function(){
        $("#ticketBtn").click(function(){
            $.post("index.php", {action: "book_ticket"}, function(data){
                $("#response").html(data).css("opacity","1");
            });
        });

        $("#slotBtn").click(function(){
            $.post("index.php", {action: "book_slot"}, function(data){
                $("#response").html(data).css("opacity","1");
            });
        });
    });
  </script>
</body>
</html>