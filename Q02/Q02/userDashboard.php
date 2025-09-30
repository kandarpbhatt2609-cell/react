<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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

        .category-menu {
            position: fixed;
            top: 40px;
            /* below your header */
            left: 0;
            width: 200px;
            height: calc(100% - 60px);
            background: lightgray;
            border-right: 1px solid #ddd;
            overflow-y: auto;
            /* independent scroll */
            padding: 10px;
        }

        .category-menu h3 {
            margin-top: 0;
            text-align: center;
        }

        .category-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .category-menu li {
            padding: 10px;
            cursor: pointer;
            border-bottom: 1px solid #ddd;
        }

        .category-menu li:hover {
            background: #ddd;
        }

        /* Push dashboard below menu */
        .dashboard {
            margin-top: 40px;
            margin-left: 220px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./fetchProducts.js"></script>
</head>

<body>

    <?php
    session_start();
    ?>

    <!-- Menu -->
    <div class="menu">
        Welcome to your Dashboard
        <button><a href="./cart.php">Cart</a></button>
        <button><a href="./logout.php"><?php if(isset($_SESSION['name'])) echo $_SESSION['name'],"(Logout)" ?> </a></button>
    </div>

    <div class="category-menu" id="categoryMenu">
        <h3>Categories</h3>
        <ul id="list">
        </ul>
    </div>

    <!-- Dashboard Content -->
    <div class="dashboard">
        

        <br><br>

        <!-- Products Table -->
        <table id="productTable">
            <tr></tr>
        </table>

    </div>

</body>

</html>