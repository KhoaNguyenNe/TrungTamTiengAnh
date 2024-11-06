<?php
    // Thông tin kết nối cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login_db"; 

    // Kết nối tới cơ sở dữ liệu
    $conn = new mysqli($servername, $username, $password, $dbname);
?>