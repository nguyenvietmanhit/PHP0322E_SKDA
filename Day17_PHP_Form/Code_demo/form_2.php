<!--form_2.php-->
<?php
// XỬ LÝ FORM:
// - B1: Debug
//var_dump($_POST);
echo '<pre>';
print_r($_POST);
echo '</pre>';
// - B2: Khai báo biến chứa lỗi và kết quả:
$error = '';
$result = '';
// - B3: Ktra nếu submit form thì mới xử lý form:
if (isset($_POST['submit'])) {
    // - B4: Lấy giá trị từ form gửi lên thông qua gán biến
    //trung gian để thao tác cho dễ:
    // Với radio và checkbox, nếu ko chọn bất cứ cái nào thì
    // PHP ko bắt đc dữ liệu gửi lên của 2 loại này
    // $gender = $_POST['gender'];
    // $jobs = $_POST['jobs'];
    $country = $_POST['country'];
    $note = $_POST['note'];
    // - B5: Validate form: ko đc để trống trường nào
    if (!isset($_POST['gender'])) {
        $error = 'Chưa chọn giới tính';
    } elseif (!isset($_POST['jobs'])) {
        $error = 'Chưa chọn nghề nghiệp';
    } elseif (empty($note)) {
        $error = 'Chưa nhập ghi chú';
    }
    // - B6: Xử lý logic bài toán chỉ ko có lỗi nào xảy ra
    if (empty($error)) {
        // Hiển thị giới tính: radio
        $result .= "Giới tính của bạn:";
        $gender = $_POST['gender']; // 0  1 2
        switch ($gender) {
            case 0: $result .= "Nữ";break;
            case 1: $result .= "Nam";break;
            case 2: $result .= "Khác";
        }
        // Hiển thị nghề nghiệp: checkbox
        $result .= "<br />Nghề nghiệp của bạn:";
        $jobs = $_POST['jobs'];
        foreach ($jobs AS $job) {
            switch ($job) {
                case 0: $result .= "Dev";break;
                case 1: $result .= "Tester";break;
                case 2: $result .= "BrSE";
            }
        }
        // Hiển thị quốc gia: select, giống hệt radio
        $result .= "<br />Quốc gia vừa chọn:";
        switch ($country) {
            case 0: $result .= "VN";break;
            case 1: $result .= "JP";break;
            case 2: $result .= "KR";
        }
        // Hiển thị ghi chú: textarea
        $result .= "<br />Ghi chú: $note";
    }
}
// - B7: Hiển thị error và result ra form
// - B8: Đổ lại dữ liệu đã nhập ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="post">
    Chọn giới tính:
<!--  PHP dựa vào value của radio để biết đc chọn radio nào  -->
    <?php
    // Radio: có bao nhiêu radio tạo từng đó biến để set giá trị
    //checked tương ứng
    $checked_female = '';
    $checked_male = '';
    $checked_another = '';
    if (isset($_POST['gender'])) {
        $gender = $_POST['gender'];
        switch ($gender) {
            case 0: $checked_female = 'checked';break;
            case 1: $checked_male = 'checked';break;
            case 2: $checked_another = 'checked';
        }
    }
    ?>
    <input <?php echo $checked_female; ?> type="radio" name="gender" value="0" /> Nữ
    <input <?php echo $checked_male; ?> type="radio" name="gender" value="1" /> Nam
    <input <?php echo $checked_another; ?> type="radio" name="gender" value="2" /> Khác
    <br />
    Chọn nghề nghiệp:
<!--  Với các dạng input cho phép chọn nhiều giá trị tại 1
  thời điểm: checkbox, select multiple, file multiple thì name
  bắt buộc phải ở dạng mảng-->
    <?php
    // Checkbox: xử lý tương tự radio
    $checked_dev = '';
    $checked_tester = '';
    $checked_brse = '';
    if (isset($_POST['jobs'])) {
        $jobs = $_POST['jobs'];
        foreach ($jobs AS $job) {
            switch ($job) {
                case 0: $checked_dev = 'checked';break;
                case 1: $checked_tester = 'checked';break;
                case 2: $checked_brse = 'checked';
            }
        }
    }
    ?>
    <input <?php echo $checked_dev; ?> type="checkbox" name="jobs[]" value="0" /> Dev
    <input <?php echo $checked_tester; ?> type="checkbox" name="jobs[]" value="1" /> Tester
    <input <?php echo $checked_brse; ?> type="checkbox" name="jobs[]" value="2" /> BrSE
    <br />
    Chọn quốc gia:
    <?php
    // Select: giống hệt radio
    $selected_vn = '';
    $selected_jp = '';
    $selected_kr = '';
    if (isset($_POST['country'])) {
        $country = $_POST['country'];
        switch ($country) {
            case 0: $selected_vn = 'selected';break;
            case 1: $selected_jp = 'selected';break;
            case 2: $selected_kr = 'selected';
        }
    }
    ?>
    <select name="country">
        <option <?php echo $selected_vn; ?> value="0">VN</option>
        <option <?php echo $selected_jp; ?> value="1">JP</option>
        <option <?php echo $selected_kr; ?> value="2">KR</option>
    </select>
    <br />
    Ghi chú:
<!--  textarea hiểu đc ký tự khoảng trắng trong HTML  -->
    <textarea name="note"><?php echo isset($_POST['note']) ? $_POST['note'] : '' ?></textarea>
    <br />
    <input type="submit" name="submit" value="Show" />
</form>
