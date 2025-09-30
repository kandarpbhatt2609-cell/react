<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        .menu {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: lightblue;
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
            background: lightblue;
            border-right: 1px solid #6d8e9bff;
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
            border-bottom: 1px solid #6d8e9bff;
        }

        .category-menu li:hover {
            background: #6d8e9bff;
        }

        .dashboard {
            margin-left: 220px;
            margin-top: 60px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./fetchAdminDashboard.js"></script>
</head>

<body>

    <?php
    session_start();
    ?>

    <div class="menu">
        <button><a href="./addItem.php">Add Items</a></button>
        <button id="manageProductsBtn">Manage Products</button>
        <button id="manageUsersBtn">Manage Users</button>
        <button><a href="./login.php"><?php if (isset($_SESSION['name'])) echo $_SESSION['name'], " (Logout)"; ?></a></button>
    </div>

    <div class="category-menu" id="categoryMenu">
        <h3>Categories</h3>
        <center><input type="text" id="newCategoryName" placeholder="New Category Name"/></center><br/><br>
        <center><button id="addCategoryButton">Add Category</button></center>
        <ul id="categoryList"></ul>
    </div>

    <div class="dashboard">
        <h2>Welcome to your Dashboard</h2>
        <div id="table-container"></div>
    </div>

</body>

</html>