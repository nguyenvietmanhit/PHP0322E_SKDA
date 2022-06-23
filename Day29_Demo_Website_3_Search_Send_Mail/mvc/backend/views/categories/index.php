<!--views/categories/index.php-->
<a href="index.php?controller=category&action=create"
   class="btn btn-success">
    Thêm mới
</a>
<!--Chức năng tìm kiếm nên để ở dạng GET-->
<form action="" method="get">
<!--  Khai báo 2 input ẩn để lưu lại controller và action  -->
    <input type="hidden" name="controller" value="category" />
    <input type="hidden" name="action" value="index" />

    <div class="form-group">
        <label for="keyword">Nhập từ khóa tìm kiếm</label>
        <input type="text" name="keyword" value=""
               placeholder="Tìm theo tên hoặc mô tả"
               class="form-control" />
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Tìm kiếm"
               class="btn btn-primary" />
        <a href="index.php?controller=category&action=index"
        class="btn btn-default">
            Bỏ tìm kiếm
        </a>
    </div>
</form>

<h2>Danh sách danh mục</h2>
<table class="table table-hover">
    <tr>
        <th>Name</th>
        <th>Description</th>
    </tr>
    <?php foreach ($categories as $category): ?>
        <tr>
            <td><?php echo $category['name']; ?></td>
            <td><?php echo $category['description']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
