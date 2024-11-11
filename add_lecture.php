<?php
include'connect.php';

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$giangvien_id = isset($_GET['giangvien_id']) ? intval($_GET['giangvien_id']) : 0;
$course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;

// Kiểm tra giá trị của course_id
if ($course_id <= 0) {
    echo "Mã khóa học không hợp lệ. Giá trị của course_id: " . $_GET['course_id']; // Hiển thị giá trị course_id từ URL để debug
    exit;
}

// Kiểm tra khóa học
$course_result = $conn->query("SELECT * FROM khoahoc WHERE khoahoc_id = $course_id");

// Kiểm tra nếu có lỗi trong câu truy vấn
if (!$course_result) {
    echo "Lỗi truy vấn: " . $conn->error;
    exit;
}

$course = $course_result->fetch_assoc();

// Xử lý khi form được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $title = $_POST['title'];
    $description = $_POST['description'];
    $content = $_POST['content'];
    $status = $_POST['status'];

    // Kiểm tra lỗi
    $errors = [];

    if (empty($title)) {
        $errors['title'] = "Tiêu đề bắt buộc phải nhập";
    }
    if (empty($description)) {
        $errors['description'] = "Mô tả bắt buộc phải nhập";
    }
    if (empty($content)) {
        $errors['content'] = "Nội dung bắt buộc phải nhập";
    }
    if (empty($status)) {
        $errors['status'] = "Trạng Thái bắt buộc phải nhập";
    }

    // Thêm dữ liệu vào cơ sở dữ liệu nếu không có lỗi
    if (empty($errors)) {
        // Gán thời gian hiện tại vào biến $updated_at
        $updated_at = date("Y-m-d H:i:s"); // Định dạng phù hợp cho kiểu DATETIME
    
        // Chuẩn bị câu lệnh với các tham số đã được thêm vào
        $stmt = $conn->prepare("INSERT INTO lectures (title, description, content, updated_at, status, khoahoc_id) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssisi", $title, $description, $content, $updated_at, $status, $course_id);
    
        if ($stmt->execute()) {
            echo "Bài giảng đã được thêm thành công!";
            // Chuyển hướng đến trang quản lý bài giảng
            header("Location: lectures.php?course_id=" . $course_id . "&giangvien_id=" . $giangvien_id);
            exit;
        } else {
            echo "Có lỗi xảy ra khi thêm bài giảng: " . $conn->error;
        }
    
        $stmt->close();
    }
    
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm bài giảng</title>
    <style>
        /* General styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Form container */
        .form-container {
            background: #fff;
            padding: 20px 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        /* Form elements */
        label {
            font-weight: bold;
            margin-top: 15px;
            display: block;
        }

        input[type="text"],
        button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        /* Button styling */
        button {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border: none;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Error messages */
        .error {
            color: red;
            font-size: 0.9em;
            margin-top: -10px;
            margin-bottom: 10px;
        }

        /* Link styling */
        a {
            color: #333;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Thêm bài giảng mới</h2>
        <form action="add_lecture.php?giangvien_id=<?php echo $giangvien_id; ?>&course_id=<?php echo $course_id; ?>" method="POST">
            <label for="title">Tiêu đề:</label>
            <input type="text" id="title" name="title" value="<?= isset($title) ? $title : '' ?>">
            <div class="error"><?= isset($errors['title']) ? $errors['title'] : '' ?></div>

            <label for="description">Mô tả:</label>
            <input type="text" id="description" name="description" value="<?= isset($description) ? $description : '' ?>">
            <div class="error"><?= isset($errors['description']) ? $errors['description'] : '' ?></div>

            <label for="content">Nội dung:</label>
            <input type="text" id="content" name="content" value="<?= isset($content) ? $content : '' ?>">
            <div class="error"><?= isset($errors['content']) ? $errors['content'] : '' ?></div>

            <label for="status">Trạng Thái:</label>
            <input type="text" id="status" name="status" value="<?= isset($status) ? $status : '' ?>">
            <div class="error"><?= isset($errors['status']) ? $errors['status'] : '' ?></div>

            <button type="submit">Thêm bài giảng</button>
            <p><a href="lectures.php?course_id=<?php echo $course_id; ?>&giangvien_id=<?php echo $giangvien_id; ?>">Quay lại</a></p>
        </form>
    </div>
</body>
</html>
