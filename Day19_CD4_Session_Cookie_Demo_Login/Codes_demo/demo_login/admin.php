<?php
session_start();
//admin.php
// - Cần check nếu chưa đăng nhập thì ko cho truy cập trang này
//, dựa vào session username:
if (!isset($_SESSION['username'])) {
    $_SESSION['error'] = 'Bạn chưa đăng nhập, ko thể truy cập
    trang admin';
    header('Location: login.php');
    exit();
}

// - Dành cho user đăng nhập thành công
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

if (isset($_SESSION['success'])) {
    echo $_SESSION['success'] . "<br />";
    // Sau khi hiển thị session dạng flash, thì xóa luôn
    unset($_SESSION['success']);
}
echo "Chào bạn, {$_SESSION['username']}";
//echo "Chào bạn, " . $_SESSION['username'];

echo "<a href='logout.php'>Đăng xuất</a>";