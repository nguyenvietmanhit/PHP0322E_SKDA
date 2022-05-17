<?php
session_start();
//session_cookie.php
// 1 - Tổng quan về session cookie
// + Đều dùng để lưu trữ thông tin (giống hệt biến)
// VD:
$fullname = 'manhnv';
echo "Tại file session_cookie.php, biến fullname = $fullname";
// -> muốn sử dụng biến $fullname ở file khác thì làm ntn ?
// Tạo 1 file test.php, cùng cấp file hiện tại
// + Thông tin đc lưu bởi session, cookie có thể đc truy cập
//từ mọi nơi trên hệ thống: khởi tạo 1 lần, truy cập từ mọi nơi
// 2 - Session:
// + PHP tạo ra sẵn 1 biến mảng lưu toàn bộ thông tin của session
//trên hệ thống: $_SESSION
// + Bắt buộc phải có bước khởi tạo thì mới dùng đc biến $_SESSION,
//cần khởi tạo ở đầu file
// + Lưu trên server, vd: user ko thể biết đc trang vnxpress.net
//đang có session nào -> bảo mật
// + Tự động mất đi khi đóng trình duyệt
// + Một số chức năng: đăng nhập, giỏ hàng
// - Thao tác với session: giống hệt thao tác với mảng
// + Thêm session:
$_SESSION['address'] = 'Hà Nội';
$_SESSION['age'] = 32;
$_SESSION['fullname'] = 'manhnv';
// + Hiển thị:
// + Xóa session:
unset($_SESSION['age']);
// Xóa toàn bộ session đang có trên hệ thống:
// session_destroy();
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

echo "<br />";
//3 - Cookie:
// + PHP tạo sẵn 1 mảng để lưu toàn bộ cookie đang có trên hệ thống
// $_COOKIE
// + Ko phải khởi tạo, mà dùng đc luôn
// + Đc lưu trên trình duyệt, user có thể biết đc 1 trang web
//lưu cookie gì
// Cách ktra: sử dụng Inspect HTML -> Application -> Storage
// -> Cookies, tìm theo Domain đang truy cập
//// + Chức năng: quảng cáo, tăng tốc độ truy cập trang
// + Ko tự mất đi khi đóng trình duyệt, phụ thuộc vào thời gian
//sống lúc sinh ra
// - Thao tác với cookie:
// + Thêm mới cookie:
 //$_COOKIE['test1'] = 'test1'; ko sử dụng đc cách này
setcookie('test1', 'value 1', time() + 3600);
setcookie('test2', 'value 2', time() + 10);
setcookie('test3', 'value 3', time() + 60);
// + Hiển thị: giống như session, cần chắc chắn tồn tại thì mới
//hiển thị đc
// + Xóa cookie:
setcookie('test1', '', time() - 1);
echo '<pre>';
print_r($_COOKIE);
echo '</pre>';

// 4 - Giống và khác nhau giữa session cookie
// + Giống:
// Đều dùng để lưu trữ thông tin, đều có thể đc truy cập đc từ
//mọi nơi hệ thống sau khi khởi tạo
// + Khác:
// - Session mất đi đóng trình duyệt, cookie thì ko
// - Session cần phải khởi tạo mới sử dụng đc, cookie thì ko
// - Session lưu trên server, cookie thì lưu trên trình duyệt
// - Session bảo mật hơn cookie

