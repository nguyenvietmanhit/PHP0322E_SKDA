<?php
session_start();
require_once 'connection.php';
//create.php
// XỬ LÝ FORM:
// + B1: Debug:
echo '<pre>';
print_r($_POST);
print_r($_FILES);
echo '</pre>';
// + B2: Tạo biến chứa lỗi và kết quả:
$error = '';
$result = '';
// + B3: Nếu submit form thì mới xử lý form:
if (isset($_POST['submit'])) {
    // + B4: Lấy giá trị từ form:
    $fullname = $_POST['fullname'];
    $age = $_POST['age'];
    $avatars = $_FILES['avatar']; //mảng 1 chiều
    // + B5: Validate form:
    // - Fullname và age ko đc để trống
    // - File upload phải là ảnh
    // - File upload dung lượng < 2Mb
    if (empty($fullname) || empty($age)) {
        $error = 'Fullname và age ko đc để trống';
    } elseif ($avatars['error'] == 0) {
        // - File upload phải là ảnh
        // Lấy đuôi file:
        $extension = pathinfo($avatars['name'], PATHINFO_EXTENSION);
        $allows = ['png', 'jpg', 'jpeg', 'gif'];
        if (!in_array($extension, $allows)) {
            $error = 'File upload phải là ảnh';
        }
        // - File upload dung lượng <= 2Mb
        // 1MB = 1024 KB = 1024 * 1024 B
        $size_mb = $avatars['size'] / 1024 / 1024;
        if ($size_mb > 2) {
            $error = 'File upload dung lượng phải <= 2Mb';
        }
    }
    // + B6: Xử lý logic chính chỉ khi ko có lỗi nào xảy ra:
    if (empty($error)) {
        $filename = ''; //lưu tên file upload
        // - Xử lý upload file nếu có file đc tải lên:
        if ($avatars['error'] == 0) {
            $dir_upload = 'uploads';
            if (!file_exists($dir_upload)) {
                mkdir($dir_upload);
            }
            // Tạo tên file mang tính duy nhất:
            $filename = time() . "-" . $avatars['name'];
            move_uploaded_file($avatars['tmp_name'],
                "$dir_upload/$filename");
        }
        // - Lưu vào CSDL sử dụng truy vấn INSERT:
        // + Viết truy vấn:
        $sql_insert = "INSERT INTO users(fullname,age,avatar)
VALUES('$fullname', $age, '$filename')";
        // + Thực thi truy vấn: INSERT trả về boolean
        $is_insert = mysqli_query($connection, $sql_insert);
        if ($is_insert) {
            $_SESSION['success'] = 'Thêm mới user thành công';
            header('Location: index.php');
            exit();
        }
        $error = 'Thêm mới thất bại';
    }
}
// + B7: Đổ error và result ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<!--users: id, fullname, age, avatar, created_at -->
<h2>Form thêm mới user</h2>
<form action="" method="post" enctype="multipart/form-data">
    Nhập fullname:
    <input type="text" name="fullname" value="" />
    <br />
    Nhập tuổi:
    <input type="number" name="age" value="" />
    <br />
    Tải ảnh đại diện:
    <input type="file" name="avatar" />
    <br />
    <input type="submit" name="submit" value="Lưu" />
    <a href="index.php">Về trang danh sách</a>
</form>
