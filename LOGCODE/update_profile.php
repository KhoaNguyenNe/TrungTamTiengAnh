<?php
session_start();
include "../connect.php";

// Khởi tạo biến để chứa thông báo
$message = '';

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $name = isset($_POST['name']) ? trim($_POST['name']) : null;
    $password = isset($_POST['password']) ? trim($_POST['password']) : null;

    // Lấy thông tin người dùng hiện tại từ cơ sở dữ liệu để so sánh
    $sql = "SELECT name, password FROM users WHERE id = ?";
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
    if (!empty($password) && pbkdf2HashPassword($password) !== $current_password) {
        $hashed_password = pbkdf2HashPassword($password);  // Mã hóa mật khẩu mới
        $updates[] = "password = ?";
        $params[] = $hashed_password;
    }

    // Nếu có phần cập nhật, thực hiện câu lệnh SQL
    if (!empty($updates)) {
        $sql = "UPDATE users SET " . implode(", ", $updates) . " WHERE id = ?";
        $params[] = $user_id;

        // Thực hiện truy vấn cập nhật
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(str_repeat("s", count($params)), ...$params);

        if ($stmt->execute()) {
            // Cập nhật lại thông tin vào session nếu cập nhật thành công
            if (!empty($name) && $name !== $current_name) {
                $_SESSION['user_name'] = $name;  // Cập nhật tên người dùng trong session
            }

            if (!empty($password) && pbkdf2HashPassword($password) !== $current_password) {
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
