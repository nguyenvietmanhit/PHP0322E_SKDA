<?php
//connection.php
// 1 - Kết nối CSDL MySQL từ PHP:
// - KẾt nối sử dụng thư viện của bên thứ 3:
// + MySQLi:
// - Dễ tiếp cận hơn PDO vì có cả 2 hướng code: PHP thuần và OOP
// - Chỉ hỗ trợ kết nối tới 1 CSDL duy nhất là MySQL
// + PDO
// - Chỉ code theo hướng OOP -> khó tiếp cận
// - Hỗ trợ kết nối tới nhiều CSDL khác nhau
// - Ưu tiên hơn MySQLi
// - Cài XAMPP tự cài hết cả 2 thư viện và enable
// 2 - Code khởi tạo kết nối:
// + Tên máy chủ chứa CSDL:
const DB_HOST = 'localhost';
// + Username đăng nhập vào CSDL:
const DB_USERNAME = 'root'; // XAMPP tạo sẵn
// + Password tương ứng với username:
const DB_PASSWORD = ''; // XAMPP tạo sẵn
// + TÊn CSDL muốn kết nối:
const DB_NAME = 'php0322e';
// + Cổng CSDL muốn kết nối:
const DB_PORT = 3306;

$connection = mysqli_connect(DB_HOST, DB_USERNAME,
DB_PASSWORD, DB_NAME, DB_PORT);
if (!$connection) {
    die("Lỗi kết nối: " . mysqli_connect_error());
}
echo 'Kết nối CSDL thành công';
// Bảng categories: id, name, description, created_at
// 3 - Truy vấn INSERT
// B1: Viết truy vấn:
$sql_insert = "INSERT INTO categories(name, description)
VALUES('Xe máy', 'Mô tả danh mục xe máy')";
// B2: Thực thi truy vấn: INSERT trả về kiểu boolean
$is_insert = mysqli_query($connection, $sql_insert);
var_dump($is_insert);
// - Cách debug khi false: copy câu truy vấn, chạy trực tiếp
// trên PHPMyadmin để xem lỗi

// 4 - Truy vấn UPDATE: cập nhật tên = def, giá = 321 cho sp
// có id = 2
// B1: Viết truy vấn:
$sql_update = "UPDATE products SET name = 'def', price = 123
WHERE id = 2";
// B2: Thực thi truy vấn: UPDATE trả về boolean
$is_update = mysqli_query($connection, $sql_update);
var_dump($is_update);
// 5 - Truy vấn DELETE: xóa sp có id > 10
// B1: Viết truy vấn:
$sql_delete = "DELETE FROM products WHERE id > 10";
// B2: Thực thi truy vấn: DELETE trả về boolean
$is_delete = mysqli_query($connection, $sql_delete);
var_dump($is_delete);

// 6 - Truy vấn SELECT:
// + SELECT 1 bản ghi duy nhất: lấy sp có id = 1
// B1: Viết truy vấn:
$sql_select_one = "SELECT * FROM products WHERE id = 1";
// B2: Thực thi truy vấn: SELECT ko trả về boolean như INSERT
// UPDATE DELETE, mà trả về 1 obj trung gian nào đó, và obj này
//chưa phải là dữ liệu mong muốn
$result_one = mysqli_query($connection, $sql_select_one);
// B3: Trả về mảng kết hợp 1 chiều chứa thông tin bản ghi:
$product = mysqli_fetch_assoc($result_one);
echo '<pre>';
print_r($product);
echo '</pre>';

// + SELECT nhiều bản ghi đồng thời: lấy tất cả sp
// B1: Viết truy vấn:
$sql_select_all = "SELECT * FROM products";
// B2: Thực thi truy vấn:
$result_all = mysqli_query($connection, $sql_select_all);
// B3: Trả về mảng 2 chiều chứa thông tin các bảng ghi:
$products = mysqli_fetch_all($result_all, MYSQLI_ASSOC);
echo '<pre>';
print_r($products);
echo '</pre>';