<!--array_function.php-->
<?php
// Demo 1 số hàm có sẵn của PHP xử lý mảng
// - Tính tổng giá trị của mảng:
$arrs = [12, 50, 60, 90, 12, 25, 60];
$sum = array_sum($arrs); //
// - Kiểm tra key có tồn tại trong mảng hay ko:
$info = [
  'name' => 'manhnv',
  'age' => 31
];
$test = array_key_exists('name', $info); //true
// - Loại bỏ phần tử có value trùng lặp
$arr = [1, 2, 3, 3, 4, 1, 1];
$arr_new = array_unique($arr); //[1, 2, 3, 4]
// - Đếm số phần tử mảng:
$count = count($arr_new); //4
// - Chuyển mảng thành chuỗi dựa theo ký tự phân tách: implode
$arr = ['my', 'name', 'is', 'manhnv'];
$str = implode('-', $arr);
var_dump($str); // my-name-is-manhnv
// - Chuyển chuỗi thành mảng dựa theo ký tự phân tách: explode
$str = 'Hello manhnv is abc';
$arr = explode(' ', $str);
echo "<pre>";
print_r($arr); //['Hello', 'manhnv', 'is', 'abc']
echo "</pre>";
// - Lấy giá trị cuối cùng của mảng: end
$arr = [1, 'a', 'b', 'c'];
echo end($arr); //c
// - Lấy giá trị đầu tiên: reset
echo reset($arr); //1
// - Xóa phần tử mảng theo key: unset
$info = [
  'name' => 'manhnv',
  'age' => 31
];
unset($info['age']); //Xóa phần tử mảng có key=age
echo "<pre>";
print_r($info); // ['name' => 'manhnv'];
echo "</pre>";
// - Kiểm tra phải kiểu dữ liệu mảng hay ko: is_array
$test = is_array($info); //true
// - Sắp xếp mảng theo giá trị tăng dần: sort
$arr = [3, 5, 1, 2, 6];
sort($arr);
echo "<pre>";
print_r($arr);
echo "</pre>";
// [1, 2, 3, 5, 6]
// - Sắp xếp mảng theo giá trị giảm dần: rsort
$arr = [3, 5, 1, 2, 6];
rsort($arr);
echo "<pre>";
print_r($arr);
echo "</pre>";
// [6,5,3,2,1]
?>
