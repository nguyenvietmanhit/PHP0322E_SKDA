<?php
//configs/Database.php
// - Nếu file chứa 1 class thì tên file phải trùng
//tên class
// - Ưu tiên dùng PDO để kết nối CSDL
class Database {
    const DB_DSN = 'mysql:host=localhost;dbname=php0322e;port=3306;charset=utf8';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';
}
