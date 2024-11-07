<?php

    include "../connect.php";

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra xem người dùng đã gửi form đăng nhập hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Truy vấn để lấy thông tin người dùng
    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Kiểm tra nếu tìm thấy người dùng
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Xác minh mật khẩu
        if (hash_equals(md5($password), $user['password'])) {
            // Đăng nhập thành công, lưu thông tin đăng nhập vào session
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['name'] = $user['name'];  // Lưu tên người dùng vào session

            // Lưu thông tin đăng nhập
            $login_time = date('Y-m-d H:i:s');
            $ip_address = $_SERVER['REMOTE_ADDR'];
            $user_agent = $_SERVER['HTTP_USER_AGENT'];

            // Ghi nhận trạng thái đăng nhập vào cơ sở dữ liệu
            $log_sql = "INSERT INTO login_records (user_id, login_time, ip_address, user_agent) VALUES (?, ?, ?, ?)";
            $log_stmt = $conn->prepare($log_sql);
            $log_stmt->bind_param("isss", $_SESSION['user_id'], $login_time, $ip_address, $user_agent);
            $log_stmt->execute();
            $log_stmt->close();

            // Chuyển hướng đến trang chủ kèm theo trạng thái đăng nhập
            header("Location: ../index.php?status=success&user_id=" . $_SESSION['user_id']);
            exit();
        } else {
            // Mật khẩu không đúng
            echo "<p class='nhap_sai_mk'>Sai mật khẩu</p>";
        }
    } else {
        // Không tìm thấy người dùng
        echo "<p class='nhap_sai_mk'>Email không tồn tại</p>";
    }

    $stmt->close();
}

$conn->close();
?>
