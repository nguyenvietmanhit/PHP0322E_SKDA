<?php
session_start();
//logout.php
// Xóa các session sinh ra khi đăng nhập thành công
unset($_SESSION['username']);

$_SESSION['success'] = 'Đăng xuất thành công';
header('Location: login.php');
exit();