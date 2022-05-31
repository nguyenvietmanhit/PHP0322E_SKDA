<?php
//crud.php

// CRUD sản phẩm, CSDL php0721e_demo, bảng products:id, category_id,name,price,description,created_at
// theo tư duy của OOP
class Product {

  public $id;
  public $category_id;
  public $name;
  public $price;
  public $description;
  public $created_at;

  public function addProduct() {
    $connection = $this->getConnection();
    // Viết truy vấn:
    $sql_insert = "INSERT INTO products(name, price) VALUES('$this->name', $this->price)";
    var_dump($sql_insert);
    // Thực thi:
    $is_insert = mysqli_query($connection, $sql_insert);
    return $is_insert;
  }

  public function editProduct($id) {

  }

  public function deleteProduct($id) {

  }

  public function listProduct() {
    $connection = $this->getConnection();
    // Tương tác với CSDL:
    // + Viết truy vấn:
    $sql_select_all = "SELECT * FROM products";
    // + Thực thi truy vấn
    $obj_select_all = mysqli_query($connection, $sql_select_all);
    // + Trả về mảng các sản phẩm
    $products = mysqli_fetch_all($obj_select_all, MYSQLI_ASSOC);
    return $products;
  }

  public function getConnection() {
    $connection = mysqli_connect(self::DB_HOST, self::DB_USERNAME,
      self::DB_PASSWORD, self::DB_NAME, self::DB_PORT);
    if (!$connection) {
      die("Lỗi kết nối: " . mysqli_connect_error());
    }
    echo 'Kết nối thành công';
    return $connection;
  }

  const DB_HOST = 'localhost';
  const DB_USERNAME = 'root';
  const DB_PASSWORD = '';
  const DB_NAME = 'php0721e_demo';
  const DB_PORT = 3306;
}

$product1 = new Product();
$products = $product1->listProduct();
//echo "<pre>";
//print_r($products);
//echo "</pre>";

$product1->name = 'SP 1';
$product1->price = 12345;
$is_insert = $product1->addProduct();
var_dump($is_insert);
