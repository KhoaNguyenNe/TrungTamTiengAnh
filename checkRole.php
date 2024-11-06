function checkRole() {
    session_start();
    <!-- Kiểm tra nếu người dùng không đăng nhập hoặc không có quyền -->
    if (!isset($_SESSION['user_type']) || 
        ($_SESSION['user_type'] !== 'giangvien' && $_SESSION['user_type'] !== 'quantri')) {
            
        <!-- Chuyển hướng nếu không có quyền -->
        header('Location: index.php');
        exit;
    }
}