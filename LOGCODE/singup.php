<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    session_start();

    include "../connect.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../PHPMailer-master/src/Exception.php';
    require '../PHPMailer-master/src/PHPMailer.php';
    require '../PHPMailer-master/src/SMTP.php';

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = md5($_POST["pass"]);
        $user_type = "Học viên";

        $select = "select * from user where email = '$email'";

        $rs = mysqli_query($conn, $select);

       
        //Nếu đã có TK
        if(mysqli_num_rows($rs) > 0)
        {
            ?> 
            <script>
                alert("Email đã tồn tại")
            </script>
            <?php
        }
        else
        {
            //Tạo OTP
            $otp = rand(100000, 999999);

            $subject = "Xác Thực OTP Đăng Ký";
            $message = "Mã OTP của bạn là: $otp";

            $mail = new PHPMailer(true);

            try {

                //Cấu hình
                $mail->isSMTP();  //Giao thức SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'taotenk0912@gmail.com';                     //SMTP username
                $mail->Password   = 'krsxaldgjutrcodj';                          //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465; 

                //Người gửi, người nhận
                $mail->setFrom('taotenk0912@gmail.com','Hệ thống');
                $mail->addAddress($email, $name);

                //Nội dung gửi
                $mail->CharSet = 'utf-8';
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body = $message;

                $mail->send();

                $insert = "insert into otp(email, otp) values ('$email', '$otp')";
                mysqli_query($conn, $insert);
                
                $_SESSION['email'] = $email;
                $_SESSION['user'] = ['email' => $email, 'pass' => $pass, 'name' => $name, 'user_type' => $user_type];
                header('location: ./otp.php');


            } catch(Exception $e) {
                ?>
                <script>
                    alert("Tin nhắn không được gửi. Mailer Error: {$mail->?ErrorInfo}");
                </script>
                <?php
            }

            
            
        }
    }

$conn->close();
?>