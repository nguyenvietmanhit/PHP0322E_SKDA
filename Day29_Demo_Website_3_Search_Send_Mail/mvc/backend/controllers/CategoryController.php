<?php
//backend/controllers/CategoryController.php
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
class CategoryController extends Controller {
    //index.php?controller=category&action=create
    public function create() {
        // - Code chặn ...
        // - Controller gọi View để hiển thị giao diện:
        $this->page_title = 'Trang thêm mới danh mục';
        $this->content =
            $this->render('views/categories/create.php');
        require_once 'views/layouts/main.php';
    }

    //index.php?controller=category&action=index
    public function index() {
        // - Controller xử lý form tìm kiếm:
        $keyword = '';
        if (isset($_GET['submit'])) {
            $keyword = $_GET['keyword'];
        }

        // - Controller gọi Model
        $category_model = new Category();
        $categories = $category_model->getAll($keyword);
//        echo '<pre>';
//        print_r($categories);
//        echo '</pre>';

        // - Controller gọi View
        $this->page_title = 'Danh sách danh mục';
        $this->content =
            $this->render('views/categories/index.php', [
                'categories' => $categories
            ]);
        require_once 'views/layouts/main.php';
    }
}