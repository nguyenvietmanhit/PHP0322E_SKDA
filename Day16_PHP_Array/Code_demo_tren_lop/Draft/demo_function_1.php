<?php
//demo_function_1.php
// Demo 1 số hàm có sẵn của PHP xử lý cho chuỗi, số, thời gian
// 1/ Hàm xử lý chuỗi
// - Lấy độ dài chuỗi: strlen
$str = 'Hello';
$length = strlen($str);// Sử dụng Ctrl + Q cuối tên hàm để show mô tả hàm
var_dump($length); //5
// - Chuyển thành chữ hoa: strtoupper
$str = 'Hello abc';
$str1 = strtoupper($str); //HELLO ABC
// - Chuyển về chữ thường: strtolower
$str2 = strtolower('HELlo abc'); //hello abc
// - Chuyển ký tự đầu tiên của chuỗi thành ký tự hoa:ucfirst
$str3 = ucfirst('abc def');//Abc def
// - Cắt khoảng trắng 2 đầu chuỗi: trim
$str4 = trim('    hello abc    '); //hello abc
// - Tìm kiếm và thay thế chuỗi: str_replace
$str_origin = "hello abc";
$str = str_replace('abc', 'def', $str_origin); //hello def
// - Lấy chuỗi con từ chuỗi gốc: substr
$str_origin = "abcdef";
$str = substr($str_origin, 2, 3); //cde
var_dump($str);
//2 - Hàm xử lý số
// - Kiểm tra có phải số hay ko: is_numeric
$check1 = is_numeric("abc123"); //false
// - Kiểm tra số nguyên: is_int
// - Kiểm tra số thực: is_float
// - Làm tròn theo phần thập phân: round
echo round(121.123); //121
echo round(121.123, 2); //121.12
echo round(5.6); //6
// - Làm tròn lên số nguyên gần nhất: ceil
echo ceil(1.37);//2
echo ceil(-1.37);//-1
// - Làm tròn xuống số nguyên gần nhất: floor
echo floor(1.37); //1
echo floor(-1.37);//-2
// - Tim min max
echo min(1, 2 ,3); //1
echo max(1, 2 ,3); //3
// - Format dạng số: hay dùng để format tiền: number_format
$price = 15000000;
echo number_format($price); //15,000,000
echo number_format($price, 0, '.', '.');//15.000.000
// 3 - Hàm xử lý thời gian
// + LẤy số giây từ thời điểm hiện tại so với 01/01/1970: time
echo "<br/>";
echo time();
// + Format thời gian: date
// Format thời gian hiện tại theo kiểu ngày-tháng-năm Giờ:phút:giây
echo "<br/>";
echo date('d-m-Y H:i:s', time());
// Mặc định múi giờ trên server XAMPP là múi giờ Anh
// cần phải chuyển về của Việt Nam trước khi thao tác với thời gian
date_default_timezone_set('Asia/Ho_Chi_Minh');
// Hiển thị múi giờ đúng của VN
echo "<br/>";
echo date('d-m-Y H:i:s', time());
// Nghỉ giải lao 20h20

