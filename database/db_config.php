<?php

$servername = "127.6.90.130:3306";
$username = "adminNgCQsLT";
$password = "A5NcQrqMLXKH";
$dbname = "msit";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";
