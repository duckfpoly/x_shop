<div class="container h-100 sticky-top animate__animated" id="view_cart">
    <div class="h-100">
        <div class="cart-header d-flex justify-content-between align-items-center" id="cart-header">
            <p class="text-center fw-bold">Giỏ hàng (<span id="count_cart"><?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : "0" ?></span>)</p>
            <button id="close_view_cart" class="btn btn-danger">X</button>
        </div>
        <div class="cart-body-2 overflow-auto" id="cart-body-2"></div>
        <?php if (isset($_SESSION['cart'])) {
            if (count($_SESSION['cart']) > 0) { ?>
                <div class="cart-body overflow-auto" id="cart-body">
                    <?php
                        $i = 1;
                        $cart = $_SESSION['cart'];
                        $total = 0;
                        foreach ($cart as $key => $values) {
                            $subtotal = $values['price_prd'] * $values['quantity_prd'];
                            $total += $subtotal;
                    ?>
                        <div class="mb-3" id="item-<?= $values['id_prd'] ?>">
                            <div class="d-flex justify-content-around align-items-center">
                                <div class="d-flex flex-row align-items-center">
                                    <div>
                                        <img src="assets/uploads/admin/products/<?= $values['image_prd'] ?>" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px !important;">
                                    </div>
                                    <div class="ms-3">
                                        <span class="d-inline-block" style="max-width: 200px;"><?= $values['name_prd'] ?></span>
                                        <p class="small mb-0"><?= number_format($values['price_prd'], 0, '', ',') ?>₫</p>
                                    </div>
                                </div>
                                <div style="width: 80px;">
                                    <input onchange="change_qtyy(this)" data-item="<?= $values['id_prd'] ?>" id="alice" type="number" min="1" class="form-control" name="qty[<?= $values['id_prd'] ?>]" value="<?= $values['quantity_prd'] ?>">
                                </div>
                                <div>
                                    <span id="total-item"></span>
                                </div>
                                <div>
                                    <input type="hidden" id="price_prd"     value="<?= $values['price_prd'] ?>">
                                    <input type="hidden" id="id_product"    value="<?= $values['id_prd'] ?>">
                                    <button id="delete_prd_cart" name="delete_prd_cart" value="delete_prd_cart" style="color: red;" class="btn"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="cart-footer" id="cart-footer">
                    <div>
                        <h3>
                            <input type="hidden" id="total_cart_1" value="<?= $total ?>">
                            Tổng tiền : <span id="total_cart" ><?= number_format($total, 0, '', ',') ?>₫</span>
                        </h3>
                    </div>
                    <div class="mt-3 mb-3">
                        <a href="cart" class="btn btn-primary">Xem giỏ hàng</a>
                        <a href="checkout" class="btn btn-secondary">Thanh toán ngay</a>
                    </div>
                </div>
        <?php } else {
                echo '
                <div class="text-center mt-5" id="cart-empty">
                    <img src="https://bizweb.dktcdn.net/100/438/328/themes/836630/assets/empty-cart.png?1636877535162" alt="">
                </div>
            ';
            }
        } else {
            echo '
                <div class="text-center mt-5" id="cart-empty">
                    <img src="https://bizweb.dktcdn.net/100/438/328/themes/836630/assets/empty-cart.png?1636877535162" alt="">
                </div>
            ';
        } ?>
        <div class="cart-footer-2 " id="cart-footer-2"></div>
    </div>
</div>
<style>
    #view_cart {
        width: 40%;
        position: fixed;
        right: 0;
        z-index: 99999;
        background-color: #eee;
        display: none;
    }

    #cart-header {
        width: 100%;
        height: 10%;
        /* border: 1px solid black; */
    }

    #cart-body {
        max-height: 74vh;
        height: 80%;
    }

    #cart-footer{
        width: 100%;
        height: 10%;
        margin-left: 20px;
    }

    #cart-body::-webkit-scrollbar,
    #cart-body-2::-webkit-scrollbar {
        width: 0px !important;
    }

    @media (max-width: 992px) {
        #view_cart {
            width: 90%;
            position: fixed;
            right: 0;
            z-index: 10000000000;
            background-color: #eee;
        }

        #cart-body,
        #cart-body-2 {
            margin-top: 0px;
        }
    }

    @keyframes view_cart {
        0% {
            transform: scale(0);
            opacity: 0;
        }

        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    @keyframes close_view_cart {
        0% {
            transform: translateX(0);
            opacity: 1;
        }

        100% {
            transform: translateX(100%);
            opacity: 0;
        }
    }
</style>
