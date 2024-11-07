<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "trungtamtienganh";

$conn = new mysqli($server, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>


