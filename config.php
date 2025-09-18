<?php
$host = 'localhost';
$db = 'hakeem_db';
$user = 'root';
$pass = ''; // XAMPP default
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
die('DB Connection failed: ' . $conn->connect_error);
}
?>