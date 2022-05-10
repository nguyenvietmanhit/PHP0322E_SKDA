<!--demo_form_2.php-->
<?php
// XỬ LÝ FORM
//- B1: Debug
echo '<pre>';
print_r($_GET);
echo '</pre>';
// Cần chú ý nếu như ko chọn bất cứ 1 radio hoặc checkbox nào
//thì $_GET/$_POST sẽ ko bắt đc dữ liệu gửi lên
//- B2: Tạo biến chứa lỗi và kết quả:
$error = '';
$result = '';
//- B3: Ktra nếu submit form thì mới xử lý:
if (isset($_GET['submit'])) {
    // - B4: Tạo biến trung gian (trừ radio và checkbox)
    $email = $_GET['email'];
    $country = $_GET['country'];
    // - B5: Validate form:
    // + Tất cả trường phải nhập
    if (empty($email)) {
        $error = 'Email phải nhập';
    } elseif (!isset($_GET['gender'])) {
        $error = 'Phải chọn giới tính';
    } elseif (!isset($_GET['jobs'])) {
        $error = 'Phải chọn ít nhất 1 nghề nghiệp';
    }
    // - B6: Xử lý logic bài toán chỉ khi ko có lỗi xảy ra
    if (empty($error)) {
        // Hiển thị các giá trị nhập từ form
        $result = "Email vừa nhập: $email <br />";
        // Hiển thị giới tính:radio
        $gender = $_GET['gender'];// 0 , 1, 2
        $result .= "Giới tính vừa chọn: ";
        switch ($gender) {
            case 0: $result .= "Nữ";break;
            case 1: $result .= "Nam";break;
            case 2: $result .= "Khác";
        }
        // Hiển thị nghề nghiệp: checkbox
        $jobs = $_GET['jobs']; //array
        $result .= "<br /> Nghề nghiệp vừa chọn: ";
        foreach ($jobs AS $job) {
            switch ($job) {
                case 0: $result .= "Dev";break;
                case 1: $result .= "Tester";break;
                case 2: $result .= "PM";
            }
        }
        // Hiển thị quốc gia: select, xử lý giống hệt radio
        $result .= "<br />Quốc gia vừa chọn: ";
        switch ($country) {
            case 0: $result .= "VN";break;
            case 1: $result .= "JP";break;
            case 2: $result .= "KR";
        }
    }
}
// - B7: Hiển thị error và result ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="get">
    Nhập email:
    <input type="text" name="email" value="" />
    <br />
    Chọn giới tính:
<!--  Với radio, cần set value cho từng radio  -->
    <input type="radio" name="gender" value="0" /> Nữ
    <input type="radio" name="gender" value="1" /> Nam
    <input type="radio" name="gender" value="2" /> Khác
    <br />
    Chọn nghề nghiệp:
<!--  Với checkbox nếu có từ 2 checkbox trở lên thì
  bắt buộc phải set name ở dạng mảng, cũng cần set value-->
    <input type="checkbox" name="jobs[]" value="0" />Dev
    <input type="checkbox" name="jobs[]" value="1" />Tester
    <input type="checkbox" name="jobs[]" value="2" />PM
    <br />
    Chọn quốc gia:
    <select name="country">
        <option value="0">VN</option>
        <option value="1">JP</option>
        <option value="2">KR</option>
    </select>
    <br />
    <input type="submit" name="submit" value="Show thông tin" />
</form>