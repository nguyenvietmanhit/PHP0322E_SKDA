<!--
form_2.php
XỬ LÝ FORM VỚI CÁC INPUT PHỨC TẠP HƠN: radio, checkbox, select
-->
<?php
// XỬ LÝ FORM:
// + B1: Debug:
echo '<pre>';
print_r($_GET);
echo '</pre>';
// + B2: Tạo biến chứa lỗi và kết quả
$error = '';
$result = '';
// + B3: Ktra nếu submit form thì mới xử lý form:
if (isset($_GET['submit'])) {
    // + B4: lấy giá trị từ form gửi lên, gán thành biến để
    //thao tác cho dễ
    // - Chú ý với radio và checkbox sẽ có trường hợp nếu như ko
    //tích chọn thì $_GET hoặc $_POST sẽ ko bắt đc dữ liệu,
    //luôn cần ktra nếu tồn tại thì mới thao tác đc với radio
    //và checkbox
    // $gender = $_GET['gender'];
    // $jobs = $_GET['jobs']; //mảng
    $country = $_GET['country'];
    $note = $_GET['note'];
    // + B5: Validate form: tất cả trường phải nhập
    if (!isset($_GET['gender'])) {
        $error = 'Chưa chọn giới tính';
    } elseif (!isset($_GET['jobs'])) {
        $error = 'Chưa chọn nghề nghiệp';
    } elseif (empty($note)) {
        $error = 'Chưa nhập ghi chú';
    }
    // + B6: Xử lý logic chính bài toán chỉ khi ko có lỗi xảy ra:
    if (empty($error)) {
        // Giới tính: radio
        $result .= "Giới tính vừa chọn:";
        $gender = $_GET['gender']; //0  1 2
        switch ($gender) {
            case 0: $result .= "Nữ";break;
            case 1: $result .= "Nam";break;
            case 2: $result .= "Khác";
        }
        $result .= "<br />";
        // Nghề nghiệp: checkbox
        $result .= "Nghề nghiệp vừa chọn:";
        $jobs = $_GET['jobs'];
        foreach ($jobs AS $job) {
            switch ($job) {
                case 0: $result .= "Dev";break;
                case 1: $result .= "Tester";break;
                case 2: $result .= "BrSE";
            }
        }
        // Quốc gia: select, giống hệt radio
        $result .= "<br />Quốc gia vừa chọn:";
        switch ($country) {
            case 0: $result .= "VN";break;
            case 1: $result .= "JP";break;
            case 2: $result = "KR";
        }
        // Ghi chú: textarea
        $result .= "<br />Ghi chú: $note";
    }
}
// + B7: Hiển thị error và result ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="get">
    Chọn giới tính:
<!--  PHP dựa vào value của radio để biết đc chọn radio nào,
  name của radio trùng nhau-->
    <input type="radio" name="gender" value="0" /> Nữ
    <input type="radio" name="gender" value="1" /> Nam
    <input type="radio" name="gender" value="2" /> Khác
    <br />
    Chọn nghề nghiệp:
<!--  Nếu có nhiều hơn 1 checkbox, thì bắt buộc name phải ở
  dạng mảng, áp dụng cho các input mà có thể chọn nhiều giá trị
  tại 1 thời điểm, select có multiple, file có multiple-->
    <input type="checkbox" name="jobs[]" value="0" />Dev
    <input type="checkbox" name="jobs[]" value="1" />Tester
    <input type="checkbox" name="jobs[]" value="2" />BrSE
    <br />
    Chọn quốc gia:
    <select name="country">
        <option value="0">VN</option>
        <option value="1">JP</option>
        <option value="2">KR</option>
    </select>
    <br />
    Ghi chú:
    <textarea name="note" rows="4" cols="20"></textarea>
    <br />
    <input type="submit" name="submit" value="Show" />
</form>
