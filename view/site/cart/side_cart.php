<div class="container h-100 sticky-top animate__animated" id="view_cart">
    <div id="myModal" class="modall">
        <div class="modall-content">
            <div class="modall-header text-center mt-3 d-flex justify-content-between">
                <div>
                    <h3 class="modall-title fw-bold">Giỏ Hàng (&nbsp;<span id="count_cart"><?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : "0" ?></span>&nbsp;)</h3>
                </div>
                <div>
                    <button id="close_view_cart" class="btn btn-danger">X</button>
                </div>
            </div>
            <div class="modall-body">
                <div class="cart-row">
                    <span class="cart-item cart-header cart-column">Sản Phẩm</span>
                    <span class="cart-price cart-header cart-column">Giá</span>
                    <span class="cart-quantity cart-header cart-column">Số Lượng</span>
                </div>
                <div class="cart-items">
                <?php if (isset($_SESSION['cart'])) {
                    if (count($_SESSION['cart']) > 0) {
                        $i = 1;
                        $cart = $_SESSION['cart'];
                        $total = 0;
                        foreach ($cart as $key => $values) {
                            $subtotal = $values['price_prd'] * $values['quantity_prd'];
                            $total += $subtotal;
                    ?>
                        <div class="cart-row">
                            <div class="cart-item cart-column">
                                <img class="cart-item-image" src="assets/uploads/admin/products/<?= $values['image_prd'] ?>" width="100" height="100">
                                <span class="cart-item-title"><?= $values['name_prd'] ?></span>
                            </div>
                            <span class="cart-price cart-column"><?= $values['price_prd'] ?></span>
                            <div class="cart-quantity cart-column">
                                <input onchange="change_qtyy(this)" class="cart-quantity-input" data-item="<?= $values['id_prd'] ?>" type="number" min="1" class="form-control" name="qty[<?= $values['id_prd'] ?>]" value="<?= $values['quantity_prd'] ?>">
                                <button class="btn btn-dangerr" type="button" value="<?= $values['id_prd'] ?>">Xóa</button>
                            </div>
                        </div>
                    <?php } } }?>
                </div>
                <div class="cart-total mb-3">
                    <strong class="cart-total-title">Tổng Cộng:</strong>
                    <span class="cart-total-price"> <?= isset($total) ? number_format($total, 0, '', ',')." VND" : "0 VND" ?></span>
                </div>
            </div>
            <div class="modall-footer">
                <a href="cart" class="btn btn-primary">Đến trang giỏ hàng</a>
                <a href="checkout" class="btn btn-success">Thanh toán ngay</a>
            </div>
        </div>
    </div>
</div>