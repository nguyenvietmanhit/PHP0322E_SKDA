<?php
//backend/controllers/UserController.php
require_once 'controllers/Controller.php';
require_once 'models/User.php';
class UserController extends Controller {
    //index.php?controller=user&action=register
    public function register() {
        // - Controller xử lý submit form
        // B1:
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        // B2
        // B3:
        if (isset($_POST['submit'])) {
            //B4:
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            //B5
            //B6:
            if (empty($this->error)) {
                // - Với các thông tin nhạy cảm như mật khẩu thì
                //bắt buộc phải mã hóa trc khi lưu vào CSDL
                // - Một số cơ chế mã hóa: md5, bcrypt, algo ...
                //-> dùng bcrypt
                $password = password_hash($password, PASSWORD_BCRYPT);
                // - Controller gọi Model để truy vấn insert:
                $user_model = new User();
                $is_register = $user_model->registerUser($username, $password);
                var_dump($is_register);
            }
        }

        // - Controller gọi View:
        $this->page_title = 'Form đăng ký user';
        $this->content =
            $this->render('views/users/register.php');
//        require_once 'views/layouts/main.php';
       require_once 'views/layouts/main_login.php';
    }

    //index.php?controller=user&action=login
    public function login() {
        // - Controller xử lý submit form
        //B1:
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        //B2
        //B3:
        if (isset($_POST['submit'])) {
            //B4:
            $username = $_POST['username'];
            $password = $_POST['password'];
            //B5:
            //B6:
            if (empty($this->error)) {
                // - LẤy mật khẩu đã mã hóa tương ứng với username:
                // + Controller gọi Model để truy vấn lấy 1 bản ghi
                //dựa theo username
                $user_model = new User();
                $user = $user_model->getUser($username);
//                echo '<pre>';
//                print_r($user);
//                echo '</pre>';
                if (empty($user)) {
                    $this->error = "Username ko tồn tại";
                } else {
                    // - Lấy mật khẩu đã mã hóa
                    $password_hash = $user['password'];
                    $is_login = password_verify($password, $password_hash);
                    if ($is_login) {
                        //Login thành công
                        $_SESSION['user'] = $user;
                        // Chuyển hướng sang trang quản trị
                        header('Location: index.php?controller=category&action=create');
                        exit();
                    } else {
                        $this->error = 'Sai tài khoản/mật khẩu';
                    }
                }
            }
        }

        // - Controller gọi View
        $this->page_title = 'Form đăng nhập';
        $this->content = $this->render('views/users/login.php');
        require_once 'views/layouts/main_login.php';
    }
}