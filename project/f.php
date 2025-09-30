<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Venues</title>
    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('p7.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
        }

        /* Navigation Bar */
        header {
            padding: 10px 30px;
            display: flex;
            justify-content: flex-end;
            animation: fadeDown 1s ease-out;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: #ff4f4f;
        }

        nav ul li a.active {
            border-bottom: 2px solid red;
        }

        /* Search Bar */
        .search-bar {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
            animation: fadeUp 1s ease-out;
        }

        .search-bar select, .search-btn {
            padding: 12px 16px;
            border-radius: 6px;
            border: none;
            font-size: 16px;
            transition: transform 0.2s ease;
        }

        .search-bar select:hover {
            transform: scale(1.05);
        }

        .search-btn {
            background-color: #ff4f4f;
            color: white;
            font-weight: bold;
            cursor: pointer;
            animation: pulse 2s infinite;
        }

        .search-btn:hover {
            background-color: #e13b3b;
            transform: scale(1.08);
        }

        /* Venue Container - Horizontal Layout */
        .venue-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        /* Venue Card */
        .venue-card {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            width: 200px;
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 12px;
            text-align: center;
            backdrop-filter: blur(5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation: fadeInUp 0.8s ease forwards;
            opacity: 0;
        }

        .venue-card img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 10px;
            transition: transform 0.3s ease;
        }

        .venue-card img:hover {
            transform: scale(1.1);
        }

        .venue-card button {
            background: #ff4f4f;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
            transition: transform 0.2s ease, background 0.3s ease;
        }

        .venue-card button:hover {
            background: #e13b3b;
            transform: scale(1.05);
        }

        .venue-card:hover {
            transform: translateY(-10px) scale(1.05);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.5);
        }

        /* Animations */
        @keyframes fadeInUp {
            from {opacity: 0; transform: translateY(30px);}
            to {opacity: 1; transform: translateY(0);}
        }

        @keyframes fadeUp {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }

        @keyframes fadeDown {
            from {opacity: 0; transform: translateY(-20px);}
            to {opacity: 1; transform: translateY(0);}
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.08); }
            100% { transform: scale(1); }
        }
    </style>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="hello.php">HOME</a></li>
            </ul>
        </nav>
    </header>

    <!-- Search Form -->
    <div class="search-bar">
        <select id="state">
            <option>Select State</option>
            <option>Maharashtra</option>
            <option>Karnataka</option>
        </select>
        <select id="city">
            <option>Select City</option>
            <option>Mumbai</option>
            <option>Bengaluru</option>
        </select>
        <button class="search-btn" id="searchBtn">Search</button>
    </div>

    <!-- Venue Cards -->
    <div class="venue-container" id="venueContainer">
        <div class="venue-card">
            <img src="test.jpg" alt="Venue">
            <button>View Details</button>
        </div>
        <div class="venue-card">
            <img src="test.jpg" alt="Venue">
            <button>View Details</button>
        </div>
        <div class="venue-card">
            <img src="test.jpg" alt="Venue">
            <button>View Details</button>
        </div>
    </div>

    <!-- AJAX Script -->
    <script>
        $(document).ready(function(){
            $("#searchBtn").click(function(){
                var state = $("#state").val();
                var city = $("#city").val();

                $.ajax({
                    url: "fetch_venues.php", 
                    type: "POST",
                    data: {state: state, city: city},
                    success: function(response){
                        $("#venueContainer").hide().html(response).fadeIn(600);
                        $(".venue-card").each(function(i){
                            $(this).css("animation-delay", (i*0.2)+"s");
                        });
                    },
                    error: function(){
                        alert("Error while fetching venues!");
                    }
                });
            });

            // Initial load animation delay
            $(".venue-card").each(function(i){
                $(this).css("animation-delay", (i*0.2)+"s");
            });
        });
    </script>
</body>
</html>