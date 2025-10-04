<?php
session_start();
include 'db.php';

if(!isset($_GET['id'])){
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
$res = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
$row = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<h2>Edit User</h2>
<form action="update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <label>Name:</label>
    <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>

    <label>Email:</label>
    <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>

    <label>Country:</label>
    <select name="country" id="country" required>
        <option value="">Select Country</option>
        <?php
        $countries = mysqli_query($conn, "SELECT * FROM countries");
        while($c = mysqli_fetch_assoc($countries)){
            $selected = ($c['id']==$row['country']) ? "selected" : "";
            echo "<option value='".$c['id']."' $selected>".$c['name']."</option>";
        }
        ?>
    </select><br><br>

    <label>State:</label>
    <select name="state" id="state" required>
        <option value="">Select State</option>
        <?php
        $states = mysqli_query($conn, "SELECT * FROM states WHERE country_id=".$row['country']);
        while($s = mysqli_fetch_assoc($states)){
            $selected = ($s['id']==$row['state']) ? "selected" : "";
            echo "<option value='".$s['id']."' $selected>".$s['name']."</option>";
        }
        ?>
    </select><br><br>

    <label>Current Files:</label><br>
    <?php
    $files = explode(",", $row['files']);
    foreach($files as $f){
        if(!empty($f)){
            echo "<a href='uploads/$f' target='_blank'>$f</a><br>";
        }
    }
    ?><br>

    <label>Upload New Files (Optional):</label>
    <input type="file" name="files[]" multiple><br><br>

    <input type="submit" value="Update">
</form>

<script>
$(document).ready(function(){
    $("#country").change(function(){
        var cid = $(this).val();
        $.ajax({
            url: "fetch_states.php",
            method: "POST",
            data: {country_id: cid},
            success: function(data){
                $("#state").html(data);
            }
        });
    });
});
</script>
</body>
</html>
