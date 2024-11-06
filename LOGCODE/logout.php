<?php
// Xoá session nếu cần
session_start(); // Bắt đầu phiên làm việc
session_unset(); // Hủy tất cả các biến session
session_destroy(); // Hủy session hiện tại

// Chuyển hướng lại trang chủ mà không có tham số đăng nhập
header("Location: /TRUNGTAMTIENGANH/index.php");
exit(); // Đảm bảo không thực thi thêm mã sau khi chuyển hướng

?>
