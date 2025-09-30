<?php
    $conn = mysqli_connect("localhost:3306","root","","assigment2");
    if(!$conn) {
        echo $conn->error;
    }
?>