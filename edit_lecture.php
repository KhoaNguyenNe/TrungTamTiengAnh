<?php
// Database connection
include'connect.php';

session_start();
$user_role = 'teacher'; //$_SESSION['user_type'];  // Vai trò của người dùng
$user_id = 1; //$_SESSION['user_id']; // ID của người dùng hiện tại


// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the lecture ID from the URL
$lecture_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$result = $conn->query("SELECT * FROM lectures WHERE id = $lecture_id");
$lecture = $result->fetch_assoc();
// Initialize error and data variables
$errors = [];
$title = $description = $content = $teacher_id = $status = "";

if ($user_role == 'admin' || ($user_role == 'teacher' && $lecture['teacher_id'] == $user_id)) {
    // Cho phép chỉnh sửa bài giảng
    if ($lecture_id > 0) {
        $stmt = $conn->prepare("SELECT title, description, content, teacher_id, status FROM lectures WHERE id = ?");
        $stmt->bind_param("i", $lecture_id);
        $stmt->execute();
        $stmt->bind_result($title, $description, $content, $teacher_id, $status);
        $stmt->fetch();
        $stmt->close();
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get updated data from form
            $title = $_POST['title'];
            $description = $_POST['description'];
            $content = $_POST['content'];
            $teacher_id = $_POST['teacher_id'];
            $status = $_POST['status'];
    
            // Validate form data
            if (empty($title)) {
                $errors['title'] = "Tiêu đề bắt buộc phải nhập";
            }
            if (empty($description)) {
                $errors['description'] = "Mô tả bắt buộc phải nhập";
            }
            if (empty($content)) {
                $errors['content'] = "Nội dung bắt buộc phải nhập";
            }
            if (empty($teacher_id)) {
                $errors['teacher_id'] = "Giảng Viên bắt buộc phải nhập";
            }
            if (empty($status)) {
                $errors['status'] = "Trạng Thái bắt buộc phải nhập";
            }
    
            // Update the lecture if no errors
            if (empty($errors)) {
                $stmt = $conn->prepare("UPDATE lectures SET title = ?, description = ?, content = ?, teacher_id = ?, status = ? WHERE id = ?");
                $stmt->bind_param("sssiii", $title, $description, $content, $teacher_id, $status, $lecture_id);
    
                if ($stmt->execute()) {
                    echo "Bài giảng đã được cập nhật thành công!";
                    header("Location: lectures.php");
                    exit;
                } else {
                    echo "Có lỗi xảy ra khi cập nhật bài giảng: " . $conn->error;
                }
    
                $stmt->close();
            }
        }
    } else {
        echo "ID bài giảng không hợp lệ.";
    }
} else {
    echo "<script>alert('Bạn không có quyền thực hiện chức năng này'); window.location.href = 'lectures.php';</script>";
}
// Check if lecture ID is valid and retrieve data


$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa bài giảng</title>
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
        <h2>Sửa thông tin bài giảng</h2>
        <form action="" method="POST">
            <label for="title">Tiêu đề:</label>
            <input type="text" id="title" name="title" value="<?= htmlspecialchars($title) ?>">
            <div class="error"><?= isset($errors['title']) ? $errors['title'] : '' ?></div>

            <label for="description">Mô tả:</label>
            <input type="text" id="description" name="description" value="<?= htmlspecialchars($description) ?>">
            <div class="error"><?= isset($errors['description']) ? $errors['description'] : '' ?></div>

            <label for="content">Nội dung:</label>
            <input type="text" id="content" name="content" value="<?= htmlspecialchars($content) ?>">
            <div class="error"><?= isset($errors['content']) ? $errors['content'] : '' ?></div>

            <label for="teacher_id">Giảng Viên:</label>
            <input type="text" id="teacher_id" name="teacher_id" value="<?= htmlspecialchars($teacher_id) ?>">
            <div class="error"><?= isset($errors['teacher_id']) ? $errors['teacher_id'] : '' ?></div>

            <label for="status">Trạng Thái:</label>
            <input type="text" id="status" name="status" value="<?= htmlspecialchars($status) ?>">
            <div class="error"><?= isset($errors['status']) ? $errors['status'] : '' ?></div>

            <button type="submit">Cập nhật bài giảng</button>
            <p><a href="lectures.php">Quay lại</a></p>
        </form>
    </div>
</body>
</html>
