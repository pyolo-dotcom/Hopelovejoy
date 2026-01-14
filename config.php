<?php
// config.php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'hope_account_db';

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set charset to UTF-8
mysqli_set_charset($conn, "utf8");
?>