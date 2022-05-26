<?php
//connect.php
// Cách PHP tương tác với CSDL MySQL -> làm web động, để PHP tương tác đc thì cần
// sử dụng thư viện: mysqli, pdo
// + mysqli: i - improove, chỉ dùng để kết nối tới 1 CSDL duy nhất là MySQL
// , hỗ trợ code theo php thuần (dùng các hàm thuần) -> đơn giản hơn
// + pdo: PHP Data Object, hỗ trợ nhiều CSDL khác nhau: MySQL, SQL Server, Oracle ...
//, chỉ code theo OOP -> khó tiếp cận hơn, học sau khi về OOP

// - Các bước kết nối CSDL MySQL từ PHP
// Tạo 1 số hằng chứa thông tin kết nối
// + Thông tin máy chủ chứa CSDL muốn kết nối
const DB_HOST = 'localhost'; // 127.0.0.1
// + Username kết nối vào CSDL:
const DB_USERNAME = 'root';
// + Password kết nối vào CSDL:
const DB_PASSWORD = '';
// + Tên CSDL muốn kết nối
const DB_NAME = 'php0721e_demo';
// + Cổng kết nối tới CSDL:
const DB_PORT = 3306;
// - Kết nối CSDL, trả về biến kết nối dùng cho các thao tác INSERT, UPDATE, DELETE, SELECT
$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

