<!--
security_form.php
HAI LỖI BẢO MẬT FORM PHỔ BIẾN:
- XSS : Cross-Site Scripting, chèn các code Javascript vào form
- CSRF: Cross-site request forgery, là lỗi bảo mật liên quan
đến việc giả mạo chủ sở hữu của hệ thống
VD: url xóa nhân viên: delete.php?id=4, chỉ xóa đc khi đăng nhập
. Giả sử url này bị lộ ra ngoài, kẻ tấn công gửi email cho chủ
<a href='delete.php?id=12'><img src='hap-dan.jpg'</a>
Cách phòng chống: thêm input ẩn trong form, giá trị của input này
là 1 mã token mà chỉ hệ thống bạn mới có, khi submit form cần
check token này trc, nếu token trùng thì mới xử lý form
-->
<?php
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    //    <script>alert(document.cookie)</script>
    // Cách chống lỗi XSS:
    // Thực tế luôn cần xử lý XSS trước khi hiển thị ra
    $fullname = htmlspecialchars($fullname);
    echo "Họ tên của bạn là: $fullname";
}
?>
<form action="" method="post">
    Nhập họ tên:
    <input type="text" name="fullname" value="" />
    <br />
    <input type="submit" name="submit" value="Hiển thị" />
</form>

