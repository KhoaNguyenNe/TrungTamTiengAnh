<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ten_cua_database"; // Thay thế bằng tên cơ sở dữ liệu của bạn

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Lỗi kết nối: " . $conn->connect_error);
    }

    // Lấy thông tin từ form
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Truy vấn kiểm tra email trong cơ sở dữ liệu
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Lấy thông tin tài khoản
        $user = $result->fetch_assoc();
        
        // Kiểm tra mật khẩu (giả sử mật khẩu đã mã hóa bằng password_hash)
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            header("Location: dashboard.php"); // Chuyển hướng sau khi đăng nhập thành công
            exit();
        } else {
            echo "<p class='form-error'>Sai mật khẩu</p>";
        }
    } else {
        echo "<p class='form-error'>Email không tồn tại</p>";
    }

    $stmt->close();
    $conn->close();
}
?>
