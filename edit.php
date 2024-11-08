<?php
include 'connect.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM user WHERE id = $id");
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $stmt = $conn->prepare("update user set name = ?, email = ?, phone = ? WHERE id = ?");
    $stmt->bind_param("sssi", $fullname, $email, $phone, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sửa người dùng</title>
</head>
<body>
    <h1>Sửa người dùng</h1>
    <form method="POST">
        <label for="fullname">Họ tên:</label>
        <input type="text" name="fullname" value="<?php echo $row['name']; ?>" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
        <label for="phone">Điện thoại:</label>
        <input type="text" name="phone" value="<?php echo $row['phone']; ?>"><br>
        <input type="submit" value="Cập nhật">
    </form>
    <br>
    <a href="index.php">Trở lại danh sách người dùng</a>
</body>
</html>

<?php
$conn->close();
?>
