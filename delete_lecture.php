<?php
// Database connection
include'connect.php';

session_start();
$user_role = 'teacher'; //$_SESSION['user_type'];  // Vai trò của người dùng
$user_id = 1; //$_SESSION['user_id']; // ID của người dùng hiện tại

$lecture_id = $_GET['id'];
$result = $conn->query("SELECT * FROM lectures WHERE id = $lecture_id");
$lecture = $result->fetch_assoc();




// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    // Get the lecture ID from the URL
    $lecture_id = intval($_GET['id']);
    if ($user_role == 'admin' || ($user_role == 'teacher' && $lecture['teacher_id'] == $user_id)) {
        // Cho phép xóa b giảng
         // Prepare the delete SQL statement
        $sql = "DELETE FROM lectures WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $lecture_id);
        // Execute the statement and check for success
        if ($stmt->execute()) {
            echo "<script>alert('Bài giảng đã được xóa thành công.'); window.location.href = 'lectures.php';</script>";
        } else {
            echo "<script>alert('Đã xảy ra lỗi khi xóa bài giảng.'); window.location.href = 'lectures.php';</script>";
        }
    } else {
        echo "<script>alert('Bạn không có quyền thực hiện chức năng này'); window.location.href = 'lectures.php';</script>";
    }
   

    

    // Close the statement
    $stmt->close();
} else {
    // Redirect if no ID is found
    header("Location: lectures.php");
}

// Close the database connection
$conn->close();
?>
