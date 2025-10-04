<?php
include 'db.php';

if(!isset($_GET['id'])){
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

// Delete files from server
$res = mysqli_query($conn,"SELECT files FROM users WHERE id=$id");
$row = mysqli_fetch_assoc($res);
$files = explode(",", $row['files']);
foreach($files as $f){
    if(!empty($f) && file_exists("uploads/$f")){
        unlink("uploads/$f");
    }
}

// Delete user record
mysqli_query($conn,"DELETE FROM users WHERE id=$id");
header("Location:index.php");
?>
