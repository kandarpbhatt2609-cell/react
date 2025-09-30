<?php
    header("Content-type: application/json");
    include "./connection.php";

    // $uploadOk = 1;
    $target_dir = "uploads/";
    $imagePath = "";

    if (isset($_FILES['uploadImage'])) {

        $imageFileType = strtolower(pathinfo($_FILES['uploadImage']['name'], PATHINFO_EXTENSION));

        $newimagename = "img" . uniqid() . "." . $imageFileType;
        $target_file = $target_dir . $newimagename;

        $check = getimagesize($_FILES['uploadImage']['tmp_name']);
        if ($check == false) {
            // $uploadOk = 0;
            echo json_encode(["status" => "error", "message" => "File is not a image"]);
            exit;
        }

        $allowed_types = ["jpg", "jpeg", "png"];
        if (!in_array($imageFileType, $allowed_types)) {
            echo json_encode(["status" => "error", "message" => "Only JPG, JPEG and PNG are allowed"]);
            exit;
        }
        if (move_uploaded_file($_FILES['uploadImage']['tmp_name'], $target_file)) {
            $imagePath = $target_file;
        } else {
            echo json_encode(["status" => "error", "message" => "Error in uploading image"]);
            exit;
        }
    } else {
        echo json_encode(["status" => "error", "message" => "No image file uploaded."]);
        exit;
    }


    $category = $_POST['category'];
    $categoryId = 0;
    if ($category == "Electronics") {
        $categoryId = 1;
    } else if ($category == "Grocery") {
        $categoryId = 2;
    } else if ($categoryId == "Stationary") {
        $categoryId = 3;
    } else {
        $categoryId = 4;
    }

    $productName = $_POST['productName'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    // $image = $_POST['uploadedImage'];

    $sql = "INSERT INTO products (category_id,product_name,price,stock,image) VALUES ($categoryId,'$productName',$price,$stock,'$imagePath')";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(["status" => "success", "message" => "Product Added"]);
        exit;
    } else {
        echo json_encode(["status" => "error", "message" => "Error Occured"]);
        exit;
    }
?>