<?php
//models/User.php
require_once 'models/Model.php';
class User extends Model {
    public function registerUser($username, $password) {
        //B1:
        $sql_insert = "INSERT INTO users(username, password)
        VALUES(:username, :password)";
        //B2:
        $obj_insert = $this->connection->prepare($sql_insert);
        //B3:
        $inserts = [
            ':username' => $username,
            ':password' => $password
        ];
        //B4:
        $is_insert = $obj_insert->execute($inserts);
        // Debug truy vấn thuần, thì có tác dụng khi gọi sau
        //bước thực thi
        echo '<pre>';
        print_r($obj_insert->debugDumpParams());
        echo '</pre>';
        return $is_insert;
    }

    public function getUser($username) {
        //B1:
        $sql_select_one = "SELECT * FROM users 
        WHERE username=:username";
        //B2:
        $obj_select_one = $this->connection->prepare($sql_select_one);
        //B3:
        $selects = [
            ':username' => $username
        ];
        //B4:
        $obj_select_one->execute($selects);
        //B5:
        return $obj_select_one->fetch(PDO::FETCH_ASSOC);
    }
}