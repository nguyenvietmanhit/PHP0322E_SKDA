<h1>Hello manhnv</h1>

<?php
//Code PHP
//1 - Biến: lưu giá trị, giá trị có thể biến đổi
$name = 'manhnv';
$age = 31;
$my_name = 'abc';
$number1 = 1; $number2 = 2; $number = 3;
$age = 50;
// 2 - Quy tắc đặt tên: Giống hệt Javascript
// 3 - Kiểu dữ liệu:
// + integer: số nguyên,
$number1 = 1;
$number2 = -1;
// Hàm dùng để debug - xem thông tin biến
var_dump($number1);
$check = is_int($number2);
var_dump($check);
// + float: số thực
$number1 = 1.23;
$number2 = -1.1;
var_dump($number1);
var_dump(is_float($number2));
// + string: chuỗi
$str1 = 'String 1';
$str2 = "String 2";
$str3 = "Hello, 'manhnv' ";
echo $str1; //String 1
echo "<br />";
echo $str2;
echo "<br />";
echo $str3;
echo "<br />";
// Nối chuỗi dùng .
echo $str1 . $str2; //String 1String 2
echo "Abcdef: " . $str2 . ", chào bạn"; //Abcdef: String 2, chào bạn
// Hiển thị biến trong 1 chuỗi mà ko cần nối chuỗi bằng cách dùng nháy kép để bao chuỗi
echo "<br />";
echo "Abcdef: $str2, chào bạn";
echo "<br />";
echo 'Abcdef: $str2, chào bạn';
var_dump($str1);
var_dump(is_string($str1));
// + boolean: chỉ có 2 giá trị: true và false, viết hoa thường thoải mái
$bool1 = true;
$bool2 = True;
$bool3 = false;
var_dump($bool1);
var_dump(is_bool($bool1));
// 4 kiểu dữ liệu integer, float, string, boolean -> nguyên thủy
// + null: có 1 giá trị duy nhất là null, viết hoa thường thoải mái
$n1 = null;
var_dump($n1);
var_dump(is_null($n1));
// + array: mảng
$arr = [1, 2, 3];
var_dump($arr);
var_dump(is_array($arr));
// + object: đối tượng -> OOP
// 4 - Ép kiểu dữ liệu: thêm từ khóa là tên kiểu liệu phía trước giá trị cần ép
$number = '11.2'; //float
$cast1 = (int) $number;
var_dump($cast1); //11
$cast2 = (string) $number;
var_dump($cast2); //11.2
$cast3 = (boolean) $number;
var_dump($cast3); //true, các giá trị ép về false là chuỗi rỗng, số 0, null, mảng rỗng
// Ngược lại là true
$cast4 = (array) $number;
var_dump($cast4);
$cast5 = (object) $number;
var_dump($cast5);
// 5 - Hằng: cũng là biến nhưng ko thể gán lại giá trị khi đã khai báo
define('PI', 3.14); // ít dùng
const MAX_UPLOAD = 100; // hay dùng
echo MAX_UPLOAD; //100
 // MAX_UPLOAD = 50; //cố tính gán giá trị lại cho hằng sẽ báo lỗi
// Một số hằng có sẵn của PHP:
echo __LINE__; // số dòng code hiện tại đang gọi hằng này
echo "<br />";
echo __FILE__; //đường dẫn vật lý tới file đang gọi hằng này
echo "<br />";
echo __DIR__; //đưỡng dẫn vật lý tới thư mục cha gần nhất tới file đang gọi hằng
// 6 - Hàm: là 1 tập các lệnh giải quyết logic nào đó, sử dụng lại
// Hàm trong PHP giống hệt Javascript
function show($name, $age) {
    echo "Tên của bạn: $name, Tuổi: $age";
}
show('mạnh', 31);
// Hàm có sẵn, hàm tự định nghĩa: hàm có tham số, có giá trị trả về (return)
// 7 - Truyền tham trị và tham chiếu
$number = 5;
echo "Ban đầu number = $number <br />"; //5

function changeNumber($n) {
    $n = 1;
    echo "<br /> Bên trong hàm đang có giá trị = $n"; //1
}

changeNumber($number);
echo "<br /> Sau khi gọi hàm, number = $number"; //5 , not 1
// -> truyền tham trị, chỉ truyền giá trị, truyền bản sao của biến ban đầu, bản gốc giữ nguyên,
//hàm đang thao tác với bản sao
// -> truyền tham chiếu, truyền bản gốc vào hàm, biến gốc sẽ bị thay đổi bên trong hàm
$number = 6;
echo "Ban đầu number = $number <br />"; //6
function changeN(&$n) {
  $n = 1;
  echo "<br /> Bên trong hàm đang có giá trị = $n"; //1
}
changeN($number);
echo "<br /> Sau khi gọi hàm, number = $number"; //1
// -> tham trị hay dùng hơn tham chiếu, tham chiếu hay gặp khi thao tác với CMS

// 8 - Hàm nhúng file trong PHP: 1 project web thực tế tổ chức thành rất nhiều file/thư mục
// -> ghép các file lại thành 1 luồng duy nhất -> hàm nhúng file
// include, require, include_once, require_once
// Tạo 1 file file_test.php cùng cấp với file basic.php hiện tại
// Bản chất của nhúng file là copy toàn nội dung file cần nhúng paste vào vị trí hiện tại
include_once 'file_test.php';
include_once 'file_test.php';
include_once 'file_test.php';
// include và require khác nhau về cơ chế thông báo lỗi khi nhúng file ko tồn tại
// -> include hiển thì lỗi warning, code phía sau vẫn chạy
// -> require hiển thì lỗi fatal, code phía sau ko chạy
// once ktra xem file trc đó đã nhúng chưa, nếu chưa thì nhúng còn nếu nhúng rồi thì thôi ko nhúng
// -> thực tế nên dùng hàm require_once để nhúng file: đảm bảo file đc 1 lần duy nhất và nếu nhúng
//file ko tồn tại thì dừng chương trình

echo "<h1>Nội dung cuối cùng của trang</h1>";
?>
