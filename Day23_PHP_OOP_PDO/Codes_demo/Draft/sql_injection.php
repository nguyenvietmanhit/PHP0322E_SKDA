<?php
//sql_injection.php
// Demo lỗi bảo mật SQL Injection khi viết truy vấn SQL
// - Là 1 lỗi bảo mật tấn công vào câu truy vấn SQL, thông qua form -> làm thay đổi câu truy vấn
// -> nghiêm trọng -> beginner mắc phải

// - KẾt nối tới CSDL dùng mysqli
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'php0921e2_crud';
const DB_PORT = 3306;

$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
if (!$connection) {
    die("Lỗi kết nối: " . mysqli_connect_error());
}

echo "<h2>Kết nối CSDL thành công</h2>";

// Xử lý form:
if (isset($_GET['submit'])) {
    $name = $_GET['name'];
    // Fix lỗi SQL Injection trước khi thực thi truy vấn, hàm này làm cho các ký tự đặc biệt -> an toàn
    $name = mysqli_real_escape_string($connection, $name);
    // truy vấn CSDL để tìm kiếm tên sp theo kiểu tương đối
    // + Tạo câu truy vấn:
    $sql_select_all = "SELECT * FROM products WHERE name LIKE '%$name%' ";
    var_dump($sql_select_all);
    // + Thực thi truy vấn: -> obj
    $obj_select_all = mysqli_query($connection, $sql_select_all);
    // + Trả về mảng kết hợp 2 chiều
    $products = mysqli_fetch_all($obj_select_all, MYSQLI_ASSOC);
    // Debug
    echo "<pre>";
    print_r($products);
    echo "</pre>";
    // Thử nhập chuỗi sau:   123456' OR name != ' => show hết sp -> dính SQL Injection
}

?>

<form method="get" action="">
  Nhập tên sản phẩm cần tìm kiếm:
  <input type="text" name="name" />
  <input type="submit" name="submit" value="Tìm kiếm" />
</form>
