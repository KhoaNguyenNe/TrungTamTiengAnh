<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
       
        <title>Từ vựng</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f4f4f4;
    }
    .container {
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 300px;
    }
    input[type="password"], input[type="text"] {
      width: 100%;
      padding: 10px 0 10px 0;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    button {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background-color: #45a049;
    }
    .message {
      color: red;
      margin-top: 10px;
      font-size: 14px;
    }
  </style>
</head>
<body>
    
  <div class="container" id="password-form">
    <h2>Đăng Nhập</h2>
    <label for="password">Mật khẩu:</label>
    <input type="password" id="password" placeholder="Nhập mật khẩu của bạn" />
    <label for="password">Nhập mật khẩu để nhận mã OTP</label>
    <button onclick="validatePassword()">Gửi</button>
    <p class="message" id="error-message"></p>
  </div>

  <div class="container" id="otp-form" style="display:none;">
    <h2>Xác Thực OTP</h2>
    <label for="otp">Mã OTP:</label>
    <input type="text" id="otp" placeholder="Nhập mã OTP" />
    <button onclick="validateOTP()">Xác nhận OTP</button>
    <p class="message" id="otp-message"></p>
  </div>

  <script>
    // Mật khẩu giả lập để kiểm tra
    const correctPassword = "123456";  // Đây chỉ là ví dụ, không nên dùng trong thực tế

    // Mã OTP giả lập
    const generatedOTP = "987654";

    // Kiểm tra mật khẩu người dùng nhập vào
    function validatePassword() {
      const password = document.getElementById("password").value;
      const errorMessage = document.getElementById("error-message");

      if (password === correctPassword) {
        // Hiện thị form OTP nếu mật khẩu đúng
        document.getElementById("password-form").style.display = "none";
        document.getElementById("otp-form").style.display = "block";
        errorMessage.textContent = "";
      } else {
        // Hiển thị thông báo lỗi nếu mật khẩu sai
        errorMessage.textContent = "Mật khẩu không đúng, vui lòng thử lại.";
      }
    }

    // Kiểm tra mã OTP người dùng nhập vào
    function validateOTP() {
      const otp = document.getElementById("otp").value;
      const otpMessage = document.getElementById("otp-message");

      if (otp === generatedOTP) {
        otpMessage.textContent = "Thanh toán thành công!";
        otpMessage.style.color = "green";
        setTimeout(function() {
            window.location.href = "./index.php";  // Thay đổi URL đến trang bạn muốn chuyển hướng
        }, 2000);
        
      } else {
        otpMessage.textContent = "Mã OTP không đúng, vui lòng thử lại.";
        otpMessage.style.color = "red";
      }
    }
  </script>
 
           

</body>
</html>
