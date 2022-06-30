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
}