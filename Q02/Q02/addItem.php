<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./insertItem.js"></script>

</head>

<body>
    <form action="" method="post" id="addItem" enctype="multipart/form-data">

        <label for="productName">Product Name : </label>
        <input type="text" name="productName" id="productName" />
        <span id="errName" style="color:red"></span>
        <br /><br />

        <label for="category">Select category : </label>
        <select name="category">
            <option value="Electronics">Electronics</option>
            <option value="Fashion">Fashion</option>
            <option value="Grocery">Grocery</option>
            <option value="Stationary">Stationary</option>
        </select>
        <br /><br />

        <label for="price">Enter Price : </label>
        <!-- <input type="number" name="" id=""> -->
        <input type="number" name="price" id="price" />
        <span id="errPrice" style="color:red"></span>
        <br /><br />

        <label for="stock">Enter Stock : </label>
        <input type="number" name="stock" id="stock" />
        <span id="errStock" style="color:red"></span>
        <br /><br />

        <label for="image">Select Image : </label>
        <input type="file" name="uploadImage" id="uploadImage" />
        <span id="errImage" style="color:red"></span>
        <br /><br />

       

        <input type="submit" name="submit" value="Add" />

    </form>

</body>

</html>