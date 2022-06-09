<?php
//pdo.php
// 1/ Kết nối CSDL MySQL từ PHP sử dụng thư viện PDO
// - Hỗ trợ kết nối nhiều CSDL, trong khi MySQLi chỉ hỗ trợ
//kết nối duy nhất 1 CSDL là MySQL
// - Code hoàn toàn dựa trên OOP
// - Thực tế website đều ưu tiên PDO
// - PHP Data Object
// 2 /Code kết nối:
// - Khởi tạo kết nối
// Data Source Name
const DB_DSN = 'mysql:host=localhost;dbname=php0322e;port=3306';
// Username đăng nhập vào CSDL
const DB_USERNAME = 'root';
// Password đăng nhập vào CSDL
const DB_PASSWORD = '';

try {
    $connection = new PDO(DB_DSN, DB_USERNAME,
        DB_PASSWORD);
} catch (Exception $e) {
    die("Lỗi kết nối: " . $e->getMessage());
}
echo 'Kết nối CSDL thành công';
// Bảng categories: id, name, description, created_at
// 3 / Truy vấn INSERT: thêm dữ liệu
// + B1: viết truy vấn: với PDO sử dụng cơ chế bind param: tạo câu
//truy vấn mà các giá trị truyền vào chưa phải là giá trị thật,
//mà sẽ ở dạng tham số -> chống lỗi bảo mật SQL Injection
$sql_insert = "INSERT INTO categories(name, description)
VALUES(:name,:description)";
// + B2: Chuẩn bị obj truy vấn: prepare
$obj_insert = $connection->prepare($sql_insert);
// + B3: Tùy chọn, chỉ có khi câu truy vấn ở dạng tham số
// Tạo mảng truyền giá trị thật cho các tham số, có số phần tử mảng
//đúng bằng số tham số
$inserts = [
    ':name' => 'Thể thao',
    ':description' => 'Mô tả danh mục thể thao'
];
// + B4: Thực thi obj truy vấn: kết quả trả về của INSERT UPDATE
//DELETE là boolean, SELECT là mảng
$is_insert = $obj_insert->execute($inserts);
// Debug PDO phải thực hiện sau bước thực thi:
echo '<pre>';
print_r($obj_insert->debugDumpParams());
echo '</pre>';
var_dump($is_insert);

// 4 - Truy vấn UPDATE:
// B1: Viết truy vấn:
$sql_update = "UPDATE categories SET name=:name 
WHERE id=:id";
// B2: Cbi obj truy vấn:
$obj_update = $connection->prepare($sql_update);
// B3: Tạo mảng (tùy chọn)
$updates = [
    ':name' => 'Abc',
    ':id' => 1
];
// B4: Thực thi:
$is_update = $obj_update->execute($updates);
var_dump($is_update);
// 5 / Truy vấn DELETE:
// B1: Viết truy vấn:
$sql_delete = "DELETE FROM categories WHERE id > :id";
// B2: Cbi obj truy vấn:
$obj_delete = $connection->prepare($sql_delete);
// B3: Tạo mảng (tùy chọn)
$deletes = [
    ':id' => 10
];
// B4: Thực thi:
$is_delete = $obj_delete->execute($deletes);
var_dump($is_delete);
// 6 - Truy vấn SELECT
// + SELECT 1 bản ghi:
// B1: Viết truy vấn:
$sql_select_one = "SELECT * FROM categories WHERE id = :id";
// B2: Cbi obj truy vấn:
$obj_select_one = $connection->prepare($sql_select_one);
// B3: Tạo mảng
$selects = [
    ':id' => 2
];
// B4: Thực thi: SELECT ko cần quan tâm đến kết quả trả về bước
//thực thi:
$obj_select_one->execute($selects);
// B5: Trả về mảng kết hợp 1 chiều:
$category = $obj_select_one->fetch(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($category);
echo '</pre>';
// + SELECT nhiều bản ghi
// B1: Viết truy vấn:
$sql_select_all = "SELECT * FROM categories";
// B2: Cbi obj truy vấn:
$obj_select_all = $connection->prepare($sql_select_all);
// B3: Tạo mảng -> bỏ qua
// B4: Thực thi:
$obj_select_all->execute();
// B5: Trả mảng kết hợp 2 chiều:
$categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($categories);
echo '</pre>';

