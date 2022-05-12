<!--
security.php
Hai lỗi bảo mật phổ biến nhất trong form:
 - XSS: Cross site scripting: tấn công sử dụng mã code JS
 - CSRF: Cross site request fogery: tấn công giả mạo chủ hệ thống
 VD: Mạnh là admin của 1 hệ thống, có thể xóa user nào đó,  url
 để xóa user.php?id=1, cần đăng nhập và có quyền admin thì mới
 xóa đc
 Giả sử bạn Ánh biết đc url xóa, Ánh gửi 1 mail cho Mạnh
 <a href='user.php?id=6'><img src='hap-dan.jpg' /></a>
 Cách phòng chống: sử dụng token, mỗi 1 form sinh ra 1 token
 duy nhất, mỗi lần submit form cần kiểm tra cái token này trước,
 nếu trùng với token đã thiết lập trước của hệ thống thì mới
 xử lý form -> tự tìm hiểu code ở nhà

-->

<!--Demo XSS-->
<?php
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    // XSS: thay vì hiển thị text lại chạy code JS
    // Cách phòng chống: cho chạy qua hàm sau để chuyển đổi
    //các ký tự đặc biệt như <> thành ký tự an toàn để hiển thị ra
    $fullname = htmlspecialchars($fullname);
    // -> thực tế luôn cần sử dụng hàm trên trc khi hiển thị
    //   <script>alert(document.cookie)</script>
    echo "Họ tên: $fullname";
}
?>
<form action="" method="post">
    Nhập họ tên:
    <input type="text" name="fullname" />
    <br />
    <input type="submit" name="submit" value="Show" />
</form>