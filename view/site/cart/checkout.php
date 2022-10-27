<?php if (isset($_SESSION['cart'])) {
    if (count($_SESSION['cart']) > 0) { ?>
        <section class="breadcrumb_part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb_iner">
                            <h2>CHECKOUT</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mt-5">
            <form method="post" id="forms" >
                <div class="d-flex flex-wrap justify-content-between align-items-start" id="main_content">
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <h3>Thông tin người nhận</h3> <?= empty(Session::get('ID')) ? "| <small>Đã có tài khoản ? <a href='sign_in'>Đăng nhập ngay</a></small> |" : "" ?>  
                        <div class="col-md-12 form-group mb-4 mt-3">
                            <label for="name" class="form-label">Họ tên</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= !empty(Session::get('ID')) ?  Session::get('name') : "" ?>" required />
                        </div>
                        <div class="col-md-12 form-group mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?= !empty(Session::get('ID')) ?  Session::get('email') : "" ?>" required />
                        </div>
                        <div class="col-md-12 form-group mb-4">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="phone" name="phone" required />
                        </div>
                        <div class="col-md-12 form-group mb-4">
                            <label for="province" class="form-label">Tỉnh, Thành phố</label>
                            <select class="form-control" name="province" id="province" required></select>
                        </div>
                        <div class="col-md-12 form-group mb-4">
                            <label for="district" class="form-label">Quận, huyện, thị xã</label>
                            <select class="form-control pe-none bg-light" name="district" id="district" required></select>
                        </div>
                        <div class="col-md-12 form-group mb-4">
                            <label for="ward" class="form-label">Xã, phường, thị trấn</label>
                            <select class="form-control pe-none bg-light" name="ward" id="ward" required></select>
                        </div>
                        <div class="col-md-12 form-group mb-4">
                            <label for="address_detail" class="form-label">Chi tiết địa chỉ</label>
                            <input class="form-control" name="address_detail" id="address_detail" placeholder="số nhà, tên đường, ...">
                        </div>
                        <h3>Ghi chú đơn hàng</h3>
                        <div class="col-md-12 form-group mb-4">
                            <textarea class="form-control" name="message" id="message" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <div class="mb-5">
                            <div class="mb-3">
                                <h3>Giao hàng</h3>
                            </div>
                            <input type="radio" name="truck" value="0" class="truck" id="truck_normal" required>
                            <label class="item" for="truck_normal">
                                <div class="title d-flex justify-content-between align-items-center">
                                    Giao hàng tiêu chuẩn (48h - 72h)
                                    <i class="fa-solid fa-truck"></i>
                                </div>
                                <div class="content">
                                    Cước phí vận chuyển : 25.000 VNĐ
                                </div>
                            </label>
                            <input type="radio" name="truck" value="1" class="truck" id="truck_faster" required>
                            <label class="item" for="truck_faster">
                                <div class="title d-flex justify-content-between align-items-center">
                                    Giao hàng nhanh (24 - 36h)
                                    <i class="fa-solid fa-truck-fast"></i>
                                </div>
                                <div class="content">
                                    Cước phí vận chuyển : 50.000 VNĐ
                                </div>
                            </label>
                        </div>
                        <div class="mt-5">
                            <div class="mb-3">
                                <h3>Thanh toán</h3>
                            </div>
                            <input required type="radio" name="pay_option" value="0" id="vnpay">
                            <label class="item" for="vnpay">
                                <div class="title d-flex justify-content-between align-items-center">
                                    Thanh toán VNPAY
                                    <img src="https://bizweb.dktcdn.net/assets/themes_support/payment_icon_vnpay.png" alt="">
                                </div>
                            </label>
                            <input required type="radio" name="pay_option" value="1" id="vietqr">
                            <label class="item" for="vietqr">
                                <div class="title d-flex justify-content-between align-items-center">
                                    Chuyển khoản qua ngân hàng (VietQR)
                                    <img src="https://bizweb.dktcdn.net/100/329/122/files/01icon-vietqr.png?v=1639481626593" alt="">
                                </div>
                                <div class="content">
                                    Scan mã VietQR tài khoản Vietinbank của Siêu Tốc.
                                    <br>
                                    <br>
                                    VietQR là nhận diện thương hiệu chung cho các dịch vụ thanh toán, chuyển khoản bằng mã QR được xử lý qua mạng lưới Napas do Ngân hàng Nhà nước Việt Nam ban hành.
                                    <br>
                                    <br>
                                    Quý khách sẽ nhận SMS và email thông báo khi scan thanh toán thành công.
                                </div>
                            </label>
                            <input required type="radio" name="pay_option" value="2" id="ttkgh">
                            <label class="item" for="ttkgh">
                                <div class="title d-flex justify-content-between align-items-center">
                                    Thanh toán khi giao hàng
                                    <img src="https://bizweb.dktcdn.net/100/329/122/files/02icon-cod.png?v=1639559673947" alt="">
                                </div>
                                <div class="content">
                                    Hà Nội: Ưu tiên giao hàng không tiếp xúc.
                                    <br><br>
                                    Hỗ trợ COD với đơn hàng giá trị < 2.000.000đ. <br><br>
                                        Đơn hàng >= 2.000.000đ hoặc có các sản phẩm Laptop, PC, Màn hình, Ghế quý khách vui lòng chọn chuyển khoản.
                                        <br><br>
                                        Lưu ý: XShop miễn phí đồng kiểm cho khách hàng.
                                </div>
                            </label>
                            <input required type="radio" name="pay_option" value="3" id="tragop">
                            <label class="item" for="tragop">
                                <div class="title d-flex justify-content-between align-items-center">
                                    Trả góp
                                    <img src="https://bizweb.dktcdn.net/100/329/122/files/03icon-tragop-0.png?v=1639481630773" alt="">
                                </div>
                                <div class="content">
                                    Trả góp 0% qua thẻ tín dụng (Credit Card) Visa, Master, JCB liên kết với 29 ngân hàng. Phí chuyển đổi thấp nhất thị trường. Hỗ trợ các kì hạn 3, 6, 9, 12 tháng
                                </div>
                            </label>
                            <input required type="radio" name="pay_option" value="4" id="ttonl">
                            <label class="item" for="ttonl">
                                <div class="title d-flex justify-content-between align-items-center">
                                    Thanh toán online qua thẻ Visa, Master, JCB
                                    <img src="https://bizweb.dktcdn.net/100/329/122/files/04icon-visamaster.png?v=1639481634747" alt="">
                                </div>
                                <div class="content">Thanh toán online qua thẻ Visa, Master, JCB (Miễn phí thanh toán)</div>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12">
                        <div class="order_box">
                            <h2>Thông tin đơn hàng</h2>
                            <table class="table" id="example">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng(c)</th>
                                        <th>Giá</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $cart = $_SESSION['cart'];
                                    $total = 0;
                                    foreach ($cart as $key => $values) {
                                        $subtotal = $values['price_prd'] * $values['quantity_prd'];
                                        $total += $subtotal;
                                    ?>
                                        <tr>
                                            <td><a class="text-dark" href="shop?req=detail&id=<?= $values['id_prd'] ?>">
                                                    <img style="width: 65px; height: 65px;" class="rounded" src="assets/uploads/admin/products/<?= $values['image_prd'] ?>" alt="">
                                                </a> 
                                            </td>
                                            <td><a class="text-dark" href="shop?req=detail&id=<?= $values['id_prd'] ?>">
                                                    <span class="d-inline-block text-truncate" style="max-width: 150px;">
                                                        <?= $values['name_prd'] ?>
                                                    </span> 
                                            </a></td>
                                            <td class="id_prd d-none"><?= $values['id_prd'] ?></td>
                                            <td class="quantity"><?= $values['quantity_prd'] ?></td>
                                            <td><?= number_format($values['price_prd'], 0, '', '.') ?> VND</td>
                                            <td><?= number_format($subtotal, 0, '', '.') ?> VND</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="cupon_areaa d-flex">
                                <form>
                                    <input type="text" class="form-control w-50" placeholder="Nhập mã giảm giá ..." id="input_coupon"/>
                                    <button type="button" class="btn btn-outline-secondary" id="apply_id_coupon" style="margin-left: 20px;">Apply</button>
                                </form>
                            </div>
                            <hr>
                            <ul class="list list_2">
                                <li>
                                    <a href="#">Thành tiền
                                        <span><span id="subtotal"><?= $total ?></span></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Phí vận chuyển
                                        <span><span id="shipping">0</span></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Giảm giá
                                        <span id="coupon">0</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="fw-bold">Tổng tiền thanh toán
                                        <input type="hidden" name="total_orders" id="total_orders">
                                        <span><span id="total_order"></span></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="mt-4 text-center">
                                <button type="submit" name="process_pay" id="process_pay" class="btn_1" value="process_pay">Đặt hàng</button>
                            </div>
                            <div>
                                <a href="?v=shop"><i class="fa-solid fa-arrow-left"></i> Quay lại mua hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
        <hr class="w-75" style="margin: 0px auto;">
        <div class="col-6" style="margin: 0px auto;">
            <h3 class="fw-bold mt-3">
                Điều khoản
            </h3>
            <br>
            <p>
                <span class="fw-bold">
                    Quý khách vui lòng theo dõi email để nhận thông tin cập nhật về đơn hàng, bao gồm đơn vị giao hàng và mã vận đơn.
                </span> <br>
                Do ảnh hưởng của dịch Covid-19, một số khu vực có thể nhận hàng chậm hơn dự kiến. Cám ơn sự thông cảm của quý khách!
                <br>** Quý khách chọn thanh toán trước qua chuyển khoản để được giao hàng không tiếp xúc.
            </p>
        </div>
<?php
    } else {
        echo '<script language="javascript"> alert("Mua hàng đi nào ! Đã thêm gì đâu mà thanh toán =))"); window.location="shop";</script>';
    }
} else {
    echo '<script language="javascript">window.location="home";</script>';
} ?>
