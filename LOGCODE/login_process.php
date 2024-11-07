<?php

    include "../connect.php";
    date_default_timezone_set('Asia/Ho_Chi_Minh');  // Đặt múi giờ là giờ Việt Nam
// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Hàm băm mật khẩu PBKDF2
function pbkdf2HashPassword($password, $salt = null, $iterations = 10000, $keyLength = 64) {
    if ($salt === null) {
        $salt = bin2hex(random_bytes(16)); // Tạo salt 32 ký tự
    }

    // Sử dụng hàm hash_pbkdf2 để tạo ra khóa
    $hash = hash_pbkdf2(
        'sha256', // Thuật toán băm
        $password, // Mật khẩu
        $salt, // Salt
        $iterations, // Số lần lặp
        $keyLength, // Độ dài khóa
        false // Trả về dưới dạng chuỗi hex
    );

    // Trả về mật khẩu đã băm cùng với salt
    return $salt . $hash;
}

// Kiểm tra xem người dùng đã gửi form đăng nhập hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Truy vấn để lấy thông tin người dùng
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Kiểm tra nếu tìm thấy người dùng
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Xác minh mật khẩu
        if (pbkdf2HashPassword($password, substr($user['password'], 0, 32)) === $user['password']) {
            // Đăng nhập thành công, lưu thông tin đăng nhập vào session
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['email'] = $user['email'];

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
            header("Location: /TRUNGTAMTIENGANH/index.php?status=success&user_id=" . $_SESSION['user_id']);
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