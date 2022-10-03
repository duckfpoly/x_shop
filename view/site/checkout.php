<?php if(isset($_SESSION['cart'])){  
    if(count($_SESSION['cart']) > 0 ) { ?>
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-5">
        <form method="post">
            <div class="d-flex flex-wrap justify-content-between align-items-start" id="main_content">
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <h3>Infomation Receiver</h3>
                    <div class="col-md-12 form-group mb-4">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Full name" value="<?= !empty(Session::get('ID')) ?  Session::get('name') : "" ?>" />
                    </div>
                    <div class="col-md-12 form-group mb-4">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= !empty(Session::get('ID')) ?  Session::get('email') : "" ?>" />
                    </div>
                    <div class="col-md-12 form-group mb-4">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number"/>
                    </div>
                    <div class="col-md-12 form-group mb-4">
                        <select class="form-control" name="country" id="country"></select>
                    </div>
                    <div class="col-md-12 form-group mb-4">
                        <select class="form-control pe-none bg-light" name="district" id="district"></select>
                    </div>
                    <div class="col-md-12 form-group mb-4">
                        <select class="form-control pe-none bg-light" name="ward" id="ward"></select>
                    </div>
                    <div class="col-md-12 form-group mb-4">
                        <input class="form-control" name="address_detail" id="address_detail" placeholder="address detail">
                    </div>
                    <h3>Order Notes</h3>
                    <div class="col-md-12 form-group mb-4">
                        <textarea class="form-control" name="message" id="message" rows="10" placeholder="Order Notes"></textarea>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 mb-3">
                    <div class="mb-3">
                        <h3>Thanh toán</h3>
                    </div>
                    <input type="radio" name="pay_option" value="vnpay" id="vnpay">
                    <label class="item" for="vnpay">
                        <div class="title d-flex justify-content-between align-items-center">
                            Thanh toán VNPAY
                            <img src="https://bizweb.dktcdn.net/assets/themes_support/payment_icon_vnpay.png" alt="">
                        </div>
                    </label>
                    <input type="radio" name="pay_option" value="vietqr" id="vietqr">
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
                    <input type="radio" name="pay_option" value="ttkgh" id="ttkgh">
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
                    <input type="radio" name="pay_option" value="tragop" id="tragop">
                    <label class="item" for="tragop">
                        <div class="title d-flex justify-content-between align-items-center">
                            Trả góp
                            <img src="https://bizweb.dktcdn.net/100/329/122/files/03icon-tragop-0.png?v=1639481630773" alt="">
                        </div>
                        <div class="content">
                            Trả góp 0% qua thẻ tín dụng (Credit Card) Visa, Master, JCB liên kết với 29 ngân hàng. Phí chuyển đổi thấp nhất thị trường. Hỗ trợ các kì hạn 3, 6, 9, 12 tháng
                        </div>
                    </label>
                    <input type="radio" name="pay_option" value="ttonl" id="ttonl">
                    <label class="item" for="ttonl">
                        <div class="title d-flex justify-content-between align-items-center">
                            Thanh toán online qua thẻ Visa, Master, JCB 
                            <img src="https://bizweb.dktcdn.net/100/329/122/files/04icon-visamaster.png?v=1639481634747" alt="">
                        </div>
                        <div class="content">Thanh toán online qua thẻ Visa, Master, JCB (Miễn phí thanh toán)</div>
                    </label>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <div class="order_box">
                        <h2>Your Order</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Products</th>
                                    <th>Amount</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $i = 1;
                                $cart = $_SESSION['cart'];
                                $total = 0;
                                foreach($cart as $key => $values){
                                    $subtotal = $values['price_prd'] * $values['quantity_prd'];
                                    $total += $subtotal;
                            ?>
                                <tr>
                                    <td><img style="width: 65px; height: 65px;" class="rounded" src="assets/uploads/admin/products/<?= $values['image_prd'] ?>" alt=""></td>
                                    <td><?= $values['name_prd'] ?></td>
                                    <td>x 0<?= $values['quantity_prd'] ?></td>
                                    <td>$<?= number_format($values['price_prd'], 0, '', ',') ?></td>
                                    <td>$<?= number_format($subtotal, 0, '', ',') ?></td>
                                </tr>
                            <?php } ?>

                            </tbody>
                        </table>
                        <div class="cupon_areaa d-flex">
                            <input type="text" class="form-control w-50" placeholder="Enter coupon code" />
                            <button class="btn btn-outline-secondary" style="margin-left: 20px;">Apply Coupon</button>
                        </div>
                        <hr>
                        <ul class="list list_2">
                            <li>
                                <a href="#">Subtotal
                                    <span>$<span id="subtotal"><?= $total ?></span></span>
                                </a>
                            </li>
                            <li>
                                <a href="#">Shipping
                                    <span>$<span id="shipping">50</span></span>
                                </a>
                            </li>
                            <li>
                                <a href="#">Coupon
                                    <span>$<span id="coupon">0</span></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="fw-bold">Total Orer
                                    <span>$<span id="total_order"></span></span>
                                </a>
                            </li>
                        </ul>
                        <div class="mt-4 text-center">
                            <button type="submit" name="process_pay" id="process_pay" class="btn_1" href="#">Proceed to Pay</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="js/checkout.js" type="text/javascript"></script>
    <script>
        var ship = parseInt($('#shipping').text());
        var subtotal = parseInt($('#subtotal').text());
        var coupon = parseInt($('#coupon').text());
        parseInt($('#total_order').text(ship+coupon+subtotal))
    </script>
<?php 
} else { 
    echo '<script language="javascript"> alert("Mua hàng đi nào ! Đã thêm gì đâu mà thanh toán =))"); window.location="?v=shop";</script>'; 
} } 
else {
    echo '<script language="javascript">window.location="?";</script>';
} ?>