<!--
upload_file.php
XỬ LÝ UPLOAD FILE TRONG PHP
-->
<?php
// XỬ LÝ FORM:
// - B1: Debug:
// Xử lý file thì bắt buộc phải upload file, cần rất nhiều thông
//tin, nếu chỉ dựa vào tên file thì sẽ ko upload đc
// + Để upload đc file, thì form bắt buộc phải thỏa mãn 2 đk sau:
// - Method form phải là POST
// - Thêm thuộc tính vào thẻ form là enctype=multipart/form-data
// + PHP tạo ra sẵn 1 biến dạng mảng 2 chiều là $_FILES lưu toàn
//bộ thông tin của file đc upload, chứ $_POST / $_GET sẽ ko bắt
//đc
// + Các thuộc tính của $_FILES:
// - name và full_path: tên file upload
// - type: kiểu file
// - tmp_name: (temporary) là đường dẫn tạm, lưu tạm thời đường
//dẫn của file sau khi submit form
// - error: mã lỗi upload
// = 0: ko có lỗi nào, dựa vào mã lỗi này để biết đc file đc
//tải lên thành công vào thư mục tạm hay ko
// = 1: file upload vượt quá dung lượng cho phép của hệ thống
//  =4 : ko có file nào đc tải lên
// - size: dung lượng file tính bằng Byte
// 1Mb = 1024 Kb = 1024 * 1024 B = 1024 * 1024 * 8 bit
echo '<pre>';
print_r($_POST);
print_r($_FILES);
echo '</pre>';
// - B2: Tạo biến chứa lỗi và kết quả:
$error = '';
$result = '';
// - B3: Ktra nếu submit thì mới xử lý form:
if (isset($_POST['upload'])) {
    // - B4: Lấy giá trị từ form
    $avatars = $_FILES['avatar']; //mảng 1 chiều
    // - B5: Validate form:
    // + File upload phải là ảnh: jpg, png, jpeg, gif
    // + File upload dung lượng ko đc vượt quá 2Mb
    // Chỉ xử lý đc file khi có file tải lên, luôn dựa vào
    //thuộc tính error
    if ($avatars['error'] == 0) {
        //+ File upload phải là ảnh:
        // Lấy đuôi file dựa theo tên file upload:
        $extension = pathinfo($avatars['name'], PATHINFO_EXTENSION);
        // Chuyển đuôi file về ký tự thường:
        $extension = strtolower($extension);
        // Tạo mảng chứa các đuôi file ảnh hợp lệ:
        $allows = ['png', 'jpg', 'jpeg', 'gif'];
        if (!in_array($extension, $allows)) {
            $error = 'File upload phải là ảnh';
        }
        // + File upload ko đc vượt quá 2MB
        $size_b = $avatars['size'];
        $size_mb = $size_b / 1024 / 1024;
        if ($size_mb > 2) {
            $error = 'File upload ko đc vượt quá 2MB';
        }
    }
    // - B6: Xử lý logic bài toán chỉ khi ko có lỗi nào xảy ra
    if (empty($error)) {
        // + Xử lý upload file khi có file đc tải lên
        // Khởi tạo biến lưu tên file:
        $filename = '';
        if ($avatars['error'] == 0) {
            // Tạo thư mục chứa file sẽ upload lên
            $dir_upload = 'uploads';
            // Ko đc tạo thư mục bằng tay, phải tạo bằng code
            // Phải ktra nếu thư mục chưa tồn tại thì mới tạo
            // file_exists
            if (!file_exists($dir_upload)) {
                mkdir($dir_upload);
            }
            // Tạo ra tên file mang tính duy nhất để tránh trường
            //hợp ghi đè file khi upload file trùng tên:
            $filename = time() . "-" . $avatars['name'];
            // Upload file từ thư mục tạm vào thư mục chỉ định
            $is_upload = move_uploaded_file($avatars['tmp_name'],
            "$dir_upload/$filename");
            if ($is_upload) {
                $result .= "Ảnh đại diện:";
                $result .= "<img src='$dir_upload/$filename' height='50px' />";
                $result .= "<br />Dung lượng file: $size_mb Mb";
            }
        }
    }
}
// - B7 - Hiển thị error và result ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="post" enctype="multipart/form-data">
    Tải ảnh đại diện:
    <input type="file" name="avatar" />
    <br />
    <input type="submit" name="upload" value="Tải lên" />
</form>
