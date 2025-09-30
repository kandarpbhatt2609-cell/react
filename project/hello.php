<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Soulful Jazz Experience</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Georgia', serif;
      background-color: #fff8ef;
      color: #2c2c2c;
    }

    /* Navbar */
    nav {
      position: sticky;
      top: 0;
      background-color: #fff8ef;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 12px 40px;
      font-size: 1rem;
      z-index: 1000;
      box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    nav .logo {
      font-weight: bold;
      font-size: 1.25rem;
      letter-spacing: 1px;
      color: #2c2c2c;
    }

    nav ul {
      display: flex;
      list-style: none;
      gap: 30px;
    }

    nav ul li a {
      text-decoration: none;
      color: #2c2c2c;
      font-weight: 500;
      position: relative;
      transition: color 0.3s;
    }

    nav ul li a::after {
      content: "";
      position: absolute;
      width: 0;
      height: 2px;
      left: 0;
      bottom: -4px;
      background: #2c2c2c;
      transition: width 0.3s ease;
    }

    nav ul li a:hover::after,
    nav ul li a.active::after {
      width: 100%;
    }

    /* Hero Section */
    .hero {
      position: relative;
      height: 90vh;
      background: url('p3.jpg') center/cover no-repeat;
      display: flex;
      align-items: center;
      padding-left: 80px;
      color: white;
      overflow: hidden;
    }

    .hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .hero-content {
      position: relative;
      max-width: 600px;
      animation: fadeInUp 1.2s ease forwards;
      opacity: 0;
    }

    .hero-content h1 {
      font-size: clamp(2rem, 6vw, 4rem);
      font-weight: bold;
      line-height: 1.1;
    }

    .hero-content p {
      margin-top: 15px;
      font-size: clamp(1rem, 2.5vw, 1.25rem);
      opacity: 0.9;
    }

    .hero-content a {
      display: inline-block;
      margin-top: 25px;
      padding: 12px 28px;
      font-size: 1rem;
      font-weight: bold;
      background: transparent;
      border: 2px solid white;
      color: white;
      border-radius: 25px;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .hero-content a:hover {
      background-color: white;
      color: black;
      transform: translateY(-3px);
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }

    /* Animations */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Responsive */
    @media (max-width: 768px) {
      .hero {
        padding-left: 20px;
        justify-content: center;
        text-align: center;
      }
      .hero-content {
        max-width: 90%;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav>
    <div class="logo">C. Moore</div>
    <ul>
      <li><a href="#" class="active">Home</a></li>
      <li><a href="f.php">Events</a></li>
    </ul>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-content">
      <h1>Soulful Jazz<br>Experience</h1>
      <p>Laughing is the best therapy</p>
      <a href="login2.php">Login</a>
    </div>
  </section>

</body>
</html>