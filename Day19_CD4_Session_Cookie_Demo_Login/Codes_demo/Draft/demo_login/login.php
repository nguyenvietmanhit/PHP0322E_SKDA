<?php
session_start();
//demo_login/login.php
// - Nếu tồn tại cookie username và password, nghĩa là đã tích vào Ghi nhớ đăng nhập
if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    $_SESSION['success'] = 'Ghi nhớ đăng nhập thành công';
    // Tạo session với key=username để đánh dấu đăng nhập thành công
    $_SESSION['username'] = $_COOKIE['username'];
    header('Location: welcome.php');
    exit();
}

// - Nếu đã đăng nhập r thì ko cho truy cập lại nữa, chuyển hướng sang welcome.php
if (isset($_SESSION['username'])) {
  $_SESSION['success'] = 'Bạn đã đăng nhập rồi';
  header('Location: welcome.php');
  exit();
}


// Quy trình xử lý form
// - Debug
echo "<pre>";
print_r($_POST);
echo "</pre>";
// - Khai báo biến chứa lỗi và kết quả
$error = '';
$result = '';
// - Nếu submit form thì mới xử lý
if (isset($_POST['login'])) {
  // - Tạo biến trung gian
  $username = $_POST['username'];
  $password = $_POST['password'];
  // - Validate form:
  // + Username, password ko đc để trống: empty
  // + Username phải có dạng email: filter_var
  // + Password phải >= 2 ký tự: strlen
  if (empty($username) || empty($password)) {
    $error = 'Username, password ko đc để trống';
  } elseif (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
    $error = 'Username phải có dạng email';
  } elseif (strlen($password) < 2) {
    $error = 'Password phải >= 2 ký tự';
  }
  // - Xử lý logic bài toán chỉ khi ko có lỗi nào xảy ra:
  if (empty($error)) {
    // Giả sử đăng nhập thành công với điều kiện password = 123456
    // Khi login thành công -> chuyển hướng về trang Welcome: hiển thị ra username vừa đăng nhập
    if ($password == '123456') {
      // - Nếu đăng nhập thành công và phải check vào Remember Me thì mới xử lý Ghi nhớ đăng nhập:
      // Cơ chế: lưu username, password vào cookie
      if (isset($_POST['remember_me'])) {
          // Thực tế cần mã hóa các giá trị trc khi lưu cookie
         setcookie('username', $username, time() + 3600); //sống trong 1h
         setcookie('password', $password, time() + 3600); //sống trong 1h
      }

      // Logic: tạo 1 session lưu lại phiên làm việc cho user
      $_SESSION['username'] = $username;
      $_SESSION['success'] = 'Đăng nhập thành công';
      // Chuyển hướng sang trang khác, đồng thời mang theo các session vừa tạo
      header('Location: welcome.php');
      // Kết thúc header luôn là hàm exit
      exit();
    } else {
      $error = 'Sai username hoặc password';
    }
  }
}
?>

<?php
if (isset($_SESSION['error'])) {
  echo "<h3 style='color:red;'>{$_SESSION['error']}</h3>";
  // Xóa session đi để tránh tải lại trang thì lại hiển thị lại error
  // -> session dạng flash
  unset($_SESSION['error']);
}
if (isset($_SESSION['success'])) {
  echo "<h3 style='color:green;'>{$_SESSION['success']}</h3>";
  // Xóa session đi để tránh tải lại trang thì lại hiển thị lại success
  // -> session dạng flash
  unset($_SESSION['success']);
}
// - Xử lý Ghi nhớ đăng nhập / Remember me -> next lession -> sử dụng cookie
?>

<h3 style="color: red"><?php echo $error; ?></h3>
<form action="" method="post">
    Username:
    <input type="text" name="username"/>
    <br/>
    Password:
    <input type="password" name="password"/>
    <br/>
    <!--  Với checkbox chỉ có 1 checkbox duy nhất, name ko cần dạng mảng-->
    <input type="checkbox" name="remember_me" value="0"/> Remember me
    <br/>
    <input type="submit" name="login" value="Login"/>
</form>
