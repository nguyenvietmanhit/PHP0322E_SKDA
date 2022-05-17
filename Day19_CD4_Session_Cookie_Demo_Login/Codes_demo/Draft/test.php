<?php
session_start();
//test.php
// Sử dụng lại họ tên từ file session_cookie.php?
// + Dùng cơ chế nhúng file: include, require,
//include_once, require_once
// + Bản chất nhúng file: copy nội dung file cần nhúng vào
//vị trí nhúng file
//require_once 'session_cookie.php';
//echo $fullname;
// + Nhúng file sẽ ko xử lý đc triệt để vì phải đọc toàn
//bộ nội dung file nhúng -> xử lý thừa
// Có 1000 file muốn dùng biến $fullname ? nhúng file 1000
//lần -> thủ công + thừa xử lý
// -> giải pháp: lưu fullname bằng session hoặc cookie
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

// Demo 1 trường hợp gây lỗi với session: dùng trình duyệt
//ẩn để chạy file test.php
// Trình duyệt ẩn với chrome: Ctrl + Shift + N
// Cần xử lý để chắc chắn tồn tại session r thì mới thao tác
//hiển thị ra đc
echo isset($_SESSION['fullname']) ? $_SESSION['fullname'] : ''; //
echo isset($_SESSION['age']) ? $_SESSION['age'] : '';
echo isset($_SESSION['address']) ? $_SESSION['address']: '';

// Hiển thị cookie, cần kiểm tra như session, phải tồn tại
//cookie thì mới hiển thị:
echo isset($_COOKIE['class']) ? $_COOKIE['class'] : '';
echo isset($_COOKIE['amount']) ? $_COOKIE['amount'] : '';
echo isset($_COOKIE['total']) ? $_COOKIE['total'] : '';
