<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Glassmorphism Login & Signup</title>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <style>
    body {
      margin: 0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: url('p6.png') no-repeat center center/cover;
      font-family: 'Poppins', sans-serif;
      overflow: hidden;
    }

    .form-box {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(12px);
      border-radius: 20px;
      padding: 40px;
      width: 350px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.25);
      color: white;
      display: none;
      opacity: 0;
      transform: translateY(30px);
      animation: floaty 6s ease-in-out infinite;
    }

    .form-box.active {
      display: block;
      animation: fadeSlideIn 0.6s ease forwards;
    }

    @keyframes fadeSlideIn {
      from {opacity: 0; transform: translateY(30px) scale(0.95);}
      to {opacity: 1; transform: translateY(0) scale(1);}
    }

    @keyframes floaty {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-8px); }
    }

    h2 { text-align: center; margin-bottom: 20px; font-size: 28px; }

    input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: none;
      border-bottom: 2px solid white;
      background: transparent;
      color: white;
      font-size: 16px;
      outline: none;
      transition: all 0.3s ease;
    }

    input:focus {
      border-bottom: 2px solid cyan;
      box-shadow: 0 2px 10px rgba(0,255,255,0.4);
      transform: scale(1.02);
    }

    input::placeholder { color: rgba(255, 255, 255, 0.7); }

    .validation-msg {
      font-size: 13px;
      margin-top: -8px;
      margin-bottom: 8px;
      transition: 0.3s ease;
    }

    .valid { color: lightgreen; }
    .invalid { color: red; }

    .submit-btn {
      width: 100%;
      padding: 12px;
      background: white;
      color: black;
      font-weight: bold;
      border: none;
      border-radius: 30px;
      cursor: pointer;
      font-size: 16px;
      margin-top: 20px;
      transition: all 0.3s ease;
    }

    .submit-btn:hover {
      background: #ddd;
      transform: scale(1.05);
      box-shadow: 0 6px 20px rgba(255,255,255,0.3);
    }

    .toggle-link {
      text-align: center;
      margin-top: 15px;
      cursor: pointer;
      color: lightblue;
      text-decoration: underline;
      display: inline-block;
      transition: transform 0.3s ease, color 0.3s ease;
    }

    .toggle-link:hover {
      color: cyan;
      transform: scale(1.05);
    }

    #form-message { margin-top: 15px; text-align: center; font-size: 14px; font-weight: bold; }

    .checkbox-group {
      margin-top: 15px;
      display: flex;
      justify-content: flex-end;
      align-items: center;
      gap: 4px;
      white-space: nowrap;
      animation: fadeIn 0.8s ease;
    }

    .admin-code {
      display: none;
      animation: fadeSlideIn 0.5s ease forwards;
    }

    @keyframes fadeIn {
      from {opacity: 0;}
      to {opacity: 1;}
    }
  </style>
</head>
<body>

<!-- Login Form -->
<div class="form-box active" id="login-box">
  <h2>Login</h2>
  <form id="loginForm">
    <input type="email" name="email" placeholder="Enter your email" required>
    <input type="password" name="password" placeholder="Enter your password" required>
    <button type="submit" class="submit-btn">Login</button>
    <div id="form-message"></div>
  </form>
  <div class="toggle-link" id="show-signup">Don’t have an account? Sign Up</div>
</div>

<!-- Signup Form -->
<div class="form-box" id="signup-box">
  <h2>Sign Up</h2>
  <form id="signupForm">
    <input type="email" name="email" placeholder="Enter your email" required>

    <input type="password" name="password" id="password" placeholder="Enter your password" required>
    <div id="password-msg" class="validation-msg"></div>

    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm password" required>
    <div id="confirm-msg" class="validation-msg"></div>

    <div class="checkbox-group">
      <label for="is_admin">Register as Admin</label>
      <input type="checkbox" name="is_admin" id="is_admin">
    </div>

    <div class="admin-code" id="admin-code-field">
      <input type="text" name="admin_code" placeholder="Enter Admin Secret Code">
    </div>

    <button type="submit" class="submit-btn">Sign Up</button>
    <div id="form-message"></div>
  </form>
  <div class="toggle-link" id="show-login">Already have an account? Login</div>
</div>

<script>
$(document).ready(function(){

  // Toggle between login and signup forms with animation
  $("#show-signup").click(function(){
    $("#login-box").removeClass("active").fadeOut(300, function(){
      $("#signup-box").fadeIn(300).addClass("active");
    });
  });
  $("#show-login").click(function(){
    $("#signup-box").removeClass("active").fadeOut(300, function(){
      $("#login-box").fadeIn(300).addClass("active");
    });
  });

  // Show admin code field if checked
  $("#is_admin").change(function(){
    if($(this).is(":checked")){
      $("#admin-code-field").slideDown(300);
    } else {
      $("#admin-code-field").slideUp(300);
    }
  });

  // Live password strength check
  $("#password").on("input", function(){
    let pwd = $(this).val();
    let msg = "";
    let strong = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;

    if(pwd.length === 0){
      msg = "";
    } else if(strong.test(pwd)){
      msg = "✅ Strong password.";
      $("#password-msg").removeClass("invalid").addClass("valid");
    } else {
      msg = "❌ Weak: Use 8+ chars, uppercase, lowercase, number & special char.";
      $("#password-msg").removeClass("valid").addClass("invalid");
    }
    $("#password-msg").html(msg);
  });

  // Live confirm password match check
  $("#confirm_password, #password").on("input", function(){
    let pwd = $("#password").val();
    let confirm = $("#confirm_password").val();
    let msg = "";

    if(confirm.length === 0){
      msg = "";
    } else if(pwd === confirm){
      msg = "✅ Passwords match.";
      $("#confirm-msg").removeClass("invalid").addClass("valid");
    } else {
      msg = "❌ Passwords do not match.";
      $("#confirm-msg").removeClass("valid").addClass("invalid");
    }
    $("#confirm-msg").html(msg);
  });

  // Signup redirect logic
  $("#signupForm").on("submit", function(e){
    e.preventDefault();

    let pwdMsg = $("#password-msg").text();
    let confirmMsg = $("#confirm-msg").text();

    if(pwdMsg.includes("Weak") || confirmMsg.includes("do not match")){
      alert("⚠️ Please fix password requirements before signing up.");
      return;
    }

    if($("#is_admin").is(":checked")){
      let adminCode = $("input[name='admin_code']").val();
      if(adminCode === "12345"){ 
        window.location.href = "bt.php";
      } else {
        alert("❌ Invalid Admin Code");
      }
    } else {
      window.location.href = "want.php";
    }
  });

});
</script>

</body>
</html>