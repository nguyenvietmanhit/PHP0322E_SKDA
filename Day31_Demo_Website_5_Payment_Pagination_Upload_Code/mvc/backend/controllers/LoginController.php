<?php
require_once 'models/User.php';
require_once 'controllers/Controller.php';

class LoginController extends Controller
{

  public function login()
  {
    //nếu user đã đăngn hập r thì ko cho truy cập lại trang login, mà chuenr hướng tới backend
    if (isset($_SESSION['user'])) {
      header('Location: index.php?controller=category&action=index');
      exit();
    }
    if (isset($_POST['submit'])) {
//            die;
      $username = $_POST['username'];
      //do password đang lưu trong CSDL sử dụng cơ chế mã hóa md5 nên cần phải thêm
//            hàm md5 cho password
      $password = $_POST['password'];
      //validate
      if (empty($username) || empty($password)) {
        $this->error = 'Username hoặc password không được để trống';
      }
      $user_model = new User();
      if (empty($this->error)) {
        $user = $user_model->getUser($username);
        if (empty($user)) {
          $this->error = 'Username ko tồn tại';
        } else {
          // + Dùng hàm sau để kiểm tra xem mật
          //khẩu mã hóa có đúng với mật khẩu từ
          //form gửi lên hay ko
          // Hàm này chỉ có tác dụng với các mật
          //khẩu đc mã hóa bằng hàm password_hash
          $is_same_password = password_verify($password, $user['password']);
          if ($is_same_password) {
            $_SESSION['success'] = 'Đăng nhập thành công';
            //tạo session user để xác định user nào đang login
            $_SESSION['user'] = $user;
            header("Location: index.php?controller=product");
            exit();
          } else {
            $this->error = 'Sai tài khoản hoặc mật khẩu';
          }
        }
      }
    }
    $this->content = $this->render('views/users/login.php');

    require_once 'views/layouts/main_login.php';
  }

  /**
   * Đăng ký tài khoản mới, mặc định tất cả các user đều có quyền admin
   */
  public function register()
  {

    if (isset($_POST['submit'])) {
      $user_model = new User();
      $username = $_POST['username'];
      $password = $_POST['password'];
      $password_confirm = $_POST['password_confirm'];
      $user = $user_model->getUserByUsername($username);
      //check validate
      if (empty($username) || empty($password) || empty($password_confirm)) {
        $this->error = 'Không được để trống các trường';
      } else if ($password != $password_confirm) {
        $this->error = 'Password nhập lại chưa đúng';
      } else if (!empty($user)) {
        $this->error = 'Username này đã tồn tại';
      }
      //xử lý lưu dữ liệu khi không có lỗi
      if (empty($this->error)) {
        $password_encrypt =
          password_hash($password, PASSWORD_BCRYPT);
        $user_model->username = $username;
        $user_model->password = $password_encrypt;
        $is_insert = $user_model->register();
        if ($is_insert) {
          $_SESSION['success'] = 'Đăng ký thành công';
          header('Location: index.php?controller=user&action=login');
          exit();
        }
      }
    }

    $this->content = $this->render('views/users/register.php');
    require_once 'views/layouts/main_login.php';
  }
}
