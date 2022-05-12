<!--form_upload.php-->
<?php
// - XỬ LÝ FORM
// B1: Debug
//- method = get ko bắt đc hết thông tin của file
// - method = post cũng tương tự get, ko bắt đc hết
// - Để form bắt hết thông tin của file, bắt buộc form phải
//đáp ứng đc 2 điều kiện sau:
// + method của form phải là post
// + thêm thuộc tính enctype cho form
// - Sau khi form đáp ứng đc 2 điều kiện trên, thì các thông tin
//về file tải lên đc lưu trong biến mảng có sẵn của PHP $_FILES,
// là mảng 2 chiều
echo '<pre>';
print_r($_POST);
echo '</pre>';
echo '<pre>';
print_r($_FILES);
echo '</pre>';
// - Giải thích các thuộc tính của $_FILES:
// + name và full_path: tên file upload
// + type: kiểu file
// + tmp_name: đường dẫn tuyệt đối của thư mục tạm, là nơi lưu
//tạm file upload, tự động bị xóa sau 1 khoảng thời gian
// + error: thông tin lỗi, file có đc tải lên thư mục tạm thành
//công hay ko
// error = 0 -> ko có lỗi
// error = 1 -> lỗi vượt quá dung lượng cho phép của server
// -> chỉ cần dựa vào giá trị = 0
// + size: dung lượng file, tính bằng Byte B
// 1Mb = 1024 KB = 1024 * 1024 B
// B2: Tạo biến chứa lỗi và kết quả:
$error = '';
$result = '';
// B3 - Ktra nếu submit form thì mới xử lý:
if (isset($_POST['upload'])) {
    // B4: Tạo biến trung gian:
    $avatars = $_FILES['avatar'];
    // B5: Validate form:
    // + File upload phải là ảnh
    // + File upload dung lượng ko đc vượt quá 2MB
    // Luôn luôn phải check nếu có file tải lên thì mới xử lý:
    //, luôn dựa vào thuộc tính error của $_FILES
    if ($avatars['error'] == 0) {
        // + File upload phải là ảnh: jpg, jpeg, png, gif
        // Lấy đuôi file từ file tải lên:
        $extension = pathinfo($avatars['name'],
            PATHINFO_EXTENSION);
        // So sánh đuôi file lấy đc với 1 mảng đuôi file ảnh:
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($extension, $allowed)) {
            $error = 'File upload phải là ảnh';
        }
        // + File upload dung lượng ko đc vượt quá 2Mb
        $size_b = $avatars['size'];
        // Chuyền về MB:
        $size_mb = $size_b / 1024 / 1024;
        if ($size_mb > 2) {
            $error = 'File upload ko đc vượt quá 2 Mb';
        }
    }
    // B6: Xử lý logic chính chỉ khi nào ko có lỗi xảy ra
    if (empty($error)) {
        // + Xử lý upload file lên hệ thống, chỉ thực hiện khi
        //có file tải lên
        $filename = '';
        if ($avatars['error'] == 0) {
            // Tạo thư mục chứa file sẽ tải lên theo đường
            //dẫn tương đối:
            $dir_upload = 'uploads';
            // Check nếu thư mục trên chưa tồn tại thì tạo mới,
            //ko đc tạo thủ công thư mục trên, mà phải tạo bằng
            //code
            if (!file_exists($dir_upload)) {
                mkdir($dir_upload);
            }
            // Sinh ra tên file mang tính duy nhất, để tránh trường
            //hợp upload file trùng tên sẽ bị ghi đè nhau:
            $filename = time() . "-" . $avatars['name'];
            // Thực hiện upload file: chuyển file từ thư mục tạm
            //vào thư mục uploads
            $is_upload = move_uploaded_file($avatars['tmp_name'],
            "$dir_upload/$filename");
//            var_dump($is_upload);
            if ($is_upload) {
                // Hiển thị các thông tin file vừa upload
                $result .= "Ảnh vừa tải lên:";
                $result .= "<img src='$dir_upload/$filename' height='50px' />";
                $result .= "<br /> Tên file: $filename";
                $result .= "<br /> Dung lượng file: $size_mb Mb";
            }
        }
    }
}
// B7: Hiển thị lỗi và kết quả ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form method="post" action="" enctype="multipart/form-data">
    Tải ảnh đại diện:
    <input type="file" name="avatar" />
    <br />
    <input type="submit" name="upload" value="Show thông tin" />
</form>