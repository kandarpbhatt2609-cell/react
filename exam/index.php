<?php 
session_start();
include 'db.php'; 
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP CRUD with Captcha + File Upload + DateTime</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<h2>Add User</h2>
<form action="process.php" method="post" enctype="multipart/form-data">
    <label>Name:</label>
    <input type="text" name="name" required><br><br>

    <label>Email:</label>
    <input type="email" name="email" required><br><br>

    <label>Country:</label>
    <select name="country" id="country" required>
        <option value="">Select Country</option>
        <?php
        $res = mysqli_query($conn, "SELECT * FROM countries");
        while($row = mysqli_fetch_assoc($res)){
            echo "<option value='".$row['id']."'>".$row['name']."</option>";
        }
        ?>
    </select><br><br>

    

    <label>State:</label>
    <select name="state" id="state" required>
        <option value="">Select State</option>
    </select><br><br>

    <label>Upload Files:</label>
    <input type="file" name="files[]" multiple><br><br>

    <!-- Captcha -->
   <!-- Captcha -->
<label>Captcha:</label><br>
<img src="captcha.php?rand=<?php echo rand(); ?>" alt="captcha"><br><br>
<input type="text" name="captcha" placeholder="Enter Captcha" required><br><br>



    <input type="submit" name="save" value="Save">
</form>

<hr>
<h2>Records</h2>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th><th>Name</th><th>Email</th><th>Country</th><th>State</th><th>Files</th><th>Uploaded At</th><th>Action</th>
    </tr>
    <?php
    $sql = "SELECT u.id,u.name,u.email,c.name as country,s.name as state,u.files,u.uploaded_at 
            FROM users u 
            LEFT JOIN countries c ON u.country=c.id 
            LEFT JOIN states s ON u.state=s.id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['name']."</td>
                <td>".$row['email']."</td>
                <td>".$row['country']."</td>
                <td>".$row['state']."</td>
                <td>";
                $files = explode(",", $row['files']);
                foreach($files as $f){
                    if(!empty($f)){
                        echo "<a href='uploads/$f' target='_blank'>$f</a><br>";
                    }
                }
        echo   "</td>
                <td>".date("d-m-Y H:i:s", strtotime($row['uploaded_at']))."</td>
                <td>
                    <a href='edit.php?id=".$row['id']."'>Edit</a> | 
                    <a href='delete.php?id=".$row['id']."' onclick=\"return confirm('Are you sure?')\">Delete</a>
                </td>
              </tr>";
    }
    ?>
</table>

<script>
// dependent combobox
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
