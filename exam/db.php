<?php
$host = "localhost";
$user = "root";   // change if needed
$pass = "";       // change if needed
$db   = "demo_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
