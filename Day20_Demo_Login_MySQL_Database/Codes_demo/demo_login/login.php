<!--
login.php
demo_login /
           /login.php
           /admin.php
           /logout.php
           Ctrl + Shift + F  -> Ctrl + Shift + R
-->
<?php
session_start();
// - Check nếu tồn tại cookie username thì đã Ghi nhớ đăng nhập
//thành công, thì cần chuyển hướng sang trang admin
if (isset($_COOKIE['username'])) {
    $_SESSION['success'] = 'Ghi nhớ đăng nhập thành công';
    $_SESSION['username'] = $_COOKIE['username'];
    header('Location: admin.php');
    exit();
}
// - Check nếu đã đăng nhập rồi thì chuyển hướng sang trang admin
if (isset($_SESSION['username'])) {
    $_SESSION['success'] = 'Bạn đã đăng nhập rồi, ko thể truy
    cập lại trang login';
    header('Location: admin.php');
    exit();
}

// XỬ LÝ FORM:
// - B1: Debug:
echo '<pre>';
print_r($_POST);
echo '</pre>';
// - B2: Tạo biến lưu lỗi và kết quả:
$error = '';
$result = '';
// - B3: Ktra nếu submit form thì mới xử lý:
if (isset($_POST['login'])) {
    // - B4: Lấy giá trị từ form thông qua việc gán biến:
    $username = $_POST['username'];
    $password = $_POST['password'];
    // - B5: Validate form:
    // + Ko để trống username hoặc password
    // + Username phải hơn 3 ký tự
    if (empty($username) || empty($password)) {
        $error = 'Ko để trống username hoặc password';
    } elseif (strlen($username) < 3) {
        $error = 'Username phải hơn 3 ký tự';
    }
    // - B6: Xử lý logic bài toán chỉ khi ko có lỗi xảy ra
    if (empty($error)) {
        // + Xử lý đăng nhập: giả sử đăng nhập thành công nếu
        //như password = 123
        if ($password == 123) {
            // + Nếu có tích vào Ghi nhớ đăng nhập và đăng nhập
            //thành công lưu lại cookie
            if (isset($_POST['remember'])) {
                setcookie('username', $username, time() + 3600);
            }
            // + Tạo ra session lưu lại thông tin của user vừa
            //đăng nhập thành công
            $_SESSION['username'] = $username;
            $_SESSION['success'] = 'Đăng nhập thành công';
            // + Logic khi đăng nhập là chuyển hướng sang trang
            //quản trị admin.php
            header('Location: admin.php');
            exit(); // header luôn kèm exit
        } else {
            $error = 'Sai username hoặc password';
        }

    }
}
// - B7: Đổ error và result ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>

<h3 style="color: red">
    <?php
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    ?>
</h3>
<h3 style="color: green">
    <?php
    if (isset($_SESSION['success'])) {
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
    ?>
</h3>
<form action="" method="post">
    Nhập username:
    <input type="text" name="username" />
    <br />
    Nhập password:
    <input type="password" name="password" />
    <br />
<!--  Nếu chỉ có 1 checkbox thì ko cần name ở dạng mảng  -->
    <input type="checkbox" name="remember" value="0" />
    Ghi nhớ đăng nhập
    <br />
    <input type="submit" name="login" value="Đăng nhập" />
</form>
