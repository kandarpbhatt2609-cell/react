<?php
session_start();
include 'db.php';

if(isset($_POST['save'])){
    // Validate captcha
    if(!isset($_POST['captcha']) || strtoupper($_POST['captcha']) != $_SESSION['captcha_code']){
        die("Captcha does not match. <a href='index.php'>Try again</a>");
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $state = $_POST['state'];

    // File upload
    $uploaded_files = [];
    if(!empty($_FILES['files']['name'][0])){
        foreach($_FILES['files']['tmp_name'] as $key => $tmp_name){
            if($_FILES['files']['error'][$key] == 0){
                $ext = pathinfo($_FILES['files']['name'][$key], PATHINFO_EXTENSION);
                $new_name = date("Ymd_His") . "_" . uniqid() . "." . $ext;
                move_uploaded_file($tmp_name, "uploads/" . $new_name);
                $uploaded_files[] = $new_name;
            }
        }
    }
    $files_str = implode(",", $uploaded_files);
    $uploaded_at = date("Y-m-d H:i:s"); // current date & time

    $sql = "INSERT INTO users(name,email,country,state,files,uploaded_at) 
            VALUES('$name','$email','$country','$state','$files_str','$uploaded_at')";
    mysqli_query($conn, $sql);
    header("Location: index.php");
}
?>
