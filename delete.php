<?php
include 'connect.php';

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM user WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

header("Location: list.php");
?>

<?php
$conn->close();
?>
