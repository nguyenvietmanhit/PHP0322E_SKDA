<?php
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
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
                $category_model = new Category();
                $is_insert = $category_model->insertData($name);
                if ($is_insert) {
                    $_SESSION['success'] = 'Thêm mới thành công';
                    header('Location:index.php?controller=category&action=index');
                    exit();
                }
                $this->error = 'Thêm mới thất bại';

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

    //index.php?controller=category&action=index
    public function index() {
        // - Controller gọi Model để lấy toàn bộ danh mục
        $category_model = new Category();
        $categories = $category_model->listData();
//        echo '<pre>';
//        print_r($categories);
//        echo '</pre>';
        // - Controller gọi View để hiển thị giao diện:
        $this->page_title = 'Trang danh sách';
        $this->content =
            $this->render('views/categories/index.php', [
                'categories' => $categories
            ]);
        require_once 'views/layouts/main.php';
    }

    //index.php?controller=category&action=update&id=5
    public function update() {
        //Validate tham số id
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'Tham số ID ko hợp lệ';
            header('Location: index.php?controller=category&action=index');;
            exit();
        }
        $id = $_GET['id'];
        // - Gọi model để truy vấn lấy danh mục theo id:
        $category_model = new Category();
        $category = $category_model->getById($id);

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
                // + Gọi Model để nhờ Model update vào CSDL
                $is_update = $category_model->updateData($name, $id);
//                var_dump($is_update);
                if ($is_update) {
                    $_SESSION['success'] = 'Cập nhật thành công';
                    header('Location:index.php?controller=category&action=index');
                    exit();
                }
                $this->error = 'Cập nhật thất bại';
            }
            // + B7: Hiển thị lỗi ra view
        }

        // - Controller gọi View:
        $this->page_title = 'Sửa danh mục';
        $this->content =
        $this->render('views/categories/update.php', [
            'category' => $category
        ]);
        require_once 'views/layouts/main.php';
    }
    //index.php?controller=category&action=delete&id=5
    public function delete() {
        // Validate tham số id
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'Tham số ID ko hợp lệ';
            header('Location: index.php?controller=category&action=index');;
            exit();
        }
        $id = $_GET['id'];
        // - Controller gọi Model để xóa bản ghi:
        $category_model = new Category();
        $is_delete = $category_model->deleteData($id);
        if ($is_delete) {
            $_SESSION['success'] = 'Xóa thành công';
        } else {
            $_SESSION['error'] = 'Xóa thất bại';
        }
        header('Location:index.php?controller=category&action=index');
        exit();
    }
}
?>