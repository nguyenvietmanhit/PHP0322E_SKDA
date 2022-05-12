<?php
//read_file.php
// Đọc nội dung file với PHP: có 2 cách đọc file:
// Tạo 1 file ngang hàng read.txt
// - Đọc từng hàng: giữ nguyên cấu trúc file
$reads = file('read.txt');
echo "<pre>";
print_r($reads);
echo "</pre>";
foreach ($reads AS $read) {
  echo "$read <br />";
}
// - Đọc toàn bộ nội dung:
$content = file_get_contents('read.txt');
echo $content;
