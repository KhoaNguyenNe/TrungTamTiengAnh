<!-- <?php
// // Các địa chỉ IP bị loại trừ sẽ không được kiểm tra tần suất yêu cầu
// // $excluded_ips = ['127.0.0.1', 'localhost'];

<<<<<<< HEAD
// Đường dẫn đến các tệp
$LogPath = 'C:\xampp\htdocs\TrungTamTiengAnh\file_log\log.txt'; // cho file log, cần tạo
$htaccessPath = './.htaccess'; // file .htaccess gốc

// Tham số giới hạn
$limit = 100;        // Số lượng yêu cầu được phép
$time_limit = 1;   // Thời gian tính bằng giây để kiểm tra tần suất yêu cầu
=======
// // Đường dẫn đến các tệp
// $LogPath = './file_log/log.txt'; // cho file log, cần tạo
// $htaccessPath = './.htaccess'; // file .htaccess gốc

// // Tham số giới hạn
// $limit = 10;        // Số lượng yêu cầu được phép
// $time_limit = 10;   // Thời gian tính bằng giây để kiểm tra tần suất yêu cầu
>>>>>>> 54c3e0a75bcec87d0a5f401b879d05904d258da0

// $ip = $_SERVER['REMOTE_ADDR'];

// // if (in_array($ip, $excluded_ips)) {
// // 	return;
// // }

// $db = new mysqli('localhost', 'root', '', 'trungtamtienganh'); // ĐIỀN VÀO
// if ($db->connect_error) {
// 	die("Lỗi kết nối: " . $db->connect_error);
// }

// $current_time = time();

// $request_type = $_SERVER['REQUEST_METHOD'];
// $request_data = json_encode($_REQUEST);
// $log_entry = date("Y-m-d H:i:s") . " | Loại: $request_type | IP: $ip | Dữ liệu: $request_data\n";
// file_put_contents($LogPath, $log_entry, FILE_APPEND);

// $time_window_start = $current_time - $time_limit;
// $stmt = $db->prepare("DELETE FROM antiddos WHERE time < ?");
// $stmt->bind_param("i", $time_window_start);
// $stmt->execute();
// $stmt->close();

// $stmt = $db->prepare("SELECT COUNT(*) FROM antiddos WHERE ip = ? AND time >= ?");
// $stmt->bind_param("si", $ip, $time_window_start);
// $stmt->execute();
// $stmt->store_result();
// $stmt->bind_result($request_count);
// $stmt->fetch();

// if ($request_count >= $limit) {
// 	$block_entry = "Deny from $ip\n";
// 	file_put_contents($htaccessPath, $block_entry, FILE_APPEND | LOCK_EX);
// 	die("IP của bạn đã bị chặn do yêu cầu quá thường xuyên.");
// }

// $stmt = $db->prepare("INSERT INTO antiddos (ip, time) VALUES (?, ?)");
// $stmt->bind_param("si", $ip, $current_time);
// $stmt->execute();
// $stmt->close();
// $db->close();
?> -->
