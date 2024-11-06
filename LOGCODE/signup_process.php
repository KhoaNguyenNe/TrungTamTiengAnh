<?php
// Hàm băm mật mã sài PBKDF2
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

// Thông tin kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_db"; // Tên cơ sở dữ liệu chứa bảng 'users'

// Kết nối tới cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra nếu dữ liệu gửi bằng phương thức POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];

    // Băm mật khẩu với PBKDF2
    $hashed_password = pbkdf2HashPassword($password);

    // Câu lệnh SQL để chèn dữ liệu vào bảng users
    $sql = "INSERT INTO users (email, password, name) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $email, $hashed_password, $name);

    // Thực thi câu lệnh và kiểm tra thành công
    if ($stmt->execute()) {
        // Đăng ký thành công, chuyển hướng về trang đăng nhập
        echo "<script>
                alert('Đăng ký thành công! Đang chuyển về trang đăng nhập...');
                window.location.href = '/TRUNGTAMTIENGANH/login.php';
              </script>";
    } else {
        echo "<script>alert('Lỗi: " . $stmt->error . "');</script>";
    }

    // Đóng kết nối
    $stmt->close();
}
$conn->close();
?>
