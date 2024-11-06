<?php

// Xử lý dữ liệu khi form được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $status = $_POST['status'];

    // Kiểm tra lỗi
    $errors = [];

    if (empty($fullname)) {
        $errors['fullname'] = "Họ và tên bắt buộc phải nhập";
    }

    if (empty($email)) {
        $errors['email'] = "Email bắt buộc phải nhập";
    }

    if (empty($phone)) {
        $errors['phone'] = "Số điện thoại bắt buộc phải nhập";
    }

    if (empty($password)) {
        $errors['password'] = "Mật khẩu bắt buộc phải nhập";
    }

    if ($password !== $confirm_password) {
        $errors['confirm_password'] = "Không trùng password";
    }

    // Nếu không có lỗi, xử lý thêm người dùng vào cơ sở dữ liệu
    if (empty($errors)) {
        // Kết nối cơ sở dữ liệu và thực hiện thêm người dùng
        // Giả sử bạn đã kết nối với cơ sở dữ liệu và tạo câu lệnh SQL để thêm người dùng
        // Ví dụ:
        /*
        $query = "INSERT INTO users (fullname, email, phone, password, status) VALUES (?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("sssss", $fullname, $email, $phone, password_hash($password, PASSWORD_DEFAULT), $status);
        $stmt->execute();
        */
        echo "Người dùng đã được thêm thành công!";
        // Chuyển hướng sau khi thêm thành công
        // header("Location: list.php");
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm người dùng</title>
    <style>
        .error {
            color: red;
            font-style: italic;
        }
    </style>
</head>

<body>

    <h2>Thêm người dùng mới</h2>
    <form action="add.php" method="POST">
        <label for="fullname">Họ và tên:</label><br>
        <input type="text" id="fullname" name="fullname" value="<?= isset($fullname) ? $fullname : '' ?>">
        <div class="error"><?= isset($errors['fullname']) ? $errors['fullname'] : '' ?></div><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?= isset($email) ? $email : '' ?>">
        <div class="error"><?= isset($errors['email']) ? $errors['email'] : '' ?></div><br><br>

        <label for="phone">Số điện thoại:</label><br>
        <input type="text" id="phone" name="phone" value="<?= isset($phone) ? $phone : '' ?>">
        <div class="error"><?= isset($errors['phone']) ? $errors['phone'] : '' ?></div><br><br>

        <label for="password">Mật khẩu:</label><br>
        <input type="password" id="password" name="password"><br><br>

        <label for="confirm_password">Nhập lại mật khẩu:</label><br>
        <input type="password" id="confirm_password" name="confirm_password">
        <div class="error"><?= isset($errors['confirm_password']) ? $errors['confirm_password'] : '' ?></div><br><br>

        <label for="status">Trạng thái:</label><br>
        <select id="status" name="status">
            <option value="active" <?= isset($status) && $status == 'active' ? 'selected' : '' ?>>Đã kích hoạt</option>
            <option value="inactive" <?= isset($status) && $status == 'inactive' ? 'selected' : '' ?>>Chưa kích hoạt
            </option>
        </select><br><br>

        <button type="submit">Thêm người dùng</button>
        <p>
            <a href="list.php" class="">Quay lại</a>
        </p>
    </form>

</body>

</html>