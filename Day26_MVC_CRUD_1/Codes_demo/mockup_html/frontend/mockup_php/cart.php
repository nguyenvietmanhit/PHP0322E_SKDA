<?php require_once 'layouts/header.php'; ?>
    <div class="main-content">
        <div class="container">
            <h1 class="post-list-title">
                Giỏ hàng của bạn
            </h1>
            <div class="main-content-wrapper">
                <!--CONTENT-->
                <div class="main">
                    <form action="" method="post">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th width="40%">Tên sản phẩm</th>
                                <th width="12%">Số lượng</th>
                                <th>Giá</th>
                                <th>Thành tiền</th>
                                <th></th>
                            </tr>

                            <tr>
                                <td>
                                    <a href="product.html" class="content-product-a">
                                        <img class="product-avatar img-responsive"
                                             src="assets/images/samsung-galaxy-note-10-plus-silver-400x460.png"
                                             height="80">
                                        <span class="content-product">
                                             Samsung Note 10
                                        </span>
                                    </a>
                                </td>
                                <td>
                                    <input type="number" min="0" name="92084"
                                           class="product-amount form-control"
                                           value="1">
                                </td>
                                <td>
                                    60.000đ
                                </td>
                                <td>
                                    60.000đ
                                </td>
                                <td>
                                    <a class="content-product-a"
                                       href="#">
                                        Xóa
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="product_detail.html" class="content-product-a">
                                        <img class="product-avatar img-responsive"
                                             src="assets/images/samsung-galaxy-note-10-plus-silver-400x460.png"
                                             height="80">
                                        <span class="content-product">
                                             Lều cắm trại 6 người
                                        </span>
                                    </a>
                                </td>
                                <td>
                                    <input type="number" min="0" name="91995"
                                           class="product-amount form-control"
                                           value="1">
                                </td>
                                <td>
                                    100.000đ
                                </td>
                                <td>
                                    100.000đ
                                </td>
                                <td>
                                    <a class="content-product-a"
                                       href="#">
                                        Xóa
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5" style="text-align: right">
                                    Tổng giá trị đơn hàng:
                                    <span class="product-price">
                                        160.000đ
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5" class="product-payment">
                                    <input type="submit" name="submit" value="Cập nhật lại giá" class="btn btn-primary">
                                    <a href="payment.html" class="btn btn-success">Đến trang thanh toán</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                <!--END CONTENT-->
                <!--END MAIN LEFT-->
            </div>
        </div>
    </div>

<?php require_once 'layouts/footer.php'; ?>