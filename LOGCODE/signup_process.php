<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_db"; // Thay thế bằng tên cơ sở dữ liệu của bạn

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý dữ liệu khi form được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $confirm_password = $_POST['confirm_pass'];

    // Kiểm tra nếu mật khẩu và mật khẩu xác nhận khớp
    if ($password !== $confirm_password) {
        echo "<p>Mật khẩu không khớp. Vui lòng nhập lại.</p>";
        exit();
    }

    // Mã hóa mật khẩu
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Kiểm tra email đã tồn tại hay chưa
    $sql_check = "SELECT * FROM users WHERE email = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        echo "<p>Email đã tồn tại. Vui lòng sử dụng email khác.</p>";
    } else {
        // Chèn dữ liệu mới vào bảng `users`
        $sql_insert = "INSERT INTO users (email, password, name) VALUES (?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("sss", $email, $hashed_password, $name);

        if ($stmt_insert->execute()) {
           // Đăng ký thành công, chuyển hướng về trang đăng nhập
            echo "<script>
            alert('Đăng ký thành công! Đang chuyển về trang đăng nhập...');
            window.location.href = '/TRUNGTAMTIENGANH/login.php';
        </script>";
        } else {
            echo "<p>Lỗi: " . $stmt_insert->error . "</p>";
        }
        $stmt_insert->close();
    }

    $stmt_check->close();
}

$conn->close();
?>
