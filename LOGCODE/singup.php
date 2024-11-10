<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    session_start();

    include "../connect.php";
    include "sendEmail.php";
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

            // Gửi OTP qua email
            sendEmailOTP($email, $otp);

            // Lưu OTP vào cơ sở dữ liệu
            $insert = "insert into otp(email, otp) values ('$email', '$otp')";
            mysqli_query($conn, $insert);

            // Lưu thông tin người dùng vào session
            $_SESSION['email'] = $email;
            $_SESSION['user'] = ['email' => $email, 'pass' => $pass, 'name' => $name, 'user_type' => $user_type];

            // Chuyển hướng đến trang xác thực OTP
            header('location: ./otp.php');
        }
    }

$conn->close();
?>