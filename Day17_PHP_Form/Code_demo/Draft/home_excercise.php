<?php
//home_excercise.php
// Chữa bài tập 8
$array = ['programming', 'php', 'basic', 'dev', 'is', 'program is PHP'];
$arrs = [];

// Lặp mảng gốc
foreach ($array AS $value) {
  $arrs[$value] = strlen($value);
}

// Debug mảng mới sinh ra
echo "<pre>";
print_r($arrs);
echo "</pre>";

// Sắp xếp mảng theo chiều tăng dần của giá trị, tuy nhiên phải giữ nguyên key của nó khi sắp xếp
asort($arrs);

echo "<pre>";
print_r($arrs);
echo "</pre>";

$key_first = array_key_first($arrs);
echo "Chuỗi nhỏ nhất là: $key_first, Số ký tự = " . $arrs[$key_first];
$key_last = array_key_last($arrs);
echo "Chuỗi nhỏ nhất là: $key_last, Số ký tự = " . $arrs[$key_last];
//var_dump($a);
// - Cách 1:

// - Cách 2: Lấy giá trị min, max r lặp mảng để so sánh
//$min = min($arrs); //2
//$max = max($arrs); //14
////
//foreach ($arrs AS $string => $value) {
//  if ($value == $min) {
//    echo "Chuỗi nhỏ nhất là: $string, số ký tự = $value <br />";
//  }
//  if ($value == $max) {
//    echo "Chuỗi lớn nhất là: $string, số ký tự = $value <br />";
//  }
//}

//echo "Chuỗi lớn nhất là, có độ dài là";
//shift($arrs)

