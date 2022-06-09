<?php require_once 'layouts/header.php'; ?>
<div class="main-content">
    <div class="container">
        <h1 class="post-list-title">
            Thanh toán
        </h1>
        <form action="" method="POST">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <h5 class="center-align">Thông tin khách hàng</h5>
                    <div class="form-group">
                        <label>Họ tên <span class="red">*</span></label>
                        <input type="text" name="fullname" value="" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>SĐT <span class="red">*</span> </label>
                        <input type="number" min="0" name="mobile" value="" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" min="0" name="email" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ nhận hàng</label>
                        <input type="text" name="address" value="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Ghi chú thêm</label>
                        <textarea name="note" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Chọn phương thức thanh toán</label> <br/>
                        <input type="radio" name="method" value="0"/> Thanh toán trực tuyến <br/>
                        <input type="radio" name="method" checked value="1"/> COD (dựa vào địa chỉ của bạn) <br/>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <h5 class="center-align">Thông tin đơn hàng của bạn</h5>
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th width="50%">Tên sản phẩm</th>
                            <th width="8%">Số lượng</th>
                            <th>Giá</th>
                            <th>Thành tiền</th>
                        </tr>
                        <tr>
                            <td>
                                <a href="product_detail.html" class="content-product-a">
                                    <img class="product-avatar img-responsive"
                                         src="assets/images/samsung-galaxy-note-10-plus-silver-400x460.png" width="60"/>
                                    <span class="content-product">
                                        Chèo xuồng
                                    </span>
                                </a>
                            </td>
                            <td>
                              <span class="product-amount">
                                  1
                              </span>
                            </td>
                            <td>
                              <span class="product-price-payment">
                                 60.000 đ
                              </span>
                            </td>
                            <td>
                              <span class="product-price-payment">
                                  60.000 đ
                              </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="product_detail.html" class="content-product-a">
                                    <img class="product-avatar img-responsive"
                                         src="assets/images/samsung-galaxy-note-10-plus-silver-400x460.png"
                                         width="60"/>
                                    <span class="content-product">
                                        Lều cắm trại 6 người
                                    </span>
                                </a>
                            </td>
                            <td>
                              <span class="product-amount">
                                  1
                              </span>
                            </td>
                            <td>
                              <span class="product-price-payment">
                                 100.000 đ
                              </span>
                            </td>
                            <td>
                              <span class="product-price-payment">
                                  100.000 đ
                              </span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" class="product-total">
                                Tổng giá trị đơn hàng:
                                <span class="product-price">
                                160.000 đ
                            </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <input type="submit" name="submit" value="Thanh toán" class="btn btn-primary">
                    <a href="cart.html" class="btn btn-secondary">Về trang giỏ hàng</a>
                </div>
            </div>

        </form>

    </div>
</div>

<!--footer-->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="image-footer-wrap col-md-3">
                <img src="/template/camping1/assets/images/logo1.jpg" class="image-footer img-responsive"/>
            </div>
            <div class="address-footer-wrap col-md-6">
                <strong>Thông tin liên hệ</strong>
                Tòa nhà CMC, Số 11, Phố Duy Tân, Phường Dịch Vọng Hậu, Cầu Giấy, Hà Nội <br/>
                Hotline: 0879123123 <br/>
                Email: info@campingsport.vn
            </div>
            <div class="social-footer-wrap col-md-3">
                <strong>Kết nối với chúng tôi</strong>
                <ul>
                    <li>
                        <a href="#">
                            <i class="color fab fa-facebook" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="color fab fa-youtube" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="color fab fa-google-plus-g"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <p class="footer-copyright">
            Copyright 2020 by nvmanh. All rights reserved
        </p>
    </div>
</div>


<div class="overlay"></div>

<ul class="icon-service-wrap">
    <li data-toggle="tooltip" data-placement="left" title="Gọi ngay cho chúng tôi">
        <a href="tel:0879123123">
            <img src="/template/camping1/assets/images/icon-phone.png" class="icon-service-img"/>
        </a>
    </li>
    <li data-toggle="tooltip" data-placement="left" title="Chat với chúng tôi qua Zalo">
        <a href="//zalo.me/0879123123" target="_blank">
            <img src="/template/camping1/assets/images/icon-zalo.png" class="icon-service-img"/>
        </a>
    </li>
    <li data-toggle="tooltip" data-placement="left" title="Gửi mail cho chúng tôi">
        <a href="mailto:info@campingsport.vn">
            <img src="/template/camping1/assets/images/icon-mail.png" class="icon-service-img"/>
        </a>
    </li>
    <li data-toggle="tooltip" data-placement="left" title="Liên hệ với chúng tôi">
        <a href="/lien-he.html" target="_blank">
            <img src="/template/camping1/assets/images/icon-map.png" class="icon-service-img"/>
        </a>
    </li>
</ul>

<script src="/template/camping1/assets/js/jquery.min.js"></script>
<script src="/template/camping1/assets/js/popper.min.js"></script>
<script src="/template/camping1/assets/js/bootstrap.min.js"></script>

<!-- Tooltip plugin (zebra) js file -->
<script src="/template/camping1/assets/js/zebra_tooltips.min.js"></script>


<!-- Owl Carousel plugin js file -->
<script src="/template/camping1/assets/js/owl.carousel.min.js"></script>

<!-- Ideabox theme js file. you have to add all pages. -->
<script src="/template/camping1/assets/js/jquery.show-more.js"></script>
<script src="/template/camping1/assets/js/script.js"></script>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function () {
        FB.init({
            xfbml: true,
            version: 'v7.0'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="2062230127150303">
</div>
</body>

</html>

<!-- LOADTIME = 0.014210939407349 ,  , 27.67.7.41-->