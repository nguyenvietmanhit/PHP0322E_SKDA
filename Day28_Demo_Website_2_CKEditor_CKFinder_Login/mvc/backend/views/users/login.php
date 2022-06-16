<!--views/users/login.php-->
<div class="">
    <h2>Form đăng nhập user</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="username">Nhập username</label>
            <input type="text" name="username" id="username"
                   class="form-control" />
        </div>
        <div class="form-group">
            <label for="password">Nhập password</label>
            <input type="password" name="password" id="password"
                   class="form-control" />
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Đăng nhập"
                   class="btn btn-primary" />
            <br />
            Chưa có tài khoản, đăng ký tại
            <a href="index.php?controller=user&action=register">đây</a>
        </div>
    </form>
</div>
