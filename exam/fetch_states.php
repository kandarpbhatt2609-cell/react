<?php
include 'db.php';
if(isset($_POST['country_id'])){
    $cid = $_POST['country_id'];
    $res = mysqli_query($conn, "SELECT * FROM states WHERE country_id=$cid");
    echo "<option value=''>Select State</option>";
    while($row = mysqli_fetch_assoc($res)){
        echo "<option value='".$row['id']."'>".$row['name']."</option>";
    }
}
?>
