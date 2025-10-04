<?php
include 'db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$country = $_POST['country'];
$state = $_POST['state'];

// Handle file upload
$uploaded_files = [];
if(!empty($_FILES['files']['name'][0])){
    // Delete old files
    $old_files_res = mysqli_query($conn, "SELECT files FROM users WHERE id=$id");
    $old_files_row = mysqli_fetch_assoc($old_files_res);
    $old_files = explode(",", $old_files_row['files']);
    foreach($old_files as $of){
        if(!empty($of) && file_exists("uploads/$of")){
            unlink("uploads/$of");
        }
    }

    // Upload new files
    foreach($_FILES['files']['tmp_name'] as $key => $tmp_name){
        if($_FILES['files']['error'][$key]==0){
            $ext = pathinfo($_FILES['files']['name'][$key], PATHINFO_EXTENSION);
            $new_name = date("Ymd_His")."_".uniqid().".".$ext;
            move_uploaded_file($tmp_name,"uploads/".$new_name);
            $uploaded_files[] = $new_name;
        }
    }
    $files_str = implode(",", $uploaded_files);

    $sql = "UPDATE users SET name='$name', email='$email', country='$country', state='$state', files='$files_str' WHERE id=$id";
} else {
    $sql = "UPDATE users SET name='$name', email='$email', country='$country', state='$state' WHERE id=$id";
}

mysqli_query($conn,$sql);
header("Location:index.php");
?>
