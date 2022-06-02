<?php
//crud/sql_injection.php
// Lỗi bảo mật SQL Injection:
// - Là kỹ thuật tấn công thông qua câu truy vấn, làm thay đổi
//câu truy vấn, đc thực hiện thông qua form
// - Xử lý form
require_once 'connection.php';
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    // - Để chống lỗi bảo mật này, cần lọc dữ liệu từ form
    //bằng cách sau:
    $fullname = mysqli_real_escape_string($connection, $fullname);
    // Truy vấn CSDL:
    // + Viết truy vấn:
    $sql_select_all = "SELECT * FROM users 
WHERE fullname LIKE '%$fullname%'";
    var_dump($sql_select_all);
    // + Thực thi truy vấn: SELECT trả obj
    $result_all = mysqli_query($connection, $sql_select_all);
    // + Trả về mảng kết hợp 2 chiều:
    $users = mysqli_fetch_all($result_all, MYSQLI_ASSOC);
    // 123456' OR fullname != '
    echo '<pre>';
    print_r($users);
    echo '</pre>';
}
?>
<form action="" method="post">
    Nhập tên:
    <input type="text" name="fullname" value="" />
    <input type="submit" name="submit" value="Tìm kiếm" />
</form>
