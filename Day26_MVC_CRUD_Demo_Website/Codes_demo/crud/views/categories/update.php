<!--views/categories/update.php-->
<h2>Form cập nhật</h2>
<form action="" method="post">
    Tên danh mục:
    <input type="text" name="name"
           value="<?php echo $category['name']?>" />
    <br />
    <input type="submit" name="submit" value="Lưu" />
    <a href="index.php?controller=category&action=index">
        Về trang danh sách
    </a>
</form>
