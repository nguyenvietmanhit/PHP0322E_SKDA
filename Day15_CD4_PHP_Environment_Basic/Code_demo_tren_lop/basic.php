<!--basic.php-->
<?php
// 1 - Biến
// + Cú pháp khai báo biến:
$name = 'manhnv';
$age = 32;
// 2 - Kiểu dữ liệu trong PHP:
// + integer: số nguyên
$number1 = 123;
$number2 = -1;
// Hàm xem thông tin biến, là 1 hàm dùng để debug
var_dump($number1);
// + float: số thực
$number1 = 1.23;
var_dump($number1);
// + string
$str1 = 'String 1';
$str2 = "String 2";
$str3 = "Hello 'manhnv'";
var_dump($str1);
// Nối chuỗi
echo "Hello: " . $str1; //Hello String 1
echo 'Hello: ' . $str1;
// Hiển thị thẳng giá trị của biến ngay trong chuỗi mà ko cần
//nối chuỗi, chỉ áp dụng với chuỗi dùng dấu nháy kép
echo "<br /> Hello: $str1";
echo 'Hello: $str1';
// -> nháy đơn dùng cho các chuỗi ko chứa biến và ngược lại cho
//nháy kép
// + boolean:
$check1 = true;
$check2 = TRue;
$check = false;
var_dump($check1);
// + null
$var1 = null;
$var2 = NUll;
var_dump($var1);
// + array
// + object
//2 - Ép kiểu dữ liệu: thêm từ khóa là tên kiểu dữ liệu trc giá
//trị cần ép
$number = 11.2; //float
// + Ép từ float -> integer bỏ phần thập phân
$check1 = (integer) $number; //11
var_dump($check1);
// + Ép từ float -> string thì giữ nguyên giá trị, chỉ đổi kiểu
//dữ liệu
$check2 = (string) $number; //
var_dump($check2);
// + Ép từ float -> boolean, trả về false trong các trường hợp
// sau: số 0, chuỗi rỗng, null, mảng rỗng, object rỗng; ngược lại
// là true
$number = 0;
$check3 = (boolean) $number; //
var_dump($check3);
// 3 - Hằng
// + Cú pháp khai báo: có 2 cách
// C1:
define('MAX_FILE', 1024);
echo MAX_FILE; //1024
// C2: nên dùng cách 2
const PI = 3.14;
echo PI; //3.14
// PI = 123; //báo lỗi
// - Một số hằng định nghĩa sẵn trong PHP:
echo "<br >";
echo __LINE__; //
echo "<br />";
echo __FILE__; //
echo "<br />";
echo __DIR__; //
// 4 - Hàm: giống hệt JS
function sum($number1, $number2) {
    return $number1 + $number2;
}
$result = sum(1, 2);
echo $result; //3
// 5 - Truyền tham trị, tham chiếu của hàm
// VD: viết 1 hàm thay đổi giá trị của 1 biến bên ngoài hàm
$number = 5;
echo "<br />Ban đầu biến number = $number"; //5
function changeNumber1($num) {
    $num = 1;
    echo "<br />Bên trong hàm, biến number = $num"; //1
}
changeNumber1($number);
echo "Sau khi gọi hàm, biến number = $number"; //5
// - Kết quả là biến number ko hề bị thay đổi giá trị, do cơ chê
//truyền giá trị vào hàm là truyền theo kiểu tham trị
// Truyền tham trị là truyền bản sao của biến vào hàm
// VD theo cơ chế truyền tham chiếu:
$number = 5;
echo "<br />Ban đầu biến number = $number"; //5
// THêm ký tự & phía trước tên tham số trong hàm để truyền tham
//chiếu
function changeNumber2(&$num) {
    $num = 1;
    echo "<br />Bên trong hàm, biến number = $num"; //1
}
changeNumber2($number);
echo "Sau khi gọi hàm, biến number = $number"; //1
//- Truyền tham chiếu là truyền bản gốc
// 6 - Toán tử: giống hệt JS
// + Toán tử số học: + - * / % ++ --
// + Toán tử so sánh: == > >= < <= !=
// + Toán tử logic: && || !
// + Toán tử gán: = += -= *= /= %=
// 7 - Câu lệnh điều kiện:
// + Các câu lệnh if: if else elseif
// + Switch case
// - Toán tử điều kiện: sử dụng ký tự ? :, dùng thay thế cho
//cho if else khi logic đơn giản
$number = 5;
if ($number > 0) {
    echo 'Number > 0';
} else {
    echo 'Number < 0';
}
echo $number > 0 ? 'Number > 0' : 'Number < 0';
// - Cú pháp viết tắt của câu lệnh if khi hiển thị logic HTML
//phức tạp:
$number = 5;
// Hiển thị HTML hoàn toàn bằng PHP:
if ($number > 0) {
    echo '<table border="1" cellspacing="0" cellpadding="8">';
        echo '<tr>';
            echo '<td>Hàng 1 cột 1</td>';
            echo '<td>Hàng 1 cột 2</td>';
            echo '<td>Hàng 1 cột 3</td>';
        echo '</tr>';
    echo '</table>';
}
// Tách biệt code PHP và HTML bằng cách sử dụng cú pháp viết tắt
//của câu lệnh điều kiện if:
?>

<?php if ($number > 0): ?>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <td>Hàng 1 cột 1</td>
            <td>Hàng 1 cột 2</td>
            <td>Hàng 1 cột 3</td>
        </tr>
    </table>
<?php endif; ?>

<?php if ($number > 0): ?>
    <h1>Thẻ h1</h1>
<?php elseif ($number > 1): ?>
    <h2>Thẻ h2</h2>
<?php else: ?>
    <h3>Thẻ h3</h3>
<?php endif; ?>
<?php
// 8 - Vòng lặp: for while do...while
// 9 - Từ khóa break continue
?>
