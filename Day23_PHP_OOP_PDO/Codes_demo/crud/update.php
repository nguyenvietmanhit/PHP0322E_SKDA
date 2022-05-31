<?php
session_start();
require_once 'connection.php';
//crud/update.php
// update.php?id=3
// - Validate tham số id trên url:
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['error'] = 'Tham số id ko hợp lệ';
    header('Location: index.php');
    exit();
}
// - Lấy giá trị id từ url:
$id = $_GET['id'];
// - Lấy thông tin user tương ứng đổ ra form
// Thực hiện truy vấn CSDL:
// + Viết truy vấn:
$sql_select_one = "SELECT * FROM users WHERE id = $id";
// + Thực thi truy vấn: SELECT trả về obj trung gian
$result_one = mysqli_query($connection, $sql_select_one);
// + Trả về mảng kết hợp 1 chiều:
$user = mysqli_fetch_assoc($result_one);
echo '<pre>';
print_r($user);
echo '</pre>';

// - Xử lý form: tận dụng code xử lý form của Thêm mới
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
        // - Xử lý upload file nếu như có file đc tải lên:
        $filename = $user['avatar'];
        if ($avatars['error'] == 0) {
            if (!file_exists('uploads')) {
                mkdir('uploads');
            }
            // Xóa file cũ để tránh rác hệ thống:
            unlink("uploads/$filename");
            // Upload file mới:
            $filename = time() . "-" . $avatars['name'];
            move_uploaded_file($avatars['tmp_name'],
                "uploads/$filename");
        }
        // - Truy vấn CSDL để update dữ liệu:
        // + Viết truy vấn:
        $sql_update = "UPDATE users 
SET fullname = '$fullname', age=$age, avatar='$filename'
WHERE id = $id";
        // + Thực thi truy vấn: UPDATE trả về boolean
        $is_update = mysqli_query($connection, $sql_update);
        if ($is_update) {
            $_SESSION['success'] = "Cập nhật thành công";
            header('Location: index.php');;
            exit();
        }
        $error = 'Cập nhật thất bại';
    }
}
// + B7: Đổ error và result ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<h2>Form cập nhật user</h2>
<form action="" method="post" enctype="multipart/form-data">
    Nhập fullname:
    <input type="text" name="fullname"
           value="<?php echo $user['fullname']?>" />
    <br />
    Nhập tuổi:
    <input type="number" name="age"
           value="<?php echo $user['age']?>" />
    <br />
    Tải ảnh đại diện:
    <input type="file" name="avatar" />
    <?php if (!empty($user['avatar'])): ?>
        <img src="uploads/<?php echo $user['avatar']?>"
             height="80px" />
    <?php endif; ?>
    <br />
    <input type="submit" name="submit" value="Lưu" />
    <a href="index.php">Về trang danh sách</a>
</form>
