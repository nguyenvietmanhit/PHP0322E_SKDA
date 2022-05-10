<!--demo_form_1.php-->
<!--Cần chuẩn bị nội dung sau cho đồ án cuối khóa
- Xác định chủ đề website:
+ Bán hàng: thông dụng nhất
+ Tin tức: ko nên chọn vì đơn giản quá
+ Thi online/thi trắc nghiệm: hay và mới lạ
- Dựng giao diện tĩnh (HTML CSS Javascript):
+ Code tay hết dựa vào 1 mẫu nào đó: ưu tiên
+ Tìm template có sẵn: template html css free
Cần dựng giao diện cho 2 phần: frontend và admin
Phần admin: AdminLTE
Phần frontend: dựa vào 1 trang mẫu, trải nghiệm trang
đó -> code theo trang mẫu
- Xác định số lượng thành viên nhóm: có thể làm độc lập
hoặc nhóm tối đa 3 thành viên
-->

<!--
1/ Form là gì?
- Là nơi chứa các ô nhập liệu, dùng để gửi thông tin
lên server
- Form có 2 dạng cơ bản:
+ Lấy thông tin dạng cơ bản như text, số, ...
+ Lấy thông tin dưới dạng file upload
 -->
<!--
Thẻ form có 2 thuộc tính cơ bản:
+ action: là nơi xử lý dữ liệu từ form gửi đi, có thể
là file hiện tại hoặc file khác
Nếu action là chuỗi rỗng, chính là file hiện tại xử lý
+ method: phương thức truyền dữ liệu lên server:
- get:
Dữ liệu đổ lên url theo dạng: abc.php?<name>=<value>
VD: demo_form_1.php?fullname=dsadsadsa&submit=Gửi
GET ko dùng cho chức năng mà có input nhạy cảm như mật
khẩu, tài khoản ngân hàng ...
-  post:
Dữ liệu đc truyền ngầm, ko thể hiện ra url như get
Dùng cho các form chứa dữ liệu nhạy cảm

-->
<?php
// 2 - Quy trình xử lý form:
// - B1: Debug / Xem thông tin biến
// Cần debug cái mảng lưu thông tin từ form gửi lên
// Nếu form có method = post, debug mảng $_POST
// Nếu form có method = get, debug mảng $_GET
// (Ngoài ra có thể dùng $_REQUEST để debug, tuy nhiên
// ko ưu tiên bằng $_POST hoặc $_GET
echo '<pre>';
print_r($_POST);
echo '</pre>';
// Khi form chưa submit thì $_POST rỗng, sau khi submit
//thì $_POST sẽ có phần tử mảng dựa theo name của các
//input
//- B2: KHai báo 2 biến chứa lỗi và kết quả:
$error = '';
$result = '';
//- B3: Kiểm tra nếu user submit form thì mới xử lý form:
// Logic: dựa vào name của nút submit, kiểm tra nếu
//tồn tại mảng $_POST với key là name của nút submit
if (isset($_POST['submit'])) {
    // - B4: Tạo biến trung gian lấy từ $_POST để
    //thao tác cho dễ (cần chắc chắn là key muốn lấy
    //luôn luôn tồn tại)
    $fullname = $_POST['fullname'];
    // - B5: Validate form, là lọc dữ liệu mà đc quy
    //định trước
    // + Tên bắt buộc phải nhập: empty
    // + Tên ít nhất 3 ký tự: strlen
    // + Tên phải có định dạng email: filter_var
    // Nguyên tắc validate, nếu như có lỗi đổ thông tin
    //lỗi đó vào biến error
    if (empty($fullname)) {
        $error = 'Tên phải nhập';
    } elseif (strlen($fullname) < 3) {
        $error = 'Tên phải nhập ít nhất 3 ký tự';
    } elseif (!filter_var($fullname,
        FILTER_VALIDATE_EMAIL)) {
        $error = 'Tên phải có định dạng email';
    }
    //- B6: Xử lý logic chính của bài toán chi khi ko
    //có lỗi nào xảy ra, đổ thông tin kết quả vào biến
    //result
    if (empty($error)) {
        $result = "Tên bạn vừa nhập là: $fullname";
    }
    //- B7: hiển thị error và result ra form
}
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result;
?></h3>
<form action="" method="post">
    Nhập tên của bạn:
<!--  Khi xử lý form bắt buộc phải khai báo thuộc tính
  name cho input, vì name chính là dấu hiệu nhận biết
  để server biết đc dữ liệu gửi lên là của input nào-->
<!-- - B8: Đổ lại dữ liệu đã nhập ra input form -->
    <input type="text" name="fullname"
value="<?php echo isset($_POST['fullname'])
    ? $_POST['fullname'] : '' ?>"
    placeholder="Nhập tên của bạn..."
    />
    <input type="submit" name="submit" value="Gửi" />
</form>