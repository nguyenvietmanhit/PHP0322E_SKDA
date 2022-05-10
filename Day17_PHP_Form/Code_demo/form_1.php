<!--
form_1.php
XỬ LÝ FORM TRONG PHP
1 - Form là gì ?
+ Là nơi chứa các input nhập liệu
+ Là thành phần ko thể thiếu với mọi web
+ Form có 2 dạng nhập thông tin:
- Dạng cơ bản: text, số, radio, checkbox, select
- Dạng file
2 - Ví dụ
3 - Xử lý form
+ action: thuộc tính của form, là url/file lấy đc toàn bộ thông
tin từ form gửi lên
action="" là file hiện tại xử lý form luôn
+ method: phương thức gửi dữ liệu đi
- post
dữ liệu đc truyền ngầm
dùng cho form nhạy cảm
PHP tạo sẵn 1 biến mảng $_POST lưu đc mọi thông tin từ form dạng
post gửi lên
- get
dữ liệu truyền lên url thao format: ?name1=value1&name2=value2
giới hạn url ko quá 1024 ký tự
dùng cho dữ liệu ko nhạy cảm: mật khẩu, ngân hàng ...
Dùng cho chức năng tìm kiếm
PHP tạo sẵn 1 biến mảng $_GET lưu mọi thông tin từ form dạng
get gửi lên
-->
<?php
// QUY TRÌNH XỬ LÝ FORM: 8 bước
// - B1: Debug: dựa vào method của form để debug biến tương ứng
//đang chứa thông tin từ form gửi lên
echo '<pre>';
print_r($_GET);
echo '</pre>';
// -> giúp nhìn rõ thông tin từ form gửi lên
// - B2: Khai báo biến chứa lỗi và kết quả
$error = '';
$result = '';
// - B3: Ktra nếu submit form thì mới xử lý form:
if (isset($_GET['send'])) {
    // - B4: Lấy giá trị từ form gửi lên thông qua gán biến
    $fullname = $_GET['fullname'];
    // - B5: Validate form: lọc dữ liệu từ user, giúp bảo mật
    //form và loại bỏ dữ liệu ko có ý nghĩa để tránh tốn tài
    // nguyên server
    // Logic validate: nếu có lỗi validate đổ thông tin lỗi vào
    // biến error
    // Yêu cầu validate:
    // + Họ tên ko đc để trống: empty
    // + Họ tên ít nhất 3 ký tự: strlen
    // + Họ tên phải có định dạng email: filter_var
    if (empty($fullname)) {
        $error = 'Họ tên ko đc để trống';
    } elseif (strlen($fullname) < 3) {
        $error = 'Họ tên ít nhất 3 ký tự';
    } elseif (!filter_var($fullname, FILTER_VALIDATE_EMAIL)) {
        $error = 'Họ tên phải có định dạng email';
    }
    // - B6: Xử lý logic bài toán chỉ khi nào ko có bất cứ lỗi
    //nào xảy ra
    if (empty($error)) {
        $result .= "Tên của bạn vừa nhập là: $fullname";
    }
}
// - B7: Hiển thị error và result ra form
// - B8: Đổ lại dữ liệu đã nhập ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="get">
    Nhập họ tên:
<!--  Input bắt buộc phải khai báo thuộc tính name, là dấu
  hiệu để PHP biết đc dữ liệu gửi lên là từ input nào-->
    <input type="text" name="fullname"
value="<?php echo isset($_GET['fullname'])
    ? $_GET['fullname'] : '' ?>" />
    <br />
<!--  Form ko thể thiếu nút submit/gửi thông tin đi  -->
    <input type="submit" name="send" value="Hiển thị" />
</form>
