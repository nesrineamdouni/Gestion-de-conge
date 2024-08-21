<?php
$servername = "";
$username = "root";
$password = "";
$dbname = "gestion_congee";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>