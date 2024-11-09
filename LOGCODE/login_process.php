<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include "/Applications/XAMPP/xamppfiles/htdocs/TrungTamTiengAnh/connect.php";
include "/Applications/XAMPP/xamppfiles/htdocs/TrungTamTiengAnh/LOGCODE/sendEmail.php";
date_default_timezone_set('Asia/Ho_Chi_Minh');

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}


function updateOrInsertOTP($conn, $email, $otp) {
    // Kiểm tra xem email đã tồn tại trong bảng `otp` chưa
    $check_sql = "SELECT * FROM otp WHERE email = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $email);  // "s" cho email kiểu string
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    // Nếu email đã tồn tại, cập nhật OTP
    if ($result->num_rows > 0) {
        $otp_sql = "UPDATE otp SET otp = ? WHERE email = ?";
        $otp_stmt = $conn->prepare($otp_sql);
        $otp_stmt->bind_param("is", $otp, $email);  // "is" vì otp là integer và email là string
    } else {
        // Nếu email chưa tồn tại, chèn vào bảng
        $otp_sql = "INSERT INTO otp (email, otp) VALUES (?, ?)";
        $otp_stmt = $conn->prepare($otp_sql);
        $otp_stmt->bind_param("si", $email, $otp);  // "si" vì email là string và otp là integer
    }

    // Thực thi câu lệnh SQL
    $otp_stmt->execute();

    // Đóng các statement
    $check_stmt->close();
    $otp_stmt->close();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $_SESSION['email'] = $_POST['email'];
    
    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if ($user['status'] == 0) {
            $otp = rand(100000, 999999);
            updateOrInsertOTP($conn, $email, $otp);
            sendEmailOTP($email, $otp);
            echo "<script>alert('Tài khoản của bạn đã bị khóa. Vui lòng xác thực OTP để mở khóa.');</script>";
            header("Location: /TRUNGTAMTIENGANH/LOGCODE/otp_MoKhoa.php");
            exit();
        }

        else if (hash_equals(md5($password), $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['email'] = $user['email'];

            $login_time = date('Y-m-d H:i:s');
            $ip_address = $_SERVER['REMOTE_ADDR'];
            $user_agent = $_SERVER['HTTP_USER_AGENT'];

            $log_sql = "INSERT INTO login_records (user_id, login_time, ip_address, user_agent) VALUES (?, ?, ?, ?)";
            $log_stmt = $conn->prepare($log_sql);
            $log_stmt->bind_param("isss", $_SESSION['user_id'], $login_time, $ip_address, $user_agent);
            $log_stmt->execute();
            $log_stmt->close();

            header("Location: ./index.php?status=success&user_id=" . $_SESSION['user_id']);
            exit();
        } else {
            $attempt_time = date('Y-m-d H:i:s');
            $ip_address = $_SERVER['REMOTE_ADDR'];
            $user_agent = $_SERVER['HTTP_USER_AGENT'];

            $fail_log_sql = "INSERT INTO failed_login_attempts (email, attempt_time, ip_address, user_agent) VALUES (?, ?, ?, ?)";
            $fail_log_stmt = $conn->prepare($fail_log_sql);
            $fail_log_stmt->bind_param("ssss", $email, $attempt_time, $ip_address, $user_agent);
            $fail_log_stmt->execute();
            $fail_log_stmt->close();

            $fail_check_sql = "SELECT COUNT(*) AS fail_count FROM failed_login_attempts WHERE email = ? AND attempt_time > NOW() - INTERVAL 1 HOUR";
            $fail_check_stmt = $conn->prepare($fail_check_sql);
            $fail_check_stmt->bind_param("s", $email);
            $fail_check_stmt->execute();
            $fail_check_result = $fail_check_stmt->get_result();
            $fail_count_data = $fail_check_result->fetch_assoc();
            $fail_check_stmt->close();

            if ($fail_count_data['fail_count'] >= 5) {
                $update_sql = "UPDATE user SET status = 0 WHERE email = ?";
                $update_stmt = $conn->prepare($update_sql);
                $update_stmt->bind_param("s", $email);
                $update_stmt->execute();
                $update_stmt->close();

                $otp = rand(100000, 999999);
                updateOrInsertOTP($conn, $email, $otp);
                sendEmailOTP($email, $otp);

                echo "<script>alert('Tài khoản của bạn đã bị khóa. Vui lòng kiểm tra email để nhận mã OTP.');</script>";
                header("Location: /TRUNGTAMTIENGANH/LOGCODE/otp_MoKhoa.php");
                exit();
            } else {
                echo "<script>alert('Password Wrong! Please try again.');</script>";
            }
        }
    } else {
        echo "<p class='nhap_sai_mk'>Email không tồn tại</p>";
    }

    $stmt->close();
}
?>