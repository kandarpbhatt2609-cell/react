<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Club Venue</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: url('p2.png') no-repeat center center fixed;
      background-size: cover;
      color: white;
      overflow-x: hidden;
    }

    /* Header Layout (logo + text + home) */
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 120px 340px;
      animation: slideDown 1s ease-out;
    }

    .nav-right {
      position: absolute;
      top: 20px;
      right: 30px;
      font-size: 22px;
      font-weight: bold;
      cursor: pointer;
      color: white;
      text-decoration: none;
      animation: fadeIn 1.2s ease-in;
    }

    .nav-right:hover {
      color: #ddd;
    }

    .left-section {
      display: flex;
      align-items: center;
      gap: 25px;
    }

    .logo-box {
      background: #90a8d0;
      border-radius: 20px;
      width: 150px;
      height: 150px;
      display: flex;
      justify-content: center;
      align-items: center;
      box-shadow: 0 6px 12px rgba(0,0,0,0.3);
      overflow: hidden;
      padding: 5px;
      animation: zoomIn 1s ease-out;
    }

    .logo-box img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 20px;
    }

    .info {
      text-align: left;
      font-size: 18px;
      line-height: 1.6;
      opacity: 0;
      animation: fadeInUp 1.2s ease forwards;
      animation-delay: 0.5s;
    }

    /* Buttons Section */
    .buttons {
      margin-top: 20px;
      display: flex;
      justify-content: center;
      gap: 80px;
      flex-wrap: wrap;
      animation: fadeIn 1.3s ease-in;
    }

    .btn {
      background: #eaf3fa;
      color: black;
      font-weight: bold;
      font-size: 26px;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 220px;
      width: 220px;
      border-radius: 25px;
      cursor: pointer;
      transition: 0.4s;
      box-shadow: 0 6px 12px rgba(0,0,0,0.3);
      opacity: 0;
      transform: translateY(40px);
      animation: fadeInUp 0.9s ease forwards;
    }

    .btn:nth-child(1) { animation-delay: 0.5s; }
    .btn:nth-child(2) { animation-delay: 0.7s; }
    .btn:nth-child(3) { animation-delay: 0.9s; }

    .btn:hover {
      background: #cfdff5;
      transform: scale(1.1) translateY(-5px);
      box-shadow: 0 10px 18px rgba(0,0,0,0.5);
    }

    #content {
      margin-top: 60px;
      font-size: 20px;
      text-align: center;
      display: none; /* hidden until AJAX loads */
      animation: fadeIn 0.8s ease forwards;
    }

    /* Animations */
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    @keyframes slideDown {
      from { opacity: 0; transform: translateY(-40px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes zoomIn {
      from { transform: scale(0.5); opacity: 0; }
      to { transform: scale(1); opacity: 1; }
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(40px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* =========================
       MEDIA QUERIES
    ==========================*/

    /* Tablet (768px - 1024px) */
    @media (max-width: 1024px) {
      .header {
        padding: 60px 100px;
      }

      .logo-box {
        width: 120px;
        height: 120px;
      }

      .info {
        font-size: 16px;
      }

      .btn {
        width: 180px;
        height: 180px;
        font-size: 22px;
      }
    }

    /* Mobile (max-width: 768px) */
    @media (max-width: 768px) {
      .header {
        flex-direction: column;
        align-items: center;
        padding: 40px 20px;
        text-align: center;
      }

      .left-section {
        flex-direction: column;
        gap: 15px;
      }

      .nav-right {
        position: relative;
        margin-top: 15px;
        right: 0;
        top: 0;
        font-size: 18px;
      }

      .logo-box {
        width: 100px;
        height: 100px;
      }

      .info {
        font-size: 14px;
        text-align: center;
      }

      .buttons {
        flex-direction: column;
        gap: 25px;
        margin-top: 40px;
      }

      .btn {
        width: 90%;
        max-width: 300px;
        height: 120px;
        font-size: 20px;
      }
    }
  </style>
</head>
<body>

  <!-- Header: Logo + Text (left) -->
  <div class="header">
    <div class="left-section">
      <div class="logo-box">
        <img src="test2.png" alt="Venue Logo">
      </div>
      <div class="info">
        <p>vip road, vesu, surat</p>
        <p>10am - 10:00pm</p>
        <p>12345678910</p>
      </div>
    </div>
  </div>

  <!-- HOME link (top-right) -->
  <a href="hello.php" class="nav-right" id="homeLink">HOME</a>

  <!-- Buttons -->
  <div class="buttons">
    <div class="btn" id="openMic">Open Mic!</div>
    <div class="btn" id="lineUp">Line Up!</div>
    <div class="btn" id="special">Special!</div>
  </div>

  <div id="content"></div>

  <script>
    $(document).ready(function () {
      // AJAX loading with fade effect
      function loadContent(url) {
        $("#content").fadeOut(200, function() {
          $.ajax({
            url: url,
            success: function (data) {
              $("#content").html(data).fadeIn(500);
            }
          });
        });
      }

      $("#openMic").click(function () {
        loadContent("openmic.html");
      });

      $("#lineUp").click(function () {
        loadContent("lineup.html");
      });

      $("#special").click(function () {
        loadContent("special.html");
      });
    });
  </script>

</body>
</html>