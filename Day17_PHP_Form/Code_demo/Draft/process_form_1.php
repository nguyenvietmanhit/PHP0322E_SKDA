<!--process_form_1.php-->
<!--Demo quy trình/các bước xử lý form/xử lý dữ liệu từ user gửi lên với PHP-->

<?php
// Nơi xử lý form nên khai báo trước HTML
// + B1: Tạo biến chứa lỗi và kết quả
$error = '';
$result = '';
// + B2: Debug mảng dữ liệu gửi lên dựa vào method của form
echo "<pre>";
print_r($_POST);
echo "</pre>";
// + B3: Xử lý submit form chỉ khi user đã submit form/gửi thông tin đi, dựa vào name của nút submit để biết user đã submit
//form hay chưa
// Để ktra 1 mảng tồn tại 1 phần tử theo key hay ko, dùng hàm isset
if (isset($_POST['show'])) {
    // User đã submit form
  // + B4: Tạo biến trung gian để thao tác cho dễ (optional)
   $fullname = $_POST['fullname'];
  // + B5: Validate form: lọc dữ liệu từ user, nếu có lỗi đổ vào biến error
  // - Fullname ko đc để trống và fullname phải > 4 ký tự
  // Hàm empty: ktra 1 giá trị có bị rỗng hay ko
  // Lấy độ dài ký tự: strlen
  if (empty($fullname)) {
      $error = 'Tên ko đc để trống';
  } elseif (strlen($fullname) <= 4) {
      $error = 'Tên phải nhập > 4 ký tự';
  }
  // + B6: Xử lý logic chính của bài toán chỉ khi nào ko có lỗi xảy ra
  if (empty($error)) {
      $result = "Tên của bạn là: $fullname";
  }

  // + B7: Hiển thị thông lỗi lỗi và kết quả ra màn hình
}
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<!--+ B8: Đổ lại thông tin đã nhập ra form (thực tế luôn luôn cần)-->
<form method="post" action="">
    Nhập tên của bạn:
<!--  Bắt buộc phải khai báo name cho input, để PHP biết đc dữ liệu gửi lên từ input nào  -->
    <input type="text" name="fullname" value="<?php echo isset($_POST['fullname']) ? $_POST['fullname'] : '' ?>" />
    <br />
    <input type="submit" name="show" value="Show info" />
</form>
