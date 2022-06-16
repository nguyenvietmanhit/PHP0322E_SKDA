<?php require_once 'layouts/header.php'; ?>
    <div class="main-content">
        <div class="container">
            <h1 class="post-list-title">
                Liên hệ
            </h1>
            <div class="two-item-wrap">
                <div class="link-secondary-wrap row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <form action="" method="post">
                            <input type="hidden" name="_csrf" value="963cfc7f7b5e6bb49d443ce261c80689ccb4f7f8dd0c4426c9a32c095428c0a7">
                            <div class="form-group">
                                <label for="name">Họ tên <span class="red">*</span> </label>
                                <input type="text" name="name" id="name" value="" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label for="mobile">SĐT <span class="red">*</span></label>
                                <input type="text" name="mobile" id="mobile" class="form-control" required="" value="">
                            </div>
                            <div class="form-group">
                                <label for="email">Email <span class="red">*</span></label>
                                <input type="email" value="" name="email" id="email" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label for="content">Nội dung liên hệ</label>
                                <textarea class="form-control" rows="5" id="content" name="content"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Gửi" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.046833624014!2d105.78224801533223!3d21.030811993083166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab4c9c4fda4f%3A0xafda61030958d75f!2sCMC%20Global!5e0!3m2!1sen!2s!4v1592278918177!5m2!1sen!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'layouts/footer.php'; ?>