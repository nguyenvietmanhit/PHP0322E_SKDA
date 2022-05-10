<!--
form_1.php
XỬ LÝ FORM TRONG PHP
1 - Form là gì ?
- Là nơi chứa các vùng có thể nhập liệu đc
- Form là thành phần ko thể thiếu với bất cứ 1 web nào
- Sau khi nhập liệu xong và gửi thông tin đi, PHP sẽ xử lý
các thông tin này -> xử lý form
- Form có 2 dạng nhập thông tin:
+ Dạng cơ bản: text, số, radio, checkbox
+ Dạng file
- Hai thuộc tính cơ bản của thẻ form:
+ action: url/file nhận thông tin từ form gửi lên, nếu action rỗng
thì file hiện tại sẽ xử lý thông tin luôn
+ method: phương thức gửi dữ liệu đi, có 2 phương thức:
- get: truyền các tham số lên url sau dấu ?
?name=value&name1=value1, dùng cho các chức năng như tìm kiếm
URL theo dạng get tối đa 1024 ký tự
PHP tạo ra sẵn 1 biến mảng là $_GET lưu đc toàn bộ thông tin
form dạng get
- post: truyền ngầm dữ liệu, dùng form ko chứa dữ liệu nhạy cảm
PHP tạo ra sẵn 1 biến mảng là $_POST lưu toàn bộ thông tin
form dạng post
-->
<?php
// XỬ LÝ FORM, viết code phía trên khai báo form
// + B1: Debug / Xem thông tin của biến, dựa vào method của form
//để debug mảng $_GET hoặc $_POST
echo '<pre>';
print_r($_POST);
echo '</pre>';
// -> ktra PHP bắt đc hết giá trị từ form hay chưa
// + B2: Khai báo biến lưu lỗi và kết quả
$error = '';
$result = '';
// + B3: Ktra nếu submit form thì mới xử lý form, dựa vào name
//của nút submit:
if (isset($_POST['send']) == true) {
    // + B4: Lấy giá trị từ form
    //, tạo biến trung gian để thao tác cho dễ
    $fullname = $_POST['fullname'];
    // + B5: Validate form: lọc dữ liệu để form bảo mật hơn và
    //server đỡ phải xử lý dữ liệu ko có ý nghĩa
    // Nếu như có lỗi validate, set lỗi đó cho biến error
    // - Yêu cầu validate:
    // + Họ tên ko đc để trống
    // + Họ tên ít nhất 3 ký tự
    // + Họ tên phải có định dạng email
    if (empty($fullname)) {
        $error = 'Họ tên phải nhập';
    } elseif (strlen($fullname) < 3) {
        $error = 'Họ tên ít nhất 3 ký tự';
    } elseif (!filter_var($fullname, FILTER_VALIDATE_EMAIL)) {
        $error = 'Họ tên phải có định dạng email';
    }
    // + B6: Xử lý logic chính của bài toán  chỉ khi ko có lỗi
    //nào xảy ra
    if (empty($error)) {
        $result .= "Tên bạn vừa nhập là: $fullname";
    }
}
// + B7: Hiển thị error và result ra form
// + B8: Đổ lại dữ liệu đã nhập ra form để tiện cho user
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="post">
    Nhập tên của bạn:
<!--  Bắt buộc phải khai báo thuộc tính name cho input, là dấu
  hiệu để PHP biết đc giá trị gửi đi là từ input nào-->
    <input type="text" name="fullname"
           placeholder="Hãy nhập họ tên"
value="<?php echo isset($_POST['fullname'])
    ? $_POST['fullname'] : '' ?>" />
    <br />
<!--  Form ko thể thiếu 1 nút để gửi thông tin đi -> nút
  submit form-->
    <input type="submit" name="send" value="Gửi" />
</form>
