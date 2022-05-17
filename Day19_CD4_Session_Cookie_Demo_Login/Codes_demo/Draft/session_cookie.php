<!--session_cookie.php-->
<?php
session_start();
// SESSION VÀ COOKIE TRONG PHP
// - Là biến kiểu mảng, dùng để lưu trữ giá trị
// - $_SESSION: lưu thông tin của toàn bộ session trên hệ thống
// - $_COOKIE: lưu thông tin của toàn bộ cookie trên hệ thống
// Trường hợp sử dụng:
$fullname = 'manhnv';
echo "Họ tên: $fullname";
// Muốn sử dụng lại họ tên ở file khác thì làm thế nào ?
// Tạo 1 file test.php cùng cấp với file session_cookie.php
// - Session cookie cho phép sử dụng lại thông tin ở mọi
//nơi trên hệ thống: khởi tạo 1 lần, dùng đc ở mọi nơi
// 1 - Session:
// + Được lưu trữ bởi mảng $_SESSION, muốn sử dụng đc biến này
// thì cần khởi tạo nó trước, phải khởi tạo ở trên đầu file
// + Lưu trữ trên server, có tính bảo mật, user ko thể biết đc
//1 web đang lưu các session nào, các domain khác nhau sẽ lưu
//session độc lập với nhau
// + Sử dụng session: phiên làm việc: đăng nhập, giỏ hàng ...
// + Session sẽ mất khi bị xóa thủ công hoặc đóng trình duyệt
// - Thao tác với session: giống hệt thao tác với mảng
// + Thêm session:
$_SESSION['address'] = 'Hà Nội';
$_SESSION['fullname'] = 'manhnv';
$_SESSION['age'] = 32;
// + Xóa session:
unset($_SESSION['age']);
// Xóa toàn bộ session, cần chú ý khi sử dụng vì phải chạy lần
//thứ 2 thì mới xóa hết đc
//session_destroy();
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
// 3 - Cookie:
// + Được lưu trữ bởi mảng $_COOKIE
// + Được lưu trên trình duyệt, xem đc cookie trên trình duyệt
// Truy cập trang vnexpress.net, mở Inspect -> Application ->
//Storage -> Cookies
// + Mục đích chính: quảng cáo, tăng tốc độ tải trang
// + Mất đi khi hết thời gian sống, ko tự mất đi khi đóng trình
//duyệt
echo '<br />';
// - Thao tác với cookie:
//  + Thêm cookie:
// $_COOKIE['class'] = 'php0422e2'; ko đc thêm kiểu này
// Thời gian sống tính bằng giây, tính từ thời điểm hiện tại
setcookie('class', 'php0422e2', time() + 60);
setcookie('amount', 100, time() + 3600);
setcookie('total', 200, time() + 7200);
// + Xóa cookie: ko dùng hàm unset
//  cần set thời gian sống về số âm
setcookie('total', '', time() - 1);
echo '<pre>';
print_r($_COOKIE);
echo '</pre>';
// 4 - Giống và khác nhau giữa session và cookie
// + Giống:
// Đều dùng để lưu trữ thông tin, theo cơ chế khởi tạo 1 lần,
// truy cập từ mọi nơi trên hệ thống
// + KHác:
// - session lưu trên server, cookie lưu trên trình duyệt ->
//session bảo mật hơn cookie
// - session mất đi khi đóng trình duyệt, cookie thì ko
// - session cần khởi tạo mới sử dụng đc, cookie thì ko
?>