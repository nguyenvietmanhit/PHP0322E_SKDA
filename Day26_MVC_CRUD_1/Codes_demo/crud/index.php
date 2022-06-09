<?php
//crud/index.php
// - File index gốc là file đầu tiên sẽ code trong mô
// hình MVC
// - Là nơi đầu tiên nhận request từ user gửi lên, file này
//phân tích url để gọi đúng controller tương ứng xử lý
// -> để chạy 1 ứng dụng MVC, bắt buộc phải chạy từ file index
// gốc này
// - Một số chuẩn từ ng triển khai mô hình MVC này:
// + Mọi url phải có dạng:
//index.php?controller=<tên-controller>&action=<tên-PT-controller>
// index.php?controller=category&action=create
// + Tên file controller bắt buộc phải:<tên-controller>Controller.php
// - Code:
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
//echo date('d-m-Y H:i:s');
// index.php?controller=category&action=create
// + Phân tích url lấy ra controller và action:
$controller = isset($_GET['controller'])
    ? $_GET['controller'] : 'home'; //category
$action = isset($_GET['action']) ? $_GET['action'] : 'index'; //create
// + Chuyển đổi controller thành tên file controller tương ứng
//để cbi nhúng file controller: category -> CategoryController
$controller = ucfirst($controller); //Category
$controller .= "Controller";
// + Nhúng file controller tương ứng, có ktra điều kiện tồn tại:
// Tư duy nhúng file trong MVC: luôn phải đứng từ file index gốc
//để nhúng
$controller_path = "controllers/$controller.php";
if (!file_exists($controller_path)) {
    die('Trang bạn tìm ko tồn tại');
}
require_once $controller_path;
// + Khởi tạo obj từ class controller tương ứng
$obj = new $controller();
// + Gọi phương thức để thực thi chức năng
if (!method_exists($obj, $action)) {
    die("Class $controller ko tồn tại phương thức $action");
}
$obj->$action();
// index.php?controller=category&action=create
//http://localhost/PHP0322E_SKDA/Day25_MVC_CRUD/Codes_demo/crud/index.php?controller=category&action=create
?>