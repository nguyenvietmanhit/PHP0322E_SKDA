<?php require_once 'layouts/header.php'; ?>

    <main class="main-content">
        <div class="container">
            <h1 class="post-list-title">
                Profile
            </h1>
            <div class="view-account">
                <section class="module">
                    <div class="module-inner">
                        <div class="side-bar">
                            <div class="user-info">
                                <img class="img-profile img-circle img-responsive center-block"
                                     src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                                <ul class="meta list list-unstyled">
                                    <li class="name">Nguyễn Viết Mạnh
                                        <label class="label label-info">PHP Developer</label>
                                    </li>
                                    <li class="email"><a href="#">nguyenvietmanhit<br/>@gmail.com</a></li>
                                    <li class="activity">Last logged in: Today at 2:18pm</li>
                                </ul>
                            </div>
                            <nav class="side-menu">
                                <ul class="nav">
                                    <li class="active"><a href="#"><span class="fa fa-user"></span> Profile</a></li>
                                    <li><a href="#"><span class="fa fa-cog"></span> Cài đặt</a></li>
                                    <!--<li><a href="#"><span class="fa fa-credit-card"></span> Billing</a></li>-->
                                    <!--<li><a href="#"><span class="fa fa-envelope"></span> Messages</a></li>-->

                                    <!--<li><a href="user-drive.html"><span class="fa fa-th"></span> Drive</a></li>-->
                                    <!--<li><a href="#"><span class="fa fa-clock-o"></span> Reminders</a></li>-->
                                </ul>
                            </nav>
                        </div>
                        <div class="content-panel">
                            <h2 class="title">Profile<span class="pro-label label label-warning">PRO</span></h2>
                            <form class="form-horizontal">
                                <fieldset class="fieldset">
                                    <h3 class="fieldset-title">Thông tin tài khoản</h3>
                                    <div class="form-group avatar">
                                        <figure class="figure col-md-2 col-sm-3 col-xs-12">
                                            <img class="img-rounded img-responsive"
                                                 src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                                        </figure>
                                        <div class="form-inline col-md-10 col-sm-9 col-xs-12">
                                            <input type="file" class="file-uploader pull-left">
                                            <!--<button type="submit" class="btn btn-sm btn-default-alt pull-left">Update Image</button>-->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 col-sm-3 col-xs-12 control-label">Email</label>
                                        <div class="col-md-10 col-sm-9 col-xs-12">
                                            <input type="email" class="form-control" value="abc@gmail.com">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 col-sm-3 col-xs-12 control-label">Nguyễn Viết</label>
                                        <div class="col-md-10 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" value="Nguyễn Viết">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 col-sm-3 col-xs-12 control-label">Mạnh</label>
                                        <div class="col-md-10 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" value="Mạnh">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="fieldset">
                                    <h3 class="fieldset-title">Thông tin liên hệ</h3>
                                    <div class="form-group">
                                        <label class="col-md-2  col-sm-3 col-xs-12 control-label">Email</label>
                                        <div class="col-md-10 col-sm-9 col-xs-12">
                                            <input type="email" class="form-control" value="abc@gmail.com">
                                            <!--<p class="help-block">This is the email </p>-->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2  col-sm-3 col-xs-12 control-label">Facebook</label>
                                        <div class="col-md-10 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control"
                                                   value="https://www.facebook.com/nguyenviet.manh.5">
                                            <!--<p class="help-block">Your twitter username</p>-->
                                        </div>
                                    </div>
                                    <!--<div class="form-group">-->
                                    <!--<label class="col-md-2  col-sm-3 col-xs-12 control-label">Linkedin</label>-->
                                    <!--<div class="col-md-10 col-sm-9 col-xs-12">-->
                                    <!--<input type="url" class="form-control" value="https://www.linkedin.com/in/lorem">-->
                                    <!--<p class="help-block">eg. https://www.linkedin.com/in/yourname</p>-->
                                    <!--</div>-->
                                    <!--</div>-->
                                </fieldset>
                                <hr>
                                <div class="form-group">
                                    <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                        <input class="btn btn-primary" type="submit" value="Cập nhật tài khoản">
                                        <a class="btn btn-secondary" href="index.html">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
<?php require_once 'layouts/footer.php'; ?>