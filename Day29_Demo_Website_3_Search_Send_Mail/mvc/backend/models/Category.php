<?php
require_once 'models/Model.php';
class Category extends Model {
    public function getAll($keyword) {
        //B1:
        $sql_select_all = "SELECT * FROM categories";
        if (!empty($keyword)) {
            $sql_select_all = "SELECT * FROM categories 
WHERE name LIKE :keyword OR description LIKE :keyword";
        }
        //B2:
        $obj_select_all = $this->connection->prepare($sql_select_all);
        //B3:
        $selects = [];
        if (!empty($keyword)) {
            $selects = [
                ':keyword' => "%$keyword%"
            ];
        }
        //B4:
        $obj_select_all->execute($selects);
        //B5:
        return $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
    }
}