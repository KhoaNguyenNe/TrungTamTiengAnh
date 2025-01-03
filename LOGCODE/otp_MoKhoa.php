<?php
session_start();

include '../connect.php';

if(isset($_SESSION['email']))
{

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_otp = $_POST['otp'];
        $email = $_SESSION['email'];
    
        $sql = "SELECT * FROM otp WHERE email='$email'";
        $query = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($query);
    
        if ($data) {
            $_SESSION['email'] = $data['email'];
            unset($_SESSION['email']);
            
            $delete = "DELETE FROM otp WHERE email='$email'";
            mysqli_query($conn, $delete);

            $update_sql = "UPDATE user SET status = 1 WHERE email = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("s", $email);
            $update_stmt->execute();
            $update_stmt->close();

            // Xóa các bản ghi đăng nhập thất bại của email đó
            $delete_fail_attempts_sql = "DELETE FROM failed_login_attempts WHERE email = ?";
            $delete_fail_attempts_stmt = $conn->prepare($delete_fail_attempts_sql);
            $delete_fail_attempts_stmt->bind_param("s", $email);
            $delete_fail_attempts_stmt->execute();
            $delete_fail_attempts_stmt->close();

            echo "<script>alert('Xác thực OTP thành công. Tài khoản của bạn đã được mở khóa.');</script>";
            header("Location: ../forgotpsw.php");
            exit();
        } else {
            echo "<script> alert('Invalid OTP. Please try again.');</script>";
        }
    }
} else {
    echo "<script> alert('KHÔNG TỒN TẠI SESSION');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Two-Step Verification</title>
    <style type="text/css">
        #container{
            border: 1px solid black;
            width: 400px;
            margin-left: 400px;
            margin-top: 50px;
            height: 330px;
        }
        form{
            margin-left: 50px;
        }
        p{
            margin-left: 50px;
        }
        h1{
            margin-left: 50px;
        }
        input[type=number]{
            width: 290px;
            padding: 10px;
            margin-top: 10px;
        }
        button{
            background-color: orange;
            border: 1px solid orange;
            width: 100px;
            padding: 9px;
            margin-left: 100px;
        }
        button:hover{
            cursor: pointer;
            opacity: .9;
        }
    </style>
</head>
<body>
    <div id="container">
        <?php
        if(isset($_SESSION['trangthaidangnhap'])) {
            if ($_SESSION['trangthaidangnhap'] == 'khoatk'){
                echo "<script>alert('Bạn đã đăng nhập sai 5 lần nên tài khoản sẽ bị khoá');</script>";
            }
        }
        ?>
        <h1>Tài khoản đã bị khoá vui lòng nhập OTP để mở</h1>
        <p>Enter the 6 Digit OTP Code that has been sent <br> to your email address: <?php echo htmlspecialchars($_SESSION['email']); ?></p>
        <form method="post" action="otp_MoKhoa.php">
            <label style="font-weight: bold; font-size: 18px;" for="otp">Enter OTP Code:</label><br>
            <input type="number" name="otp" pattern="\d{6}" placeholder="Six-Digit OTP" required><br><br>
            <button type="submit">Verify OTP</button>
        </form>
    </div>
</body>
</html>
