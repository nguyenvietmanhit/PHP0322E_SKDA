<?php
require_once 'controllers/Controller.php';
//controller/CategoryController.php
class CategoryController extends Controller {
    // index.php?controller=category&action=create
    public function create() {
        // - Xử lý submit form phía trên khai báo form
        // + B1: Debug
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        // + B2: bỏ qua
        // + B3: Nếu submit form thì mới xử lý:
        if (isset($_POST['submit'])) {
            // + B4:
            $name = $_POST['name'];
            // + B5:
            if (empty($name)) {
                $this->error = 'Phải nhập tên';
            }
            // + B6:
            if (empty($this->error)) {
                // + Gọi Model để nhờ Model insert vào CSDL
            }
            // + B7: Hiển thị lỗi ra view
        }

        // - Controller gọi View để hiển thị giao diện:
        $this->page_title = 'Trang thêm mới danh mục';
        $this->content =
            $this->render('views/categories/create.php');
        // Gọi layout để hiển thị các thuộc tính động này:
        require_once 'views/layouts/main.php';
    }
}
?>