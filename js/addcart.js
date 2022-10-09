$(document).ready(function createItem() {
    $("#addcart").click(function (e) {

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
            url: '?v=cart',
            data: dataString,
            success: function () {
                alert('Thêm vào giỏ hàng thành công');
            }
        });
    });
});
