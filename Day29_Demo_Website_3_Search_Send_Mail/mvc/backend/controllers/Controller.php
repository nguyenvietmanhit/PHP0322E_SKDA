<?php

class Controller
{
    public function __construct() {
        // User chưa đăng nhập thì ko cho truy cập trang quản trị
        //, cần loại trừ các chức năng ko cần đăng nhập: register
        // và login
        $controller = $_GET['controller'];
        $action = $_GET['action'];
        if (!isset($_SESSION['user']) && $controller != 'user'
        && !in_array($action, ['login', 'register'])) {
            $_SESSION['error'] = 'Bạn chưa đăng nhập';
            header('Location:index.php?controller=user&action=login');
            exit();
        }
    }
    //chứa nội dung view
    public $content;
    //chứa nội dung lỗi validate
    public $error;
    // Tiêu đề trang
    public $page_title;

    /**
     * @param $file string Đường dẫn tới file
     * @param array $variables array Danh sách các biến truyền vào file
     * @return false|string
     */
    public function render($file, $variables = []) {

        //Nhập các giá trị của mảng vào các biến có tên tương ứng chính là key của phần tử đó.
        //khi muốn sử dụng biến từ bên ngoài vào trong hàm
        extract($variables);
        //bắt đầu nhớ mọi nội dung kể từ khi khai báo, kiểu như lưu vào bộ nhớ tạm
        ob_start();
        //thông thường nếu ko có ob_start thì sẽ hiển thị 1 dòng echo lên màn hình
        //tuy nhiên do dùng ob_Start nên nội dung của nó đã đc lưu lại, chứ ko hiển thị ra màn hình nữa
        require $file;
        //lấy dữ liệu từ bộ nhớ tạm đã lưu khi gọi hàm ob_Start để xử lý, lấy xong rồi xóa luôn dữ liệu đó
        $render_view = ob_get_clean();

        return $render_view;
    }
}
