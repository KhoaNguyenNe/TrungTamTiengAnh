<?php
<<<<<<<<< Temporary merge branch 1
$server = "localhost";
$username = "root";
$password = "";
$database = "login_db";

$conn = new mysqli($server, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
=========
    // Thông tin kết nối cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "english_center"; 
>>>>>>>>> Temporary merge branch 2

    // Kết nối tới cơ sở dữ liệu
    $conn = new mysqli($servername, $username, $password, $dbname);
?>