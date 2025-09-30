<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Venue Form</title>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('p3.jpg') no-repeat center center/cover;
            font-family: Arial, sans-serif;
            overflow: hidden;
        }

        /* 🔹 Form Box Animation */
        .form-box {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 30px;
            width: 90%;
            max-width: 400px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
            color: white;
            opacity: 0;
            transform: translateY(-40px);
            animation: slideFadeIn 1s ease forwards;
        }

        @keyframes slideFadeIn {
            from { opacity: 0; transform: translateY(-40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.8rem;
            animation: fadeIn 1.2s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        input, select {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-bottom: 2px solid white;
            background: transparent;
            color: white;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input:focus, select:focus {
            border-color: #4fffb0;
            box-shadow: 0 0 8px #4fffb0;
        }

        input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        select {
            border: 1px solid white;
            border-radius: 5px;
            padding: 10px;
            background: rgba(255, 255, 255, 0.1);
        }

        select option {
            background: #222;
            color: white;
        }

        /* 🔹 Button Animation */
        .submit-btn {
            width: 100%;
            padding: 12px;
            background: white;
            color: black;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 15px;
            transition: transform 0.3s ease, background 0.3s ease;
            animation: pulse 2s infinite;
        }

        .submit-btn:hover {
            background: #ddd;
            transform: scale(1.05);
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.03); }
            100% { transform: scale(1); }
        }

        /* 🔹 Success Message Animation */
        #form-message {
            margin-top: 15px;
            text-align: center;
            font-size: 14px;
            opacity: 0;
            transition: opacity 0.6s ease, text-shadow 0.6s ease;
        }

        #form-message.show {
            opacity: 1;
            text-shadow: 0 0 10px lightgreen;
        }

        /* Responsive adjustments */
        @media (max-width: 600px) {
            .form-box {
                padding: 20px;
            }
            h2 {
                font-size: 1.5rem;
            }
            input, select, .submit-btn {
                font-size: 0.9rem;
                padding: 10px;
            }
        }

        @media (max-width: 400px) {
            h2 {
                font-size: 1.3rem;
            }
            .form-box {
                padding: 15px;
            }
        }
    </style>
</head>
<body>

<div class="form-box">
    <h2>Venue Details</h2>
    <form id="venueForm">
        <input type="text" name="venue_name" placeholder="Venue Name" required>
        
        <label style="display:block; margin-top:10px;">State:</label>
        <select name="state" id="state" required>
            <option value="">--Select State--</option>
            <option value="Maharashtra">Maharashtra</option>
            <option value="Gujarat">Gujarat</option>
            <option value="Delhi">Delhi</option>
        </select>

        <label style="display:block; margin-top:10px;">City:</label>
        <select name="city" id="city" required>
            <option value="">--Select City--</option>
        </select>

        <input type="text" name="address" placeholder="Address" required>
        <input type="tel" name="contact_no" placeholder="Contact Number" pattern="[0-9]{10}" required>

        <button type="submit" class="submit-btn">Submit</button>
        <div id="form-message"></div>
    </form>
</div>

<script>
$(document).ready(function(){
    // Dynamic city dropdown
    const citiesByState = {
        "Maharashtra": ["Mumbai", "Pune", "Nagpur"],
        "Gujarat": ["Ahmedabad", "Surat", "Vadodara"],
        "Delhi": ["New Delhi", "Dwarka", "Rohini"]
    };

    $('#state').change(function(){
        let state = $(this).val();
        let cities = citiesByState[state] || [];
        $('#city').empty().append('<option value="">--Select City--</option>');
        $.each(cities, function(i, city){
            $('#city').append('<option value="'+city+'">'+city+'</option>');
        });
    });

    // Form submit (dummy AJAX)
    $('#venueForm').submit(function(e){
        e.preventDefault();
        $('#form-message')
            .css('color', 'lightgreen')
            .html("✅ Form submitted successfully!")
            .addClass('show');
    });
});
</script>

</body>
</html>