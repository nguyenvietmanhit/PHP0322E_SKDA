<?php
require_once 'controllers/Controller.php';
require_once 'models/Order.php';
require_once 'models/OrderDetail.php';
require_once 'libraries/PHPMailer/src/PHPMailer.php';
require_once 'libraries/PHPMailer/src/SMTP.php';
require_once 'libraries/PHPMailer/src/Exception.php';

class PaymentController extends Controller
{
    public function index()
    {
        // - Logic xử lý:
        // + CẦn insert data vào bảng orders trước
        // + Insert data vào bảng order_details
        // - Controller xử lý submit form
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        if (isset($_POST['submit'])) {
            $fullname = $_POST['fullname'];
            $address = $_POST['address'];
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];
            $note = $_POST['note'];
            $method = $_POST['method'];
            // Mặc định trạng thái thanh toán là Chưa thanh toán
            $payment_status = 0;
            // Tính tổng giá trị đơn hàng:
            $price_total = 0;
            //Ctrl Alt L
            foreach ($_SESSION['cart'] as $cart_item) {
                $price_total +=
                    $cart_item['price'] * $cart_item['quantity'];
            }
            $order_model = new Order();
            $order_id = $order_model->insertData($fullname, $price_total);
            // Lưu tiếp vào bảng order_details: order_id, product_name,
            //product_price, quantity
            foreach ($_SESSION['cart'] AS $cart_item) {
                $order_detail_model = new OrderDetail();
                $infos = [
                    'order_id' => $order_id,
                    'product_name' => $cart_item['name'],
                    'product_price' => $cart_item['price'],
                    'quantity' => $cart_item['quantity'],
                ];
                $is_insert = $order_detail_model->insertData($infos);
                var_dump($is_insert);
            }

            // - Gửi mail cho user dựa vào email
            // - Xóa session giỏ hàng đi:
            unset($_SESSION['cart']);
            // - Dựa vào phương thức thanh toán để chuyển hướng:
            if ($method == 0) {
                // LÀ thanh toán trực tuyến, chuyển hướng về trang
                //thanh toán trực tuyến như ngân lương, vnpay ...
            } else {
                // LÀ thanh toán COD, chuyển hướng về trang cảm ơn
            }
        }

        // - Controller gọi view
        $this->page_title = 'Trang thanh toán';
        $this->content =
            $this->render('views/payments/index.php');
        require_once 'views/layouts/main.php';
    }
}