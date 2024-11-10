<?php
function generateSalt($length = 16) {
    // Tạo salt ngẫu nhiên với độ dài cho trước
    return bin2hex(random_bytes($length / 2));
}

function createHash($password) {
    $salt = generateSalt(); // Tạo salt ngẫu nhiên mới
    $hash = hash('sha256', $salt . $password); // Kết hợp salt và mật khẩu rồi mã hóa
    return $salt . $hash; // Kết quả gồm salt và hash để lưu trữ
}

function verifyPassword($password, $storedHash, $salt) {

    // Mã hóa lại mật khẩu nhập vào với salt đã lưu và so sánh với hash đã lưu
    $computedHash = hash('sha256', $salt . $password);
    return hash_equals($storedHash, $computedHash); // Trả về true nếu khớp
}


?>
