<?php
//function_array.php
// Demo 1 số hàm có sẵn xử lý mảng
// + Tính tổng giá trị trong mảng
$arrs = [1, 2, 3, 4];
// Viết code để tính tổng cho các giá trị trong mảng trên: 10
$sum = 0;
foreach ($arrs AS $value) {
  $sum += $value;
}
echo "Sum = $sum"; // 10
// Dùng hàm có sẵn: array_sum
$sum1 = array_sum($arrs); //10
// + Kiểm tra giá trị có bị null hay ko , hay dùng để kiểm tra mảng tồn tại phần tử theo key hay ko: isset
$arrs = [
  'name' => 'manhnv',
  'age' => 31
];
// echo $arrs['abc']; //báo lỗi ko tồn tại phần tử mảng nào có key = abc
var_dump(isset($arrs['abc'])); //false
var_dump(isset($arrs['name'])); //true
// + Đếm số phần tử mảng: count
$arrs = [
  'name' => 'manhnv',
  'age' => 31
];
var_dump(count($arrs)); //2
// + Xóa phần tử mảng: unset
$arr1 = [1, 2, 3, 4];
unset($arr1[2]);
var_dump($arr1);
echo "<pre>";
print_r($arr1);
echo "</pre>";
// + Check có phải mảng hay ko: is_array
var_dump(is_array($arr1)); // true
// + Check giá trị có tồn tại trong mảng hay ko: in_array
$arr1 = [1, 2, 3, 4];
$check = in_array(3, $arr1); //true
$check = in_array('abc', $arr1); //false

