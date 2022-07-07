<?php
require_once 'models/Model.php';
class Order extends Model {
    public function insertData($fullname, $price_total) {
        $sql_insert = "INSERT INTO orders(fullname,price_total)
VALUES(:fullname,:price_total)";
        $obj_insert = $this->connection->prepare($sql_insert);
        $inserts = [
            ':fullname' => $fullname,
            ':price_total' => $price_total
        ];
        $is_insert = $obj_insert->execute($inserts);
        // Trả về id của bản ghi vừa insert:
        $order_id = $this->connection->lastInsertId();
;        return $order_id;
    }
}