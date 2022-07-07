<?php
//frontend/controllers/CartController.php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class CartController extends Controller
{
    public function add() {
        $product_id = $_GET['product_id'];
        // Lấy thông tin sp theo id
        $product_model = new Product();
        $product = $product_model->getById($product_id);
//        echo '<pre>';
//        print_r($product);
//        echo '</pre>';
        $cart_item = [
            'name' => $product['title'],
            'avatar' => $product['avatar'],
            'price' => $product['price'],
            'quantity' => 1 //Mặc định mỗi lần thêm 1 sp vào giỏ
        ];
        // - Logic xử lý thêm sp vào giỏ:
        // + Nếu giỏ hàng chưa từng tồn tại, tạo giỏ hàng và thêm
        //sp đầu tiên vào giỏ
        // + Nếu giỏ hàng đã tồn tại:
        // - Nếu sp thêm tồn tại trong giỏ, update quantity lên 1
        // - NẾu sp thêm chưa tồn tại, thêm mới
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'][$product_id] = $cart_item;
        } else {
            if (isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id]['quantity']++;
            } else {
                $_SESSION['cart'][$product_id] = $cart_item;
            }
        }
        echo '<pre>';
        print_r($_SESSION['cart']);
        echo '</pre>';
    }

    public function index() {
        // - Controller xử lý submit form
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        if (isset($_POST['submit'])) {
            // - Cập nhật giỏ hàng theo số lượng gửi lên từ form
            foreach($_SESSION['cart'] AS $product_id => $cart_item) {
                // - NẾu số lượng là số âm thì ko cập nhật cho sp đó:
                if ($_POST[$product_id] < 0) {
                    $_SESSION['error'] = 'Số lượng phải > 0';
                    header('Location: gio-hang-cua-ban.html');
                    exit();
                }

                $_SESSION['cart'][$product_id]['quantity']
                    = $_POST[$product_id];
            }
            $_SESSION['success'] = "Cập nhật giỏ hàng thành công";
        }

        // - Controller gọi View
        $this->page_title = 'Trang giỏ hàng của bạn';
        $this->content = $this->render('views/carts/index.php');
        require_once 'views/layouts/main.php';
    }

    public function delete() {
        echo '<pre>';
        print_r($_GET);
        echo '</pre>';
        $product_id = $_GET['id'];
        unset($_SESSION['cart'][$product_id]);
        $_SESSION['success'] = 'Xóa sp khỏi giỏ thành công';
        header('Location:gio-hang-cua-ban.html');
        exit();
    }
}