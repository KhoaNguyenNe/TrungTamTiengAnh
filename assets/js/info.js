// Hàm kiểm tra và bật/tắt nút Cập nhật
function enableUpdateButton() {
    const nameInput = document.getElementById("name").value.trim();
    const passwordInput = document.getElementById("password").value.trim();
    const updateButton = document.getElementById("updateButton");
        
    // Kích hoạt nút Cập nhật nếu tên hoặc mật khẩu mới không trống
    if (nameInput || passwordInput) {
        updateButton.disabled = false;
    } else {
        updateButton.disabled = true;
    }
}

