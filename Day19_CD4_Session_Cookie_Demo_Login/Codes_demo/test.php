<?php
session_start();
//test.php
// - Sử dụng nhúng file, trong PHP có 4 hàm nhúng file:
// include, require, include_once, require_once
// Chia thành 2 nhóm include và require, khác nhau ở cơ chế
//thực thi code khi nhúng file ko tồn tại: include chỉ show ra 1
//lỗi cảnh báo -> code phía sau đoạn nhúng vẫn chạy, ngược lại
//require nó dừng
// -> ưu tiên dùng hàm require_once để nhúng file
//require_once 'session_cookie.php';
//echo $fullname;
// -> nhúng file sẽ bị xử lý thừa
// -> session, cookie sẽ đc sử dụng
// - Hiển thị session:
echo isset($_SESSION['fullname']) ? $_SESSION['fullname'] : '';
echo isset($_SESSION['age']) ? $_SESSION['age'] : '';
echo isset($_SESSION['address']) ? $_SESSION['address'] : '';
// - Demo trường hợp gây lỗi khi thao tác với session/cookie
// -> truy cập phần tử ko tồn tại, sử dụng trình duyệt ẩn
// -> sử dụng isset