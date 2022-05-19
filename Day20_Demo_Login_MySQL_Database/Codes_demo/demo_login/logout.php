<?php
session_start();
//logout.php
// Xóa các session sinh ra khi đăng nhập thành công
unset($_SESSION['username']);
setcookie('username', '', time() - 1);
$_SESSION['success'] = 'Đăng xuất thành công';
header('Location: login.php');
exit();