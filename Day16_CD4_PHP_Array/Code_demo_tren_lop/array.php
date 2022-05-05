<!--array.php-->
<?php
// MẢNG TRONG PHP
// 1 - Khái niệm:
// + Mảng là 1 kiểu dữ liệu trong PHP
// VD: lưu thông tin tên của 500 anh em  -> tạo 500 biến, mỗi
//biến lưu 1 tên, hiển thị tên của toàn bộ 500 ae
// -> sử dụng mảng để lưu 500 tên ae
// + Mảng có thể lưu trữ đc nhiều giá trị tại 1 thời điểm, các giá
//trị này có thế là bất cứ kiểu dữ liệu nào
// 2 - Cú pháp khai báo: có 2 cách:
// C1: dùng từ khóa array, dùng cho mọi phiên bản PHP
$names = array('A', 'B', 'C', 'D', 'E');
// C2: dùng [], dùng cho PHP >= 5.4 -> ưu tiên dùng
$names = ['A', 'B', 'C', 'D', 'E'];
// 3 - Thuật ngữ:
// + Element / Phần tử mảng: ngăn cách bởi dấu ,
// + Key / Index / Chỉ mục: giá trị xác định phần tử mảng, mặc
//định key của mảng bắt đầu từ 0
// + Value: giá trị của phần tử mảng theo key tương ứng
// VD:
$numbers = [3, 4, 5];
// Phần tử mảng đầu tiên, key = 0, value = 3
// Phần tử thứ 2, key = 1, value = 4
// Phần tử thứ 3, key = 2, value = 5
// 4 - Cách debug mảng:
echo '<pre>';
print_r($numbers);
echo '</pre>';
// 5 - Thao tác với mảng:
// + Lấy giá trị của phần tử mảng:
// NGuyên tắc chung khi lấy giá trị: luôn luôn phải biết key
//thì mới lấy đc giá trị
$names = ['A', 'B', 'C', 'D', 'E'];
echo '<pre>';
print_r($names);
echo '</pre>';
echo $names[4]; //E
echo $names[1]; //B
echo $names[0]; //A
echo $names[2]; //C
echo $names[3]; //D
// echo $names[5]; // báo lỗi ko tồn tại phần tử mảng với key = 5
// -> là cách lấy giá trị theo kiểu thủ công
// -> trong trường hợp muốn thao tác với toàn bộ phần tử mảng,
// nên dùng vòng lặp để lặp mảng
// Dùng for để lặp mảng:
$names = ['A', 'B', 'C', 'D', 'E'];
$count = count($names); //5
for ($key = 0; $key < $count; $key++) {
    echo $names[$key];
}
// 6 - Vòng lặp foreach: là vòng lặp chuyên dùng để lặp mảng
$names = ['A', 'B', 'C', 'D', 'E'];
foreach ($names AS $key => $value) {
    echo "<br /> Key = $key, value = $value";
}
// Cơ chế: duyệt qua từng phần tử mảng, tự xác định đc cặp
//key value và thể hiện ra luôn qua các biến trong foreach
foreach ($names AS $k => $v) {
    echo "<br /> Key = $k, value = $v";
}
// Foreach dạng khuyết key, dùng khi ko cần thao tác với key
//của phần tử mảng
foreach ($names AS $value) {
    echo "<br /> Value = $value";
}
// 7 - Phân loại mảng:
// + Mảng số nguyên/tuần tự: là mảng đơn giản nhất, toàn bộ key
//của mảng đều ở dạng số nguyên
$names = ['A', 'B', 'C'];
echo '<pre>';
print_r($names);
echo '</pre>';
// + Mảng kết hợp: key của mảng xuất hiện ở dạng chuỗi
$infos = [
    'name' => 'manhnv',
    'age' => 32,
    'address' => 'Hà Nội'
];
echo '<pre>';
print_r($infos);
echo '</pre>';
foreach ($infos AS $field => $field_value) {
    echo "<br />Key = $field, Value = $field_value";
}
// + Mảng đa chiều: mảng trong mảng
$infos = [
    'name' => 'manhnv',
    'info' => [
        'class_name' => 'php0322e',
        'amount' => 25,
        'colors' => ['red', 'blue', 'green']
    ]
];
// Lấy giá trị của mảng đa chiều dựa theo cách thủ công:
echo $infos['info']['amount']; //25
echo $infos['info']['colors'][2]; //green
// Nếu mảng tự định nghĩa ra, thì nên dừng ở tối đa 3 chiều
foreach ($infos AS $key => $value) {
    //echo "<br /> Key: $key, Value: $value";
}
// 8 - Cú pháp viết tắt của foreach khi hiển thị HTML phức tạp:
// + Hiển thị HTML hoàn toàn bằng PHP
$arrs = ['PHP', 'HTML', 'CSS', 'JS'];
echo "<table border='1' cellspacing='0' cellpadding='8'>";
    echo "<tr>";
        echo "<th>Tên khóa học</th>";
    echo "</tr>";
    foreach ($arrs AS $name) {
        echo "<tr>";
            echo "<td>$name</td>";
        echo "</tr>";
    }
echo "</table>";
// + Sử dụng cú pháp viết tắt của foreach để tách biệt code HTML
//và PHP:
?>
<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>Tên khóa học</th>
    </tr>
    <?php foreach($arrs AS $name): ?>
        <tr>
            <td><?php echo $name; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
