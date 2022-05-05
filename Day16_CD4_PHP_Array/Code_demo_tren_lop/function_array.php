<?php
//function_array.php
// + Tính tổng phần tử trong mảng
$numbers = [1, 2, 3, 4];
$sum = 0;
foreach ($numbers AS $number) {
    $sum += $number;
}
echo $sum;
echo array_sum($numbers); //10
// + Ktra mảng có tồn tại phần tử theo key hay ko: isset
$infos = [
    'name' => 'manhnv',
    'age' => 32
];
echo isset($infos['name']); //true
echo isset($infos['abc']); //false
// + Loại bỏ phần tử trùng lặp: array_unique
$arr1 = [1, 2, 3, 4, 3, 3, 3];
$arr2 = array_unique($arr1);
echo '<pre>';
print_r($arr2); // [1, 2, 3, 4]
echo '</pre>';
// + Đếm số phần tử mảng: count
// + Chuyển từ chuỗi sang mảng dựa theo ký tự phân tách: explode
$str = "hello manhnv abc def";
$arr = explode(' ', $str);
echo '<pre>';
print_r($arr);
echo '</pre>';
// + Chuyển từ mảng về chuỗi ngăn cách bởi ký tự phân tách: implode
$arrs = [1, 2, 3];
echo implode('-', $arrs); //1-2-3
// + Lấy giá trị của phần tử mảng đầu tiên: reset
$names = ['A', 'B', 'C'];
echo reset($names); //A
// + Lấy giá trị của phần tử mảng cuối cùng: end
echo end($names); //C
// + Xóa phần tử mảng theo key: unset
$infos = [
    'name' => 'manhnv',
    'age' => 32
];
unset($infos['name']);
echo '<pre>';
print_r($infos); // ['age' => 32]
echo '</pre>';
// + Ktra kiểu dữ liệu mảng: is_array
echo is_array($infos); //true
// + Ktra giá trị có tồn tại trong 1 mảng hay ko: in_array
$numbers = [1, 2, 3];
echo in_array(3, $numbers); //true
// + Lấy giá trị lớn nhất, nhỏ nhất trong mảng: max, min
echo max($numbers); //3
echo min($numbers); //1

// HÀM THAO TÁC VỚI CHUỖI
// + Lấy độ dài chuỗi: strlen
$str = 'hello';
echo strlen($str); //5
// + Chuyển chuỗi thành chữ hoa: strtoupper
echo strtoupper('abcdef'); //ABCDEF
// + Chuyển hoa về thường: strtolower
echo strtolower('ABCDEF'); //abcdef
// + Chuyển ký tự đầu tiên của chuỗi thành ký tự hoa: ucfirst
echo ucfirst('abc def ghi'); //Abc def ghi
// + Tìm kiếm và thay thế: str_replace
$str = 'hello manhnv abc def';
$search = 'abc';
$replace = 'xyz';
echo str_replace($search, $replace, $str); //hello manhnv xyz def
// + Cắt chuỗi: substr
$str = "manhnv";
echo substr($str, 3, 2); //nv

// HÀM XỬ LÝ SỐ
// + Ktra có phải số hay ko: is_numeric
echo is_numeric(123456); //true
echo is_numeric('123456'); //true
echo is_numeric('123456abc'); //false
// + Ktra phải số nguyên hay ko: is_int
echo is_int(1.23); //false
echo is_int(123); //true
// + Ktra phải số thực: is_float
// + Làm tròn số theo phần thập phân: round
echo round(14.78); //15
echo round(14.78, 1); //14.8
// + Làm tròn lên số nguyên gần nhất với nó: ceil
echo ceil(1.37); //2
echo ceil(-1.2); //-1
// + Làm tròn xuống số nguyên gần nhất với nó: floor
echo floor(1.37); //1
echo floor(-1.2); //-2
// + Format số theo hàng nghìn: number_format
// 10000000
echo number_format(10000000); //10,000,000
echo number_format(10000000, 0,
    '.', '.'); //10.000.000
// HÀM XỬ LÝ THỜI GIAN
// + Set múi giờ:
date_default_timezone_set('Asia/Ho_Chi_Minh');
// + Format thời gian: date
//VD: 05-05-2022 21:07:50
echo date('d-m-Y H:i:s');
// + Lấy thời gian hiện tại tính bằng giây so với 01-01-1970:time
echo time();



