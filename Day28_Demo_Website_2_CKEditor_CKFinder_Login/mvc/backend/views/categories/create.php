<!--backend/views/categories/create.php-->
<h2>Form thêm mới danh mục</h2>

<form action="" method="post">
    Nhập tên:
    <input type="text" name="name" />
    <br />
    Nhập chi tiết:
    <textarea name="description"></textarea>
    <br />
    <input type="submit" name="submit" value="Lưu" />
</form>
<!--
- Tích hợp trình soạn thảo CKEditor vào trường nhập chi tiết
+ Download ckeditor
+ Copy vào thư mục assets của MVC
+ Nhúng file ckeditor.js vào layout
-->