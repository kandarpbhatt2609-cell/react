<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        /* Keep menu fixed */
        .menu {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: lightgray;
            /* just to see the area */
            padding: 10px;
            text-align: right;
        }

        .cart-menu {
            position: fixed;
            top: 40px;
            /* below your header */
            right: 0;
            width: 200px;
            height: calc(100% - 60px);
            background: lightgray;
            border-right: 1px solid #ddd;
            overflow-y: auto;
            /* independent scroll */
            padding: 10px;
        }

        .cart-menu h3 {
            margin-top: 0;
            text-align: center;
            background: #ddd;
            border-radius: 8px; 
        }

        .category-menu li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        
        /* Push dashboard below menu */
        .dashboard {
            margin-top: 40px;
            margin-right: 220px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./fetchCart.js"></script>
</head>
<body>
    <div class="menu">
        <button><a href="./userDashboard.php">dashboard</a></button>
    </div>

    <div class="dashboard">
        <table id="cartTable">
            <tr></tr>
        </table>
    </div>

    <div class="cart-menu">
        <h3>Cart</h3>
        <ul id="priceDetail">
        </ul>
    </div>
</body>
</html>