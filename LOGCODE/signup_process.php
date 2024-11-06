<?php

    include "../connect.php";

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

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if(isset($_POST['dangky']))
    {
        $email = $_POST['email'];
        $pass = pbkdf2HashPassword($_POST["pass"]);
        $name = $_POST['name'];
        $user_type = "Học viên";

        $select = "select * from users where email = '$email'";

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
            //Thời gian tồn tại của OTP là 3p
            $otp_expiry = date("y-m-d H:i:s", strtotime("+3 phút"));

            $subject = "OTP";

            $insert = "insert into users(email, password, name, user_type) values ('$email', '$pass', '$name', '$user_type')";
            mysqli_query($conn, $insert);
            
        }
    }

$conn->close();
?>
