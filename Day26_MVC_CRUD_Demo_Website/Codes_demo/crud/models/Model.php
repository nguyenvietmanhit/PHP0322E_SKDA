<?php
//models/Model.php
// - Class model cha chứa 1 thuộc tính kết nối dùng chung
//cho các model con kế thừa từ nó
require_once 'configs/Database.php';
class Model {
    public $connection;
    public function __construct() {
        try {
            $this->connection = new PDO(Database::DB_DSN,
            Database::DB_USERNAME,
                Database::DB_PASSWORD);
        }
        catch (Exception $e) {
            die("Lỗi kết nối: " . $e->getMessage());
        }
    }
}
?>