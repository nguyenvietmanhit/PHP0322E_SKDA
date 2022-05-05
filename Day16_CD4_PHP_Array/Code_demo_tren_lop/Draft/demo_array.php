<!--demo_array.php-->
<?php
// - Định nghĩa
// + Mảng là 1 dạng biến, có thể lưu đc nhiều giá trị taij 1 thời điểm
// vd: Khai báo tên của 500 ae
$name1 = 'A';
$name2 = 'B';
$name3 = 'C';
$names = ['A', 'B', 'C'];
// - Cú pháp khai báo: có 2 cách
$arr1 = array('A', 'B', 'C'); //PHP < 5.4
$arr2 = ['A', 'B', 'C']; // PHP >= 5.4 , ưu tiên dùng
// - Cặp Key-value của phần tử mảng
// Key/Index của phần tử mảng là giá trị xác định của phần tử mảng
// Value/Element của phần tử mảng là giá trị tương ứng của phần tử với key đã biết
// -> phải biết key thì mới xác định đc value
// - Mặc định key của mảng bắt đầu từ 0
// - Lấy value của phần tử mảng = cách thủ công:
$arrs = [1, 'a', 'b', 'c', 'd', 6]; // 6 phần tử
// - Cách debug/xem thông tin mảng rõ ràng hơn:
var_dump($arrs);
echo "<pre>";
print_r($arrs);
echo "</pre>";

echo $arrs[0] ; // 1
echo $arrs[3]; //c
// - Cách thao tác với toàn bộ phần tử mảng
// Yêu cầu: Hiển thị giá trị tất cả phần tử mảng
$arrs = [1, 'a', 'b', 'c', 'd', 6]; //6 phần tử
// + Lấy giá trị thủ công: khó áp dụng cho mảng có nhiều phần tử
echo $arrs[0];
echo $arrs[1];
echo $arrs[2];
echo $arrs[3];
echo $arrs[4];
echo $arrs[5];
// + Dùng vòng lặp: for, while, do...while -> for: cần phải để ý số phần tử của vòng lặp để dừng vòng lặp
// -> ko áp dụng đc cho mảng đa chiều
$count = count($arrs); //6
for ($key = 0; $key < $count; $key++) {
    echo $arrs[$key];
}
// + Sử dụng foreach để lặp mảng : luôn luôn áp dụng với mảng trong PHP khi muốn lặp qua toàn bộ phần tử mảng!
// Tự động lặp qua các phần tử mảng, xác định đc luôn key và value của phần tử mảng!
// Có 2 cú pháp:
// Dạng foreach đầy đủ key-value
$arrs = [1, 'a', 'b', 'c', 'd', 6];
foreach ($arrs AS $key => $value) {
    echo "<p>Phần tử mảng có key = $key, giá trị tương ứng = $value</p>";
}
// Dang foreach khuyết key:
foreach ($arrs AS $value) {
    echo "<p>Value = $value</p>";
}

foreach ($arrs AS $v) {
  echo "<p>Value = $v</p>";
}
// - Phân loại mảng trong PHP:
// + Mảng tuần tự/Mảng số nguyên: key bắt buộc phải ở dạng số, đơn giản và dễ thao tác nhất
$names = ['A', 'B', 'C', 'D'];
echo "<pre>";
print_r($names);
echo "</pre>";
foreach ($names AS $value) {
    echo "Tên: $value";
}
// + Mảng kết hợp: key của phần tử mảng có cả ở dạng chuỗi, mô tả thông tin trực quan hơn
$info = [
    'name' => 'manhnv',
    'age' => 31,
    'address' => 'Hà Nội'
];
echo "<pre>";
print_r($info);
echo "</pre>";
foreach ($info AS $key => $value) {
    echo "<br /> Key: $key, Value: $value";
}
// Cách thủ công
echo $info['name']; //manhnv
echo $info['age']; //31
echo $info['address']; //Hà Nội
// + Mảng đa chiều: mảng trong mảng
// Mảng 2 chiều
$class = [
    'name' => 'PHP0721E_HDT',
    'info' => [
        'amount' => 22,
        'area' => '30m2',
        'address' => 'Hà Nội'
    ]
];
echo "<pre>";
print_r($class);
echo "</pre>";
// chú ý khi echo giá trị trong mảng đa chiều
foreach ($class AS $key => $value) {
    echo "<br /> Key: $key";
    var_dump($value);
}
// Cách lấy thủ công:
echo $class['info']['address']; //Hà Nội
echo $class['info']['amount']; //22
// Mảng càng nhiều chiều thì càng phức tạp, nếu mảng do bạn định nghĩa ra thì nên tối đa 3 chiều

// Demo bài đơn giản
//Cho biết đây là mảng loại nào và tính tổng và tích của các phần tử trong mảng sau:
$arrs = [12, 50, 60, 90, 12, 25, 60];
// Là mảng số nguyên/mảng tuần tự
echo "<pre>";
print_r($arrs);
echo "</pre>";
// Tính tổng các phần tử mảng
$sum = 0;
$multiple = 1;
foreach ($arrs AS $value) {
    $sum += $value;
    $multiple *= $value;
}
echo "Tổng bằng $sum, Tích bằng $multiple";
?>
