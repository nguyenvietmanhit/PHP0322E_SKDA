<?php
require_once 'controllers/Controller.php';
require_once 'models/Order.php';
require_once 'models/OrderDetail.php';
require_once 'libraries/PHPMailer/src/PHPMailer.php';
require_once 'libraries/PHPMailer/src/SMTP.php';
require_once 'libraries/PHPMailer/src/Exception.php';

class PaymentController extends Controller
{
    public function index() {
        // - Logic xử lý:
        // + CẦn insert data vào bảng orders trước
        // + Insert data vào bảng order_details

        // - Controller gọi view
        $this->page_title = 'Trang thanh toán';
        $this->content =
            $this->render('views/payments/index.php');
        require_once 'views/layouts/main.php';
    }
}