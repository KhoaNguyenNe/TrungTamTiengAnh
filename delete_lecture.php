<?php
// Database connection
include'connect.php';

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    // Get the lecture ID from the URL
    $lecture_id = intval($_GET['id']);

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

    // Close the statement
    $stmt->close();
} else {
    // Redirect if no ID is found
    header("Location: lectures.php");
}

// Close the database connection
$conn->close();
?>
