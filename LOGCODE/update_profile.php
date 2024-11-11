<?php
session_start();
include "../connect.php";

// Khởi tạo biến để chứa thông báo
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $name = isset($_POST['name']) ? trim($_POST['name']) : null;
    $password = isset($_POST['password']) ? trim($_POST['password']) : null;

    // Lấy thông tin người dùng hiện tại từ cơ sở dữ liệu để so sánh
    $sql = "SELECT name, password FROM user WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($current_name, $current_password);
    $stmt->fetch();

    // Khởi tạo mảng chứa các phần cập nhật và tham số
    $updates = [];
    $params = [];

    // Kiểm tra và chỉ cập nhật tên nếu tên mới khác tên cũ
    if (!empty($name) && $name !== $current_name) {
        $updates[] = "name = ?";
        $params[] = $name;
    }

    // Kiểm tra và chỉ cập nhật mật khẩu nếu mật khẩu mới khác mật khẩu cũ
    if (!empty($password) && !hash_equals($password, $current_password)) {
        $hashed_password = md5($password);  // Mã hóa mật khẩu mới
        $updates[] = "password = ?";
        $params[] = $hashed_password;
    }

    // Nếu có phần cập nhật, thực hiện câu lệnh SQL
    if (!empty($updates)) {
        $sql = "UPDATE user SET " . implode(", ", $updates) . " WHERE id = ?";
        $params[] = $user_id;

        // Thực hiện truy vấn cập nhật
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(str_repeat("s", count($params)), ...$params);

        if ($stmt->execute()) {
            // Cập nhật lại thông tin vào session nếu cập nhật thành công
            if (!empty($name) && $name !== $current_name) {
                $_SESSION['user_name'] = $name;  // Cập nhật tên người dùng trong session
                $_SESSION['role'] = $user['user_type'];
            }

            if (!empty($password) && !hash_equals($password, $current_password)) {
                // Mật khẩu đã được cập nhật, có thể bỏ qua việc cập nhật mật khẩu trong session
                // Chỉ cần đảm bảo rằng khi người dùng đăng nhập lại, mật khẩu mới sẽ được sử dụng.
            }

            header('Location: /TRUNGTAMTIENGANH/index.php');
            exit;
        } else {
            $message = "Cập nhật thông tin thất bại.";
        }
    } else {
        $message = "Không có thông tin nào để cập nhật.";
    }
}

$stmt->close();
$conn->close();
?>
