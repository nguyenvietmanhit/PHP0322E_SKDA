<?php
//controllers/Controller.php
// - Controlelr cha, chứa TT/PT dùng chung cho
//controller con kế thừa từ nó
class Controller {
    // Tiêu đề trang cho từng chức năng cụ thể
    public $page_title;
    // Lưu lỗi:
    public $error;
    // Lưu nội dung file view của từng chức năng:
    public $content;

    // Đọc nội dung từ file $view_file theo cơ chế truyền biến
    //$variables vào file này 1 cách tường mình
    public function render($view_file, $variables = []) {
        extract($variables);
        ob_start();
        require_once $view_file;
        $render = ob_get_clean();
        return $render;
    }
}