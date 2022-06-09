<?php
// crud/index.php
// - File index gốc là file sẽ
// code đầu tiên trong mô hình MVC
// - Trong mô hình MVC, file index gốc này là nơi đầu tiên nhận
//request từ user gửi lên, sau đó phân tích url gửi lên để gọi
//đúng controller và phương thức tương ứng trong controller đó
// - Một số chuẩn đc định nghĩa bởi ng triển khai MVC:
// + Url phải có dạng sau:
// index.php?controller=category&action=create
// + Nếu file mà chứa class thì bắt buộc tên file phải trùng
//tên class
// + Tên file controller bắt buộc phải có dạng sau:
// CategoryController, UserController, ProductController ...
// - Code:
// index.php?controller=category&action=create
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
// echo date('d-m-Y H:i:s');
// + Phân tích url để lấy ra controller và action:
$controller = isset($_GET['controller'])
    ? $_GET['controller'] : 'product'; //category
$action = isset($_GET['action'])
    ? $_GET['action'] : 'index'; //create
// + Chuyển đổi controller thành tên file controller tương ứng
//để thực hiện nhúng file: category -> CategoryController
$controller = ucfirst($controller); //Category -> CategoryController
$controller .= "Controller"; //CategoryController
// Tư duy nhúng file trong mô hình MVC, luôn luôn phải tư duy là
//đứng từ file index gốc để nhúng file
$controller_path = "controllers/$controller.php";
// Ktra nếu đường dẫn ko tồn tại thì báo lỗi:
if (!file_exists($controller_path)) {
    die("Trang bạn tìm ko tồn tại");
}
require_once $controller_path;
// - Tạo đối tượng từ class bên trong file controller
$obj = new $controller();
// - Dùng obj gọi phương thức tương ứng dựa vào tham số action
//trên url
if (!method_exists($obj, $action)) {
    die("Class $controller ko tồn tại phương thức $action");
}
$obj->$action();




