<?php
// Database connection
include'connect.php';

session_start();

// Lấy giá trị từ URL
$giangvien_id = isset($_GET['giangvien_id']) ? intval($_GET['giangvien_id']) : 0;

$lecture_id = $_GET['id'];
$result = $conn->query("SELECT * FROM lectures WHERE id = $lecture_id");
$lecture = $result->fetch_assoc();
$course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;
$course_result = $conn->query("SELECT * FROM khoahoc WHERE khoahoc_id = $course_id");
$course = $course_result->fetch_assoc();



// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    // Get the lecture ID from the URL
    $lecture_id = intval($_GET['id']);
    if ($course['giangvien_id'] == $giangvien_id) {
        // Cho phép xóa b giảng
         // Prepare the delete SQL statement
        $sql = "DELETE FROM lectures WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $lecture_id);
        // Execute the statement and check for success
        if ($stmt->execute()) {
            echo "<script>alert('Bài giảng đã được xóa thành công.');window.location.href = 'lectures.php?course_id=" . $course_id . "&giangvien_id=" . $giangvien_id . "';</script>";
        } else {
            echo "<script>alert('Đã xảy ra lỗi khi xóa bài giảng.'); window.location.href = 'lectures.php?course_id=" . $course_id . "&giangvien_id=" . $giangvien_id . "';</script>";
        }
    } else {
        echo "<script>alert('Bạn không có quyền thực hiện chức năng này');window.location.href = 'lectures.php?course_id=" . $course_id . "&giangvien_id=" . $giangvien_id . "';</script>";
    }
   

    

    // Close the statement
    $stmt->close();
} else {
    // Redirect if no ID is found
    header("Location: lectures.php?course_id=" . $course_id . "&giangvien_id=" . $giangvien_id);
}

// Close the database connection
$conn->close();
?>
