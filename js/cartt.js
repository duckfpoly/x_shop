var data = [];
function add_cart() {
    var addcart         = $("#addcart").val();
    var id_prd          = $("#id_prd").val();
    var name_prd        = $("#name_prd").val();
    var price_prd       = $("#price_prd").val();
    var image_prd       = $("#image_prd").val();
    var quantity_prd    = $("#quantity_prd").val();
    var dataString =
        'addcart='          + addcart +
        '&id_prd='          + id_prd +
        '&name_prd='        + name_prd +
        '&price_prd='       + price_prd +
        '&image_prd='       + image_prd +
        '&quantity_prd='    + quantity_prd;
    $.ajax({
        type: "POST",
        url: 'cart',
        data: dataString,
        success: function () {
            showSuccessToast('SUCCESS', 'Thêm vào giỏ hàng thành công', 'success');
            show_cart();
            var close_view_cart = function () { close_cart() };
            setTimeout(close_view_cart, 2500);
        }
    });
    var item = {
        id_prd          : id_prd,
        name_prd        : name_prd,
        price_prd       : price_prd,
        image_prd       : image_prd,
        quantity_prd    : quantity_prd
    }
    this.data.push(item)
    show()
}
function show() {
    if(document.getElementById('cart-empty')) { 
        document.getElementById('cart-empty').innerHTML = '';
    }
    count_cart(1)
    var list = this.data.reverse();
    var list_cart = ``;
    var sum = ''
    for (var i = 0; i < data.length; i++) {
        sum += list[i].price_prd
        var price_prd = new Intl.NumberFormat('it-IT',{style:'currency',currency:'VND'}).format(list[i].price_prd)
        list_cart += `
        <div class="mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <div>
                            <img src="assets/uploads/admin/products/${list[i].image_prd}" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px !important;">
                        </div>
                        <div class="ms-3">
                            <span class="d-inline-block" style="max-width: 200px;">${list[i].name_prd}</span>
                            <p class="small mb-0">${price_prd}</p>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center">
                        <div style="width: 50px;">
                            <h5 class="fw-normal mb-0"><input type="number" min="1" class="form-control" name="qty[${list[i].id_prd}]" value="${list[i].quantity_prd}"></h5>
                        </div>
                        <div style="width: 80px;">
                            <h5 class="mb-0"></h5>
                        </div>
                        <button id="delete_prd_cart" name="delete_prd_cart" value="delete_prd_cart" style="color: red;" class="btn"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
            </div>
        </div>
        `
    }
    var totals = new Intl.NumberFormat('it-IT',{style:'currency',currency:'VND'}).format(sum)
    var cart_footer_2 = `
        <div>
            <h3>
                Tổng tiền : <span>${totals}</span>
            </h3>
        </div>
        <div class="mt-3 mb-3">
            <a href="cart" class="btn btn-primary">Xem giỏ hàng</a>
            <a href="checkout" class="btn btn-secondary">Thanh toán ngay</a>
        </div>
    `
    document.getElementById('cart-body-2').innerHTML = list_cart
    document.getElementById('cart-footer-2').innerHTML = cart_footer_2
}
function count_cart(number) {
    var count_cart = document.getElementById('count_cart').innerHTML;
    var inner_count = Number(count_cart) + number;
    $('#count_cart').html(inner_count);
    $('#count_cart-2').html(inner_count);
}
function count_cart_2(number){
    var count_cart = document.getElementById('count_cart').innerHTML;
    var inner_count = Number(count_cart) - number;
    $('#count_cart').html(inner_count);
    $('#count_cart-2').html(inner_count);
}
$(document).ready(function delete_cart() {
    $("#delete_prd_cart").click(function (e) {
        let text = "Bạn muốn xóa sản phẩm này ?";
        if (confirm(text) == true) {
            var delete_prd_cart = $("#delete_prd_cart").val();
            var id_prd = $("#id_product").val();
            var dataString =
                'delete_prd_cart=' + delete_prd_cart +
                '&id_product=' + id_prd;
            $.ajax({
                type: "POST",
                url: 'cart',
                data: dataString,
                success: function () {
                    $('#item-'+id_prd).remove();
                    count_cart_2(1)
                    showSuccessToast('SUCCESS', 'Xóa thành công', 'success');
                }
            });
        } else {
        }
    });
});
$(document).ready(function buy_now() {
    $("#buy_now").click(function (e) {
        var addcart = $("#addcart").val();
        var id_prd = $("#id_prd").val();
        var name_prd = $("#name_prd").val();
        var price_prd = $("#price_prd").val();
        var image_prd = $("#image_prd").val();
        var quantity_prd = $("#quantity_prd").val();
        var dataString =
            'addcart=' + addcart +
            '&id_prd=' + id_prd +
            '&name_prd=' + name_prd +
            '&price_prd=' + price_prd +
            '&image_prd=' + image_prd +
            '&quantity_prd=' + quantity_prd;
        $.ajax({
            type: "POST",
            url: 'cart',
            data: dataString,
            success: function () {
                location.href = "checkout";
            }
        });
    });
});
$(document).ready(function () {
    $('#close_view_cart').click(function () { close_cart() });
    $('#overlay').click(function () { close_cart() });
});
$('#show_cart').click(function () {
show_cart();
});
function show_cart(){
    $("#view_cart").css({
        'display': 'block'
    });
    var box_modal = function () {
    //   $("#view_cart").css({
    //     'animation': 'view_cart 0.3s linear',
    //   });
    $("#view_cart").css({
        'animation': '',
    });
    $("#view_cart").addClass('animate__fadeInRight');
    };
    setTimeout(box_modal, 1);
    $("#overlay").css({
        'display': 'block'
    });
}
function close_cart() {
    $("#overlay").css({
        'display': 'none'
    });
    $("#view_cart").css({
        'animation': '',
    });
    var myFnc = function () {
        $("#view_cart").css({
        'display': 'none'
        });
    };
    setTimeout(myFnc, 500);
    $("#view_cart").css({
        'animation': 'close_view_cart 0.7s',
    });
}
var id_product = ''
let change_qtyy = element => {

    var total_item = (element.value) * Number($('#price_prd').val())
    $('#total-item').text(new Intl.NumberFormat('it-IT',{style:'currency',currency:'VND'}).format(total_item))

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
var total_itemm = Number($('#alice').val()) * Number($('#price_prd').val())
$('#total-item').text(new Intl.NumberFormat('it-IT',{style:'currency',currency:'VND'}).format(total_itemm))



$.each($('.cart-body'), function( index, value ) {
    console.log(value);
});