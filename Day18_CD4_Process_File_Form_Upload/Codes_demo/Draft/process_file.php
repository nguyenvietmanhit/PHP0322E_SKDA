<?php
//process_file.php
// THAO TÁC ĐỌC GHI FILE
// - Đọc file: tạo 1 file demo.txt, ngang hàng với file
//process_file.php hiện tại, nhập nhiều hàng dữ liệu
//cho file demo.txt
// + Đọc từng hàng dữ liệu của file:
$reads = file('demo.txt');
echo '<pre>';
print_r($reads);
echo '</pre>';
foreach ($reads AS $read) {
    echo $read . "<br />";
}
// + Đọc toàn bộ file, ko quan tâm đến hàng dữ liệu
$output = file_get_contents('demo.txt');
var_dump($output);
// - Ghi file:
// + Ghi đè file:
file_put_contents('abc.txt', 'hello world');
// + Ghi nối tiếp:
file_put_contents('def.txt', 'manhnv', FILE_APPEND);
// - Một số hàm thao tác với file/thư mục:
// + Ktra đường dẫn tới file/thư mục có tồn tại hay ko:
$check = file_exists('abc'); // false
// + Hàm xóa file:
unlink('abc.txt');
