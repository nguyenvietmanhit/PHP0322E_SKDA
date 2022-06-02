<?php
session_start();
require_once 'connection.php';
//delete.php
// delete.php?id=2
// - Validate tham số id trên url:
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['error'] = 'Tham số id ko hợp lệ';
    header('Location: index.php');
    exit();
}
$id = $_GET['id'];
// - Truy vấn DELETE:
// + Viết truy vấn:
$sql_delete = "DELETE FROM users WHERE id = $id";
// + Thực thi truy vấn: DELETE trả về boolean
$is_delete = mysqli_query($connection, $sql_delete);
if ($is_delete) {
    $_SESSION['success'] = "Xóa user thành công";
} else {
    $_SESSION['error'] = 'Xóa user thất bại';
}
header('Location: index.php');
exit();