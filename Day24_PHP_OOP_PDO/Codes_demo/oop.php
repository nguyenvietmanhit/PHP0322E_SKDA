<?php
//oop.php
// Các thuật ngữ trong OOP
// - Lớp / Class:
// + LÀ khuôn mẫu dùng để sinh ra các đối tượng
// + Lớp và đối tượng luôn đi đôi với nhau
// + Lớp là bản vẽ thiết kế của 1 ngôi nhà trên giấy, từ bản vẽ
//xây đc nhiều ngôi nhà thật -> các đối tượng
// + Cú pháp: quy tắt đặt tên class: viết hoa ký tự đầu tiên của
//từng từ
class User1 {

}
class UserName1 {

}
// - Đối tượng / Object:
// + Là thể hiện cụ thể của 1 lớp, đối tượng đc sinh ra từ lớp
// + Đối tượng trong thực tế có đặc điểm/thuộc tính và hành vi/
//phương thức
// + Cú pháp:
class User2 {

}
$obj1 = new User2();
$obj2 = new User2();
// - Thuộc tính của lớp:
// + Là 1 biến đc khai báo bên trong class
// + Có phạm vi truy cập trước tên thuộc tính
// + Xác định thuộc tính lớp bằng cách phân tích 1 obj cụ thể
//trong thực tế, vd: sinh viên có các đặc điểm: id, fullname,
//age, address ...
class Student1 {
    public $id;
    public $fullname;
    public $age;
    public $address;
}
$obj1 = new Student1();
// Cú pháp obj truy cập thuộc tính của class: ->
$obj1->id = 'sv1';
$obj1->fullname = 'manhnv';
$obj1->age = 32;
$obj1->address = 'HN';

$obj2 = new Student1();
$obj2->id = 'sv2';
$obj2->fullname = 'abc';
$obj2->age = 123;
$obj2->address = 'def';

// - Phương thức của lớp:
// + Là các hàm đc khai báo bên trong class
// + Có phạm vi truy cập trc khai báo phương thức
// + Xác định phương thức bằng cách phân tích 1 obj trong thực tế,
//. VD: phân tích obj sinh viên -> có các PT là CRUD
class Student2 {
    public function create() {
        echo 'create';
    }
    public function edit($id) {
        echo "Edit $id";
    }
    public function delete($id) {
        echo "Delete $id";
    }
    public function index() {
        echo 'Index';
    }
}
$obj = new Student2();
// Obj truy cập PT sử dụng ký tự ->
$obj->create();
$obj->edit(3);
$obj->delete(4);
$obj->index();
// - Phương thức khởi tạo:
// + Là 1 PT trong class, là tự động đc chạy ngay khi có 1 obj
//sinh ra
// + Khởi tạo giá trị mặc định cho chính thuộc tính của class
class Student3 {
    public $fullname;
    public $age;
    public function __construct() {
        echo '<br />PT khởi tạo chạy đầu tiên';
    }
    public function create() {
        echo "create";
    }
}
$obj = new Student3();
$obj->create(); //

class Student4 {
    public function __construct($name) {
        echo "<br />Tên: $name";
    }
}
$obj = new Student4('abc'); //Tên: abc
// - Từ khóa this:
// + Tham chiếu đến chính đối tượng hiện tại đang gọi nó
class Student5 {
    public $fullname;
    public $age;
    public function create() {
        $this->fullname = "manhnv";
        $this->age = 32;
        echo "Tên: $this->fullname, Tuổi: $this->age";
    }
}
$obj = new Student5();
$obj->create(); //Tên: manhnv, Tuổi: 32
// - Phạm vi truy cập
// + Là các từ khóa đứng trước khai báo TT/PT, gán quyền truy cập
// + Có 3 từ khóa: private, protected, public
// + private: chỉ truy cập đc bên trong class, cứ bên ngoài class
//sẽ ko truy cập đc
class User3 {
    public $fullname;
    private $age;
    private function test() {
        $this->age = 3; //ok
        echo 'test';
    }
}
$obj = new User3();
// $obj->age = 32; //lỗi
// $obj->test(); //lỗi
// + protected: truy cập đc nội bộ class và các class kế thừa từ
//nó
class Person {
    protected $fullname;
    private $age;
    public $address;
    protected  function test() {
        $this->fullname = 'abc';
        $this->age = 123;
        $this->address = 'HN';
    }
}
class Student6 extends Person {
    //Trait
    public function show() {
        $this->fullname = 'abc'; //ok
        //$this->age = 123; // lỗi?
        $this->address = 'def'; //ok
    }
}

$obj = new Person();
//$obj->fullname = 'abc'; //lỗi
//$obj->age = 3; //lỗi
$obj->address = 'hn'; //ok
// + public: ở đâu cũng truy cập đc
// - Từ khóa static:
// + Từ khóa đứng sau phạm vi truy cập, đứng trước tên TT/PT
// + TT/PT static đc truy cập thẳng từ class mà ko phải thông
//qua bước khởi tạo đối tượng
class User5 {
    public static $fullname;

    public static function test() {
        //Bên trong class, truy cập thuộc tính tĩnh dùng self::
        self::$fullname = 'abc';
        echo 'test';
    }
}
User5::$fullname = 'def';
User5::test();
// - Từ khóa extends
// + Thể hiện cho tính kế thừa trong OOP
// + PHP chỉ hỗ trợ đơn kế thừa
// + Class con kế thừa đc các TT/PT của class cha trong 2 phạm vi
//truy cập là protected và public
// - Từ khóa abstract
// + Tạo ra class trừu tượng, bên trong class trừu tượng có các
//phương thức trừu tượng
// + Ko thể khởi tạo đối tượng từ 1 class trừu tượng, chỉ dùng
//cho mục đích kế thừa
abstract class Person2 {
    public $fullname;
    public function show() {
        echo 'show';
    }
    abstract public function test();
}
class A extends Person2 {
    public function test() {
        echo 'class A test';
    }
}
// - Từ khóa interface
// + Là 1 bộ khung cung cấp các phương thức ko có nội dung
// + Ko thể khai báo TT/PT bình thường
interface Config {
    public function sendMail();
    public function deleteMail();
}
class C implements Config {
    public function sendMail() {
        echo 'class C sendmail';
    }
    public function deleteMail() {
        echo 'class C deletemail';
    }
}
// - Bốn tính chất của OOP:
// + Tính kế thừa
// + Tính đa hình
// + Tính trừu tượng
// + Tính đóng gói