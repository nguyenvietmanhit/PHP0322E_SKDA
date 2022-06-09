<?php
//controllers/Controller.php
// - Controller cha, chứa TT/PT dùng chung cho controller con
//kế thừa từ nó
class Controller {
    // Tiêu đề trang động
    public $page_title;
    // Lỗi trên trang:
    public $error;
    // Nội dung động của view tương ứng:
    public $content;

    // Lấy nội dung theo đường dẫn $view_file có kèm cơ chế
    //truyền mảng biến $variables vào file để thao tác
    public function render($view_file, $variables = []) {
        extract($variables);
        ob_start();
        require_once $view_file;
        $content = ob_get_clean();
        return $content;
    }
}
?>