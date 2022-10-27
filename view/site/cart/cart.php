<!-- breadcrumb part start-->
<section class="breadcrumb_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <h2>Shopping Cart</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb part end-->

<?php if(isset($_SESSION['cart'])){  if(count($_SESSION['cart']) > 0 ) { ?>
<!--================Cart Area =================-->
<section class="cart_area mt-5">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody id="qty_item">
                    <?php 
                        $i = 1;
                        $cart = $_SESSION['cart'];
                        $total = 0;
                        foreach($cart as $key => $values){
                            $subtotal = $values['price_prd'] * $values['quantity_prd'];
                            $total += $subtotal;
                    ?>
                        <form action="" method="post" id="form_item_cart" id="cart-item-<?= $values['id_prd'] ?>" >
                            <tr>
                                <td><?= $i++ ?></td>
                                <td>
                                    <img class="rounded" style="width: 100px; height: 100px" src="assets/uploads/admin/products/<?= $values['image_prd'] ?>" alt="" />
                                </td>
                                <td>
                                    <p><?= $values['name_prd'] ?></p>
                                </td>
                                <td>
                                    <h5><?= number_format($values['price_prd'], 0, '', ',') ?>₫</h5>
                                </td>
                                <td>
                                    <input onchange="change_qty(this)" data-item="<?= $values['id_prd'] ?>" id="alice" type="number" min="1" class="form-control w-25" name="qty[<?= $values['id_prd'] ?>]" value="<?= $values['quantity_prd'] ?>">
                                </td>
                                <td>
                                    <h5><?= number_format($subtotal, 0, '', ',') ?>₫</h5>
                                </td>
                                <td>
                                    <input type="hidden" id="id_product" name="id_product" value="<?= $values['id_prd'] ?>">
                                    <!-- <button class="btn btn-primary" type="submit" name="update_prd_cart"><i class="fa-solid fa-arrows-rotate"></i></button> -->
                                    <button class="btn btn-danger" type="button" id="del_item_cart" name="delete_prd_cart"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        </form>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3>Tổng tiền <small>(tạm tính)</small></h3>
                            </td>
                            <td>
                                <h3><?= number_format($total, 0, '', ',') ?>₫</h3>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <div class="checkout_btn_inner float-right">
                    <a class="btn_1" href="shop">Tiếp tục mua sắm</a>
                    <a class="btn_1 checkout_btn_1" href="checkout">Thanh toán</a>
                </div>
            </div>
        </div>
</section>
<!--================End Cart Area =================-->
<?php } else { 
    echo '
        <div class="text-center mt-5">
            <img src="https://bizweb.dktcdn.net/100/438/328/themes/836630/assets/empty-cart.png?1636877535162" alt="">
        </div>
        <div class="text-center mt-5">
            <a href="?v=shop" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left"></i> Return Shopping</a>
        </div>
    '; 
} }  else { 
    echo '
        <div class="text-center mt-5">
            <img src="https://bizweb.dktcdn.net/100/438/328/themes/836630/assets/empty-cart.png?1636877535162" alt="">
        </div>
        <div class="text-center mt-5">
            <a href="?v=shop" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left"></i> Return Shopping</a>
        </div>
    '; 
}?>

<script>
    var id_product = ''
    let change_qty = element => {
        element.setAttribute("disabled", true);
        id_product = element.getAttribute('data-item');
        var update_qty_cart  = 'update_qty_cart';
        var qty              = Number(element.value)
        var dataString =
        'update_qty_cart='    + update_qty_cart +
        '&id_product='        + id_product +
        '&quantity='          + qty;
        $.ajax({
            type: "POST",
            url: 'cart',
            data: dataString,
            success: function () {
                element.removeAttribute("disabled");
            }
        });
    }
    $(document).ready(function delete_cart() {
        $("#del_item_cart").click(function (e) {
            let text = "Bạn muốn xóa sản phẩm này ?";
            if (confirm(text) == true) {
                var delete_prd_cart = $("#del_item_cart").val();
                var id_prd = $("#id_product").val();
                var dataString =
                    'delete_prd_cart=' + delete_prd_cart +
                    '&id_product=' + id_prd;
                $.ajax({
                    type: "POST",
                    url: 'cart',
                    data: dataString,
                    success: function () {
                        showSuccessToast('SUCCESS', 'Xóa thành công', 'success');
                        location.href = 'cart';
                    }
                });
            } else {
            }
        });
    });
</script>