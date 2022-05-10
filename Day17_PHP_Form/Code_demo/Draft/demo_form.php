<!--demo_form.php-->

<h1>Tạo form</h1>
<!--
1 / Method của form: có 2 giá trị
- GET:
+ Dữ liệu hiển thị lên url sau khi khi submit form
+ Ko dùng GET khi form có dữ liệu nhạy cảm như mật khẩu, thẻ ngân hàng ...
- POST:
+ Dữ liệu truyền ngầm sau khi submit form
+ Với form có dữ liệu nhạy cảm bắt buộc phải dùng POST
- API có phát triển thêm 1 số method khác cho form: PUT, PATCH, DELETE ...

-->
<?php
// 2 / Cách server PHP lấy dữ liệu form gửi lên
// - Với method GET:
// + PHP tạo ra sẵn 1 mảng $_GET chứa toàn bộ dữ liệu từ form gửi lên
// + Url với GET có dạng ?param1=value1&param2=value2 ...., param chính là name của input trong form
//echo "<pre>";
//print_r($_GET);
//echo "</pre>";
// - Với method POST
// + PHP có sẵn mảng $_POST
// 3 - Thuộc tính action của form
// + Mặc định nếu ko khai báo action cho form thì url xử lý form chính là url hiện tại
// + Action của form là nơi xử lý dữ liệu của form sau khi submit
// + Action của form = "" thì cũng là url hiện tại xử lý data sau khi submit form
// + Thông thường để url hiện tại xử lý form, action=""
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
// 4 - Giới thiệu thêm về mảng $_REQUEST:
// - Bắt đc data ko quan trọng method form là post hay get
// - NGoài ra còn bắt đc cả cookie
// - Ko nên dùng biến này để bắt dữ liệu từ form gửi lên, mà nên dựa vào method của form để dùng
// $_GET hoặc $_POST
// 5 - Giới thiệu về mảng $_SERVER
// + Lưu các thông tin về server / máy chủ đang chạy code PHP
echo "<pre>";
print_r($_SERVER);
echo "</pre>";
//echo "<pre>";
//print_r($_REQUEST);
//echo "</pre>";
?>
<form method="post" action="">
  Nhập tên của bạn:
  <input type="text" name="fullname" />
  <br />
  <input type="submit" value="Show info" name="show" />
</form>
