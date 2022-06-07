<?php
require_once 'configs/Database.php';
//models/Model.php
// - Là class model cha, chứa 1 thuộc tính dùng
//chung cho mọi model con
class Model {
    public $connection;
    public function __construct() {
        try {
            $this->connection = new PDO(Database::DB_DSN,
            Database::DB_USERNAME,
                Database::DB_PASSWORD);
        } catch (Exception $e) {
            die("Lỗi kết nối: " . $e->getMessage());
        }
    }
}