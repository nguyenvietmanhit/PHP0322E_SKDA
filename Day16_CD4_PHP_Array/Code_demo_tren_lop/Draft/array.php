<?php
// Kiểu dữ liệu mảng/ Array
// 1 - Định nghĩa: là 1 biến lưu đc nhiều giá trị tại 1 thời điểm
// VD: lưu tên của 500 ae
// Thủ công: tạo 500 biến lưu 500 tên
$name1 = 'A';
$name2 = 'B';
$name3 = 'C';
// Dùng mảng để lưu:
$names = ['A', 'B', 'C']; // 3 phần tử mảng
// Mảng có nhiều phần tử bên trong
// 2 - Khai báo mảng:
$names = ['A', 'B', 'C']; //cách thông dụng nhất
$arrs = array('A', 'B', 'C'); //PHP < 5.4
// 3 - Thuật ngữ liên quan đến mảng:
// element: là phần tử mảng
// key: là giá trị để xác định ra phần tử mảng,
// value: là giá trị của phần tử mảng dựa vào key
// -> để xác định đc 1 phần tử mảng, bắt buộc phải biết key của nó
// + Cách xác định key của phần tử mảng
// Mặc định key nếu ko khai báo tường mình, sẽ bắt đầu bằng = 0
$names = ['A', 'B', 'C', 'D', 'E']; //5
//Lấy giá trị thủ công của phần tử mảng dựa vào key:
echo $names[0]; //A
echo $names[3]; //D
echo $names[4]; //E
// echo $names[100]; //báo lỗi ko có phần tử nào đang có key=100
// + Nhận biết key bằng cú pháp debug mảng như sau:
// nên dùng cú pháp này khi debug mảng
echo "<pre>";
print_r($names);
echo "</pre>";
// 4 - Vòng lặp foreach: chuyên dùng để lặp mảng
$names = ['A', 'B', 'C', 'D', 'E'];
// + Thử dùng for lặp mảng:
// Lấy số phần tử mảng:
$count = count($names); //5
for ($key = 0; $key < $count; $key++) {
  echo "Key: $key, Value: " . $names[$key] . "<br />";
}
//
// + Dùng foreach, có 2 dạng foreach:
$names = ['A', 'B', 'C', 'D', 'E'];
// Cơ chế lặp của foreach: tự động đi qua từng phần tử mảng, mỗi lần đi qua biết
//đc luôn key và value tương ứng của phần tử mảng đó. Khi đi qua hết các phần
//tử mảng, vòng lặp tự dừng
// Dạng đầy đủ cả key value
foreach ($names AS $key => $value) {
  echo "Key: $key, Value: $value <br />";
}
// Dạng khuyết key: khi ko cần thao tác với key
foreach ($names AS $value) {
  echo "Value: $value <br />";
}
// Biến $key, $value đặt tùy ý
// 5 - Phân loại mảng
// + Mảng số nguyên: toàn bộ key đều ở dạng số nguyên
$arr1 = [1, 2, 3, 'a', 'b', 'c'];
echo "<pre>";
print_r($arr1);
echo "</pre>";
foreach ($arr1 AS $k => $v) {
  echo "Key: $k, Value: $v <br />";
}
// + Mảng kết hợp: có key xuất hiện ở dạng string, mô tả thông tin tốt hơn
// => hay gặp trong PHP
$infos = [
  'name' => 'manh',
  'age' => 31,
  'address' => 'HN'
];
echo "<pre>";
print_r($infos);
echo "</pre>";
foreach ($infos AS $key => $value) {
  echo "Key: $key, Value: $value <br />";
}
// Lấy thủ công
echo $infos['name']; //manh
echo $infos['age']; //31
echo $infos['address']; //HN
// + Mảng đa chiều: mảng trong mảng
$arrs = [
  'name' => 'manh',
  'info' => [
    'class' => 'PHP0921E2',
    'amount' => 16
  ]
];
// dùng foreach cẩn thận với mảng đa chiều
foreach ($arrs AS $key => $value) {
//  echo "Key: $key, Value: $value <br />";
  var_dump($key);
  var_dump($value);
}
// Lấy giá trị thủ công từ mảng đa chiều:
echo $arrs['info']['amount']; //16
echo $arrs['info']['class']; //PHP0921E2
// Mảng càng nhiều càng phức tạp, nếu mảng do bạn tạo ra thì chỉ nên
//dừng ở tối đa 3 chiều

// 6 - Cú pháp viết tắt của foreach khi làm việc với HTML phức tạp
// Hiển thị 4 môn học vào cấu trúc bảng: 1 hàng 1 cột -> 4 hàng
$arrs = ['HTML', 'CSS', 'JS', 'PHP'];
// + Echo HTML bằng PHP

echo "<table border='1' cellpadding='6' cellspacing='0'>";
foreach ($arrs AS $language) {
  echo "<tr>";
    echo "<td>$language</td>";
  echo "</tr>";
}
echo "</table>";
// + Viết tách PHP và HTML sử dụng cú pháp viết tắt của foreach
?>

<table border="1" cellpadding="6" cellspacing="0">
  <?php foreach($arrs AS $language): ?>
    <tr>
      <td><?php echo $language; ?></td>
    </tr>
  <?php endforeach; ?>
</table>

