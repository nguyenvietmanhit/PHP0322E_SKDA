<?php
//upload_file.php
// Cách xử lý file trong form PHP
// - Debug: thử xem $_GET/$_POST có bắt đc thông tin file gửi lên hay ko?
// -> $_GET ko bắt đc
// -> $_POST ko bắt đc
// - PHP sử dụng biến mảng $_FILES để chứa thông tin file gửi lên
// - 2 điều kiện để PHP bắt đc thông tin file gửi lên:
// + Method của form phải là POST
// + Phải khai báo giá trị cho cho form: enctype=multipart/form-data
//echo "<pre>";
//print_r($_FILES);
//echo "</pre>";
// - $_FILES là mảng 2 chiều
// - Các thuộc tính của $_FILEs:
// + name: tên file upload
// + type: kiểu file
// + tmp_name: tên bộ nhớ tạm, XAMPP lưu tạm file upload vào vị trí lưu tạm của nó,
//mục đích để chờ bạn chuyển từ thư mục tạm tới thư mục đích
// + error: mã lỗi
// = 0 -> có file đc tải lên, đc lưu thành công vào bộ nhớ đệm của XAMPP
// = 1 -> báo lỗi file upload vượt quá dung lượng file cho phép của hệ thống
// = 2 -> số file upload vượt quá cấu hình của form
// = 4 -> ko có file nào đc upload
//...
// -> chỉ cần quan tâm đến error = 0, nếu = 0 thì có file đc tải lên, ngược lại
// là có lỗi
// + size: dung lượng file tính bằng Byte (B)
// 1GG = 1024MB, 1MB = 1024KB, 1KB = 1024B -> 1MB = 1024 * 1024 B, 1B = 8 bit
//QUY TRÌNH XỬ LÝ FORM:
// - Debug:
echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";
// - Tạo biến lỗi và kết quả:
$error = '';
$result = '';
// - Xử lý form chỉ khi user submit form:
if (isset($_POST['submit'])) {
    // - Tạo biến trung gian
    $fullname = $_POST['fullname'];
    $avatars = $_FILES['avatar']; //$avatars là mảng 1 chiều
  // - Validate form:
  // + Fullname ko đc để trống
  // + File upload phải là ảnh: png, jpg, jpeg, gif
  // + File upload dung lượng ko đc vượt quá 2MB
  if (empty($fullname)) {
      $error = 'Fullname ko đc để trống';
  } elseif ($avatars['error'] == 0) {
      // Chắc chắn có file tải lên
    // + Validate file upload phải là ảnh:
    // Lấy đuôi file upload:
    $extension = pathinfo($avatars['name'], PATHINFO_EXTENSION); //jpg, png, docx, xlsx ...
    // Chuyển về chữ thường
    $extension = strtolower($extension);
    // Tạo 1 mảng chứa các đuôi file ảnh hợp lệ
    $allowed = ['jpg', 'png', 'jpeg', 'gif'];
    if (!in_array($extension, $allowed)) {
        $error = 'File upload phải là ảnh';
    }
    // + Validate dung lương file max = 2MB
    $size_b = $avatars['size']; // 1Mb = 1024KB = 1024 * 1024B
    $size_mb = $size_b / 1024 / 1024;
    // Làm tròn biến theo phần thập phân để hiển thị cho đẹp
    $size_mb = round($size_mb, 2); // 2.124343434343 -> 2.12, 2.7676767676 -> 2.77
    if ($size_mb > 2) {
        $error = 'File upload ko đc vượt quá 2MB';
    }
  }

  // - Xử lý logic chính chỉ khi nào ko có lỗi xảy ra
  $filename = '';
  if (empty($error)) {
    $result .= "Fullname: $fullname <br />";
    // + Xử lý upload file vào thư mục đích với đk phải có file upload lên
    if ($avatars['error'] == 0) {
      // Khai báo thư mục chứa các file tải lên
      $dir_uploads = 'uploads';
      // Tạo thư mục trên bằng code, chứ ko tạo bằng tay, chú ý là chỉ tạo thư mục
      // khi chưa tồn tại -> file đang tồn tại bị xóa
      if (!file_exists($dir_uploads)) {
        mkdir($dir_uploads);
      }
      // Tạo tên file upload mang tính duy nhất -> tránh file bị ghi đè khi trùng tên
      $filename = time() . '-' . $avatars['name'];
      // Chuyển file từ thư mục tạm mà XAMPP đang lưu về thư mục đích
      move_uploaded_file($avatars['tmp_name'], "$dir_uploads/$filename");
      $result .= "<img src='$dir_uploads/$filename' height='80px' /> <br />";
      $result .= "Tên file: $filename <br />";
      $file_mb = round($avatars['size'] / 1024 / 1024, 2);
      $result .= "Dung lượng file: $file_mb <br />";
    }
  }
}
// - Hiển thị error và result ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="post" enctype="multipart/form-data">
    Fullname:
    <input type="text" name="fullname"
           value="<?php echo isset($_POST['fullname']) ? $_POST['fullname'] : '' ?>"/>
    <br/>
    Upload ảnh:
<!--  Với file thì thuộc tính value ko có ý nghĩa  -->
    <input type="file" name="avatar"/>
    <?php if (!empty($filename)): ?>
        <img src="uploads/<?php echo $filename?>"  height="50px" />
    <?php endif; ?>
    <br/>
    <input type="submit" name="submit" value="Upload"/>
</form>
