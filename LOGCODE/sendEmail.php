<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../PHPMailer-master/src/Exception.php';
require_once '../PHPMailer-master/src/PHPMailer.php';
require_once '../PHPMailer-master/src/SMTP.php';

function sendEmailOTP($email, $otp) {
    $mail = new PHPMailer(true);

    $subject = "Xác Thực OTP Đăng Ký";
    $message = "Mã OTP của bạn là: $otp";

    try {
        // Cấu hình SMTP
        $mail->isSMTP();  // Giao thức SMTP
        $mail->Host       = 'smtp.gmail.com';  //Máy chủ STMP của Gmail
        $mail->SMTPAuth   = true;  //Bật xác thực SMTP
        $mail->Username   = 'taotenk0912@gmail.com';  // SMTP username
        $mail->Password   = 'krsxaldgjutrcodj';  // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  //Mã hóa TLS
        $mail->Port       = 465;  // SMTP port

        // Người gửi, người nhận
        $mail->setFrom('taotenk0912@gmail.com', 'Hệ thống');
        $mail->addAddress($email);

        // Nội dung email
        $mail->CharSet = 'utf-8';
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Gửi email
        $mail->send();
    } catch (Exception $e) {
        echo "Không thể gửi email OTP: {$mail->ErrorInfo}";
    }
}
?>
