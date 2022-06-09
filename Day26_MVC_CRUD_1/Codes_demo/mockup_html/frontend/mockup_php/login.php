<?php require_once 'layouts/header.php'; ?>
    <div class="main-content">
        <form action="" method="post" class="container">
            <h2 class="text-center">Đăng nhập</h2>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Log in</button>
            </div>
        </form>
        <p class="text-center"><a href="#">Tạo tài khoản mới</a></p>
    </div>

<?php require_once 'layouts/footer.php'; ?>