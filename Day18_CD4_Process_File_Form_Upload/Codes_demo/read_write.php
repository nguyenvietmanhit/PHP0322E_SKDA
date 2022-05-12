<?php
//read_write.php
// ĐỌC GHI FILE TRONG PHP
// 1 - Đọc file:
// + Đọc từng hàng: giữ nguyên đc định dạng file
$reads = file('read.txt');
echo '<pre>';
print_r($reads);
echo '</pre>';
foreach ($reads AS $read) {
    echo $read . "<br />";
}
// + Đọc toàn bộ file
echo file_get_contents('read.txt');
//echo file_get_contents('https://vnexpress.net');
// 2 - Ghi file:
// + Ghi đè:
file_put_contents('overide.txt', 'Ghi đè file');
// + Ghi nối tiếp
file_put_contents('append.txt', 'Ghi nối tiếp',
    FILE_APPEND);
// 3 - Một số hàm xử lý file:
// + Ktra đường dẫn file/thư mục tồn tại hay chưa: file_exists
$check = file_exists('abc.txt'); //false
// + Xóa file: unlink
unlink('append.txt');
