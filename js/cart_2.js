// xóa cart
var remove_cart = document.getElementsByClassName("btn-dangerr");
for (var i = 0; i < remove_cart.length; i++) {
    var button = remove_cart[i]
    button.addEventListener("click", function (event) {
        let text = "Bạn muốn xóa sản phẩm này ?";
        if (confirm(text) == true) {
            var button_remove = event.target
            button_remove.parentElement.parentElement.remove()
            count_cart_2()
            updatecart()
            var delete_prd_cart = 'delete';
            var id_prd          = button.value;
            var dataString =
                'delete_prd_cart='  + delete_prd_cart +
                '&id_product='      + id_prd;
            $.ajax({
                type: "POST",
                url: 'cart',
                data: dataString,
                success: function () {
                    showSuccessToast('SUCCESS', 'Xóa thành công', 'success');
                }
            });
        } else {
        }
    })
}
// thay đổi số lượng
var quantity_input = document.getElementsByClassName("cart-quantity-input");
for (var i = 0; i < quantity_input.length; i++) {
    var input = quantity_input[i];
    input.addEventListener("change", function (event) {
        // var total_item = (event.value) * Number($('#price_prd').val())
        // $('#total-item').text(new Intl.NumberFormat('it-IT',{style:'currency',currency:'VND'}).format(total_item))
        event.setAttribute("disabled", true);
        id_product = event.getAttribute('data-item');
        var update_qty_cart  = 'update_qty_cart';
        var qty              = Number(event.value)
        var dataString =
        'update_qty_cart='    + update_qty_cart +
        '&id_product='        + id_product +
        '&quantity='          + qty;
        $.ajax({
            type: "POST",
            url: 'cart',
            data: dataString,
            success: function () {
                event.removeAttribute("disabled");
            }
        });
        var input = event.target
        if (isNaN(input.value) || input.value <= 0) {
            input.value = 1;
        }
        updatecart()
    })
}
// Thêm vào giỏ
var add_cart = document.getElementsByClassName("addcart");
for (var i = 0; i < add_cart.length; i++) {
    var add = add_cart[i];
    add.addEventListener("click", function (event) {
        var button = event.target;
        var product = button.parentElement.parentElement;
        var id_prd      = product.getElementsByClassName("id_prd")[0].value
        var name        = product.getElementsByClassName("content-product-h3")[0].value
        var price       = product.getElementsByClassName("price")[0].value
        var img         = product.getElementsByClassName("img-prd")[0].value;
        var quantity    = product.parentElement.getElementsByClassName("quantity_prd")[0].value
        
        addItemToCart(name, quantity, price, img, id_prd)
        updatecart()
    })
}
function addItemToCart(title, quantity, price, img, id_prd) {
    var cartRow = document.createElement('div')
    cartRow.classList.add('cart-row')
    var cartItems = document.getElementsByClassName('cart-items')[0]
    var cart_title = cartItems.getElementsByClassName('cart-item-title')
    for (var i = 0; i < cart_title.length; i++) {
        if (cart_title[i].innerText == title) {
            alert('Sản Phẩm Đã Có Trong Giỏ Hàng')
            return
        }
    }
    var quantity = quantity;
    var name = title;
    var add_cart    = 'addcart';
    var dataString =
    'addcart='          + add_cart +
    '&id_prd='          + id_prd +
    '&name_prd='        + name +
    '&price_prd='       + price +
    '&image_prd='       + img +
    '&quantity_prd='    + quantity;
    $.ajax({
        type: "POST",
        url: 'cart',
        data: dataString,
        success: function () {
            showSuccessToast('SUCCESS', 'Thêm vào giỏ hàng thành công', 'success');
            count_cart()
            show_cart();
            var close_view_cart = function () { close_cart() };
            setTimeout(close_view_cart, 2500);
        }
    });
    var cartRowContents = `
        <div class="cart-item cart-column">
            <img class="cart-item-image" src="assets/uploads/admin/products/${img}" width="100" height="100">
            <span class="cart-item-title">${title}</span>
        </div>
        <span class="cart-price cart-column">${price}</span>
        <div class="cart-quantity cart-column">
            <input  class="cart-quantity-input" data-item="${id_prd}" type="number" min="1" class="form-control" name="qty[${id_prd}]" value="${quantity}">
            <button class="btn btn-dangerr" type="button" value="${id_prd}">Xóa</button>
        </div>
    `
    cartRow.innerHTML = cartRowContents
    cartItems.append(cartRow)
    cartRow.getElementsByClassName('btn-dangerr')[0].addEventListener('click', function (event) {
        let text = "Bạn muốn xóa sản phẩm này ?";
        if (confirm(text) == true) {
            var button_remove = event.target
            button_remove.parentElement.parentElement.remove()
            updatecart()
            count_cart_2()
            var delete_prd_cart = 'delete';
            var id_prd          = cartRow.getElementsByClassName('btn-dangerr')[0].value;
            var dataString =
                'delete_prd_cart='  + delete_prd_cart +
                '&id_product='      + id_prd;
            $.ajax({
                type: "POST",
                url: 'cart',
                data: dataString,
                success: function () {
                    showSuccessToast('SUCCESS', 'Xóa thành công', 'success');
                }
            });
        } else {
        }
    })
    cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', function (event) {
        // var total_item = (event.value) * Number($('#price_prd').val())
        // $('#total-item').text(new Intl.NumberFormat('it-IT',{style:'currency',currency:'VND'}).format(total_item))
        event.setAttribute("disabled", true);
        id_product = event.getAttribute('data-item');
        var update_qty_cart  = 'update_qty_cart';
        var qty              = Number(event.value)
        var dataString =
        'update_qty_cart='    + update_qty_cart +
        '&id_product='        + id_product +
        '&quantity='          + qty;
        $.ajax({
            type: "POST",
            url: 'cart',
            data: dataString,
            success: function () {
                event.removeAttribute("disabled");
            }
        });
        var input = event.target
        if (isNaN(input.value) || input.value <= 0) {
            input.value = 1;
        }
        updatecart()
    })
}
// update cart 
function updatecart() {
    var cart_item = document.getElementsByClassName("cart-items")[0];
    var cart_rows = cart_item.getElementsByClassName("cart-row");
    var total = 0;
    for (var i = 0; i < cart_rows.length; i++) {
        var cart_row = cart_rows[i]
        var price_item = cart_row.getElementsByClassName("cart-price ")[0]
        var quantity_item = cart_row.getElementsByClassName("cart-quantity-input")[0]
        var price = parseFloat(price_item.innerText)
        var quantity = quantity_item.value
        total = total + (price * quantity)
    }
    document.getElementsByClassName("cart-total-price")[0].innerText = new Intl.NumberFormat('it-IT',{style:'currency',currency:'VND'}).format(total)
}
$(document).ready(function () {
    $('#close_view_cart').click(function () { close_cart() });
    $('#overlay').click(function () { close_cart() });
});
$('#show_cart').click(function () {
show_cart();
});
function show_cart(){
    var box_modal = function () {
    $("#view_cart").css({
        'animation': '',
    });
    $("#view_cart").addClass('animate__fadeInRight');
    };
    $("#view_cart").css({
        'display': 'block'
    });
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
$(document).ready(function buy_now() {
    $("#buy_now").click(function (e) {
        var addcart = 'addcart';
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
function count_cart() {
    var count_cart = document.getElementById('count_cart').innerHTML;
    var inner_count = Number(count_cart) + 1;
    $('#count_cart').html(inner_count);
    $('#count_cart-2').html(inner_count);
}
function count_cart_2(){
    var count_cart = document.getElementById('count_cart').innerHTML;
    var inner_count = Number(count_cart) - 1;
    $('#count_cart').html(inner_count);
    $('#count_cart-2').html(inner_count);
}

