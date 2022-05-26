<?php
//connection.php
// Thực hiện kết nối từ PHP tới CSDL MySQL, sinh ra biến kết nối
//sử dụng cho các chức năng CRUD
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'php0322e_crud';
const DB_PORT = 3306;
$connection = mysqli_connect(DB_HOST, DB_USERNAME,
DB_PASSWORD, DB_NAME, DB_PORT);
if (!$connection) {
    die('Lỗi kết nối: ' . mysqli_connect_error());
}
// echo 'thành công';

