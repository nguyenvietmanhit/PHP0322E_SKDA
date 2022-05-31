<?php
//oop_basic.php
// Các thuật ngữ cơ bản của lập trình hướng đối tượng - Object Oriented Programming
// 1 - Class: lớp
// - 1 class giống như bản vẽ kỹ thuật của 1 ngôi nhà, là 1 khuôn mẫu. Từ bản vẽ (class) có thể
//xây đc nhiều ngôi nhà cụ thể (object)
// - Quy tắc đặt tên class: viết hoa ký tự đầu tiên của từng từ, nếu 1 file php mà chỉ có 1 class
//thì tên file sẽ trùng tên class
class House {

}

class HouseTestApi {

}

class Student {
  public $name;
  public $id;
}
// 2 - Object: đối tượng, là thể hiện cụ thể của 1 class, sinh ra từ class
// Các obj có cùng đặc điểm và hành vi mà class định nghĩa
$obj1 = new Student();
$obj1->name = 'Nam';
$obj1->id = 'id1';

$obj2 = new Student();
$obj2->name = 'Long';
$obj2->id = 'id2';

$obj3 = new Student();

// 3 - Thuộc tính của class: mô tả đặc điểm cho class đó
class Person {
  // 3 thuộc tính của class, nó là biến trong PHP thuần
  public $name;
  public $age;
  public $address;
}
$person1 = new Person();
$person1->name = 'A';
$person1->age = 31;
$person1->address = 'HN';

$person2 = new Person();
$person2->name = 'B';
$person2->age = 10;
$person2->address = 'Another';

// 4 - Phương thức của class: mô tả hành vi cho class đó
class Book {
  // 3 thuộc tính
  public $name;
  public $amount;
  public $author;
  //Phương thức, khai báo giống như hàm PHP thuần
  public function addBook() {
    echo "addBook";
  }

  public function editBook($id) {
    echo "editBook $id";
  }

  public function deleteBook($id) {
    echo "deleteBook $id";
  }

  public function retrieveBook() {
    echo "retrieveBook";
  }
}
$book1 = new Book();
$book1->name = "Sách văn lớp 1";
$book1->author = 'abc';
$book1->addBook();
$book1->editBook(4);
// 5 - Phương thức khởi tạo của class: khởi tạo giá trị mặc định cho thuộc tính của class đó, là
//phương thức chạy ngầm đầu tiên ngay khi object đc sinh ra từ class
class TestConstructor {
  public $name;

  public function __construct() {
    echo 'Code đc chạy ngầm sau khi khởi tạo obj';
  }
}

$obj_test = new TestConstructor();
// 6 - Từ khóa this: sử dụng bên trong class để tham chiếu đến chính class đó
class TestThis {
  public $name;
  public $age;

  public function showName() {
    echo $this->name;
  }
}
$test_obj = new TestThis();
$test_obj->name = 'Hello';
$test_obj->showName(); //Hello
// 7 - Phạm vi truy cập: gán quyền truy cập cho thuộc tính/phương thức bên trong class
// Có 3 quyền truy cập: private, protected, public
// + Private: chỉ có thể truy cập đc bên trong nội bộ class, bên ngoài class sẽ ko truy cập đc
class TestPrivate {
  private $name;

  public function showName() {
    echo $this->name;
  }
}
$obj_test = new TestPrivate();
//$obj_test->name = 'hello'; // báo lỗi
// + Protected: truy cập đc bên trong nội bộ class và ở class kế thừa
class TestProtected {
  protected $address;

  public function showAddress() {
    echo $this->address;
  }
}
$obj_test = new TestProtected();
// $obj_test->address = 'HN' ; //báo lỗi

class TestChildProtected extends TestProtected {
  public function show() {
    echo $this->address; //ko báo lỗi vì đang là class con nên có thể truy cập đc protected của class cha
  }
}
// + public: truy cập đc từ mọi nơi
// 8 - Từ khóa static: cơ chế truy cập thuộc tính/phương thức của class ko cần khởi tạo đối tượng bằng cách khai
//báo từ khóa static trước tên TT/PT
class TestStatic {
  public static $name;

  public static function show() {
    echo 'show';
  }
}
TestStatic::$name = 'manhnv';
TestStatic::show();

// 9 - Từ khóa self: dùng bên trong class giống this, dùng để truy cập TT/PT tĩnh bên trong class
class TestSelf {
  public static $address;

  public static function show() {
    self::$address = 'HN';
  }
}
// 10 -Từ khóa const: khai báo hằng số trong class, truy cập hằng số giống như static
class TestConst {
  const PI = 3.14;

  public function show() {
    echo self::PI;
  }
}

echo TestConst::PI;
// 11 - Từ khóa extends: thể hiện tính kế thừa trong OOP
// Tính kế thừa cho phép class con sử dụng lại TT/PT của class cha
// PHP chỉ hỗ trợ đơn kế thừa
class TestPerson {
  public $name;
  public $age;
}

class TestStudent extends TestPerson {
  public function show() {
    // class con truy cập đc TT/PT của class ở 2 phạm vi truy cập protected và public
    echo "Tên của bạn: $this->name";
  }
}

//12 - Từ khóa abstract: thể hiện tính trừu tượng của OOP, tạo 1 class cha có phương thức chung cho các class con
// kế thừa từ nó, bắt buộc class con phải định nghĩa phương thức chung này
abstract class TestAbstract {
  public $name;

  public function show() {
    echo 'show';
  }

  // Phương thức trừu tượng: ko có body
  abstract public function test();
}

class Child1Abstract extends TestAbstract {
  // Bắt buộc phải định nghĩa cụ thể cho phương thức abstract của class abstract đang kế thừa
  public function test() {
    echo 'child1 test';
  }
}

abstract class Car {
  abstract public function getNameCar();
}

class CarVinfast extends Car {
  public function getNameCar() {
    echo 'xe vinfast';
  }
}

class Toyota extends Car {
  public function getNameCar() {
    echo 'xe toyota';
  }
}

// 13 - Từ khóa implements: thể hiện thực thi các interface
// Interface là bộ khung của các chức năng mà bắt buộc class mà implement từ nó phải định nghĩa cụ thể
// 1 class có thể implement nhiều interface taị 1 thời điểm
// interface giống như cài plugin vào máy tính
// Interface ko đc chứa thuộc tính, phương thức bắt buộc ko có nội dung
interface Config {
  public function sendMail();
  public function configMail();
}

class Mail implements Config {

  public function sendMail()
  {
    echo 'send Mail';
  }

  public function configMail()
  {
    echo 'config mail';
  }
}

// 4 tinh chất của OOP - tuyển dụng
// + Kế thừa: cho phép tạo class mới dựa trên (kế thừa) từ class có sẵn, thể hiện qua từ khóa extends
// + Đa hình: cùng 1 phương thức có nhiều cách thể hiện (hình dáng) để sử dụng cho mục đích khác nhau, thường là
//interface
// + Trừu tượng: từ các đối tượng giống nhau sẽ trừu tượng hóa lên thành class 1 trừu tượng, thể hiện qua từ
//khóa abstract
// + Đóng gói: cho phép che giấu thông tin của class với các class bên ngoài, thể hiện qua phạm vi truy cập:
//private
