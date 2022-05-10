<!--form.php
- Form là gì, là nơi mà user có thể nhập đc dữ liệu
- User nhập thông tin vào form, submit form, dữ liệu đc gửi lên server -> PHP sẽ xử lý
- Form có 2 dạng:
+ Nhập thông tin dạng cơ bản: text, số, radio, checkbox ... -> thông tin có thể nhìn thấy
+ Dang upload file:
- Khai báo form HTML
-->
<!--
+ action: là nơi(url, file) nhận dữ liệu từ form gửi lên
Tạo 1 file process.php cùng cấp file hiện tại -> xử lý data từ form ở file này
Nếu action rỗng: file hiện tại sẽ xử lý data submit lên
+ method: phương thức gửi dữ liệu, có 2 loại:
- get:
+ Đổ dữ liệu nhập lên url theo dang: ?name1=value1&name2=value2....
+ Get ko bảo mật bằng post khi form có dữ liệu nhạy cảm như password ...
+ Get dùng để lấy data
- post:
+ Data truyền ngầm
+ Bảo mật hơn get
+ Post dùng để thêm/sửa/xóa
-> method PUT, PATCH, DELETE: là các method đc quy định thêm để tăng bảo mật cho form
-> API: Application Programming Interface : là 1 cơ chế cho phép các hệ thống khác nhau giao tiếp đc
với nhau. Có 1 hệ thống code bằng PHP muốn giao tiếp với 1 hệ thống code bằng Java -> từ PHP viết các API
trả về kiểu dữ liệu JSON -> Java hiểu đc kiểu dữ liêu này
-->

<?php
// - Làm thế nào để biết đc data gửi lên PHP?? PHP làm hết bằng cách tạo ra sẵn các biến kiểu mảng
// + Method = get -> $_GET
// + Method = post -> $_POST
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
//echo "<pre>";
//print_r($_GET);
//echo "</pre>";
// - Biến mảng $_REQUEST: chứa cả $_GET, $_POST, $_COOKIE -> ko nên dựa vào biến này để xử lý form
//echo "<pre>";
//print_r($_REQUEST);
//echo "</pre>";
// - Biến mảng $_SERVER: chứa thông tin về server đang chạy PHP
//echo "<pre>";
//print_r($_SERVER);
//echo "</pre>";

// - CÁC BƯỚC XỬ LÝ FORM TRONG PHP
// Code xử lý form nên đứng trước HTML
// 1 -  Debug: dựa vào method của form để debug biến tương ứng
echo "<pre>";
print_r($_GET);
echo "</pre>";
// 2 - Tạo biến chứa lỗi và kết quả
$error = '';
$result = '';
// 3 - Xử lý data gửi lên chỉ khi nào user submit form: dựa vào name input submit
if (isset($_GET['show'])) {
    // 4 - Tạo biến trung gian gán lại từ mảng -> thao tác cho dễ, dựa vào debug để gán cho dễ
    $fullname = $_GET['fullname'];
    $age = $_GET['age'];
    // 5 - Validate form: lọc dữ liệu của form -> bảo mật form, PHP đỡ phải mất công xử lý dữ liệu rác -> có lỗi đổ vào biến error
    // - Tên và tuổi ko đc để trống: empty
    // - Tên phải > 2 ký tự: strlen
    // - Tuổi phải nhập số: is_numeric
    if (empty($fullname) || empty($age)) {
        $error = "Tên/tuổi ko đc để trống";
    } elseif (strlen($fullname) <= 2) {
        $error = 'Tên phải > 2 ký tự';
    } elseif (!is_numeric($age)) {
        $error = 'Tuổi phải nhập số';
    }
    // 6 - Xử lý logic bài toán chỉ khi ko có lỗi nào xảy ra
    if (empty($error)) {
        $result .= "Tên của bạn: $fullname <br />";
        $result .= "Tuổi của bạn: $age <br />";
    }
    // 7 - Hiển thị error và result ra form

}

?>

<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="get">
  Nhập tên:
<!--  CÁc input bắt buộc phải set thuộc tính name để PHP biết đc data gửi lên là của input nào  -->
<!--  8 - Đổ lại dữ liệu ra input sau khi submit, dựa vào debug để check  -->
  <input type="text" name="fullname" value="<?php echo isset($_GET['fullname']) ? $_GET['fullname'] : '' ?>" />
  <br />
  Nhập tuổi:
  <input type="text" name="age" value="<?php echo isset($_GET['age']) ? $_GET['age'] : '' ?>" />
  <br />
<!--  input submit cùng cần có name  -->
  <input type="submit" name="show" value="Show info" />
</form>
