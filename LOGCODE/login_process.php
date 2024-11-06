<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Gửi email thông báo
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
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
            $_SESSION['email'] = $user['email'];

            // Lưu thông tin đăng nhập
            $login_time = date('Y-m-d H:i:s');
            $ip_address = $_SERVER['REMOTE_ADDR'];
            $user_agent = $_SERVER['HTTP_USER_AGENT'];

            // Ghi nhận trạng thái đăng nhập vào cơ sở dữ liệu
            $log_sql = "INSERT INTO login_logs (user_id, login_time, ip_address, user_agent) VALUES (?, ?, ?, ?)";
            $log_stmt = $conn->prepare($log_sql);
            $log_stmt->bind_param("isss", $_SESSION['user_id'], $login_time, $ip_address, $user_agent);
            $log_stmt->execute();
            $log_stmt->close();

            

            $mail = new PHPMailer(true);
            try {
                // Cấu hình SMTP
                $mail->isSMTP();                                     
                $mail->Host = 'smtp.gmail.com';                     
                $mail->SMTPAuth = true;                             
                $mail->Username = 'lucius.nuxi@gmail.com';         
                $mail->Password = 'huynhxuanchinh';         
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
                $mail->Port = 587;                                  

                // Người gửi và người nhận
                $mail->setFrom('your_email@gmail.com', 'Mailer');
                $mail->addAddress($email);                         

                // Nội dung email
                $mail->isHTML(true);                                  
                $mail->Subject = 'Thông báo đăng nhập';
                $mail->Body    = "Bạn đã đăng nhập vào tài khoản của mình lúc " . $login_time . "<br>" .
                                 "Địa chỉ IP: " . $ip_address . "<br>" .
                                 "Thiết bị: " . $user_agent;

                $mail->send();
                echo 'Email đã được gửi';
            } catch (Exception $e) {
                echo "Không thể gửi email. Lỗi: {$mail->ErrorInfo}";
            }

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
