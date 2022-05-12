<?php
//write_file.php
// Ghi file trong PHP: có 2 kiểu ghi file:
// - Ghi đè file: nội dung trc đó trong file sẽ mất
file_put_contents('write.txt', 'Nội dung file bị ghi đè');
// - Ghi nối file: nối thêm nội dung mới vào nội dung đang có trong file
file_put_contents('write_append.txt', 'Nội dung file ghi nối', FILE_APPEND);

// - Một số hàm về xử lý file:
// + Xóa file: unlink
unlink('read.txt');
// + Check đường dẫn tới file/thư mục có tồn tại hay ko: file_exists
$check1 = file_exists('write.txt'); //true
$check2 = file_exists('../Codes_demo'); //true
