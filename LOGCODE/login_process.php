<?php
// Thông tin kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = ""; // Mặc định XAMPP là rỗng
$dbname = "login_db"; // Tên cơ sở dữ liệu của bạn

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
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
        if (password_verify($password, $user['password'])) {
            // Đăng nhập thành công, lưu thông tin đăng nhập vào session
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];

            // Chuyển hướng đến trang chủ
            header("Location: /TRUNGTAMTIENGANH/index.php");
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
