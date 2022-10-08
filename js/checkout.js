const url_province   = 'https://online-gateway.ghn.vn/shiip/public-api/master-data/province';
const url_district  = 'https://online-gateway.ghn.vn/shiip/public-api/master-data/district';
const url_ward      = 'https://online-gateway.ghn.vn/shiip/public-api/master-data/ward';
const url_fee       = 'https://online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/fee';

const token         = '753a1f77-4239-11ed-b824-262f869eb1a7';
const shop_id       = '3310118';

select_province()
function select_province(){
    axios.get(url_province, {
        headers: { token: token }
        }).then((res) => {
            const province = res.data.data
            $("#province").html(`<option selected disabled >Province, City</option>`);
            $.each(province, function( index, values ) {
                var data_province = `<option value="${values.ProvinceID}">${values.ProvinceName}</option>`
                $("#province").append(data_province);
            });
            $('#province').on('change', function() { 
                $('#district').prop('selectedIndex',0);
                $('#ward').prop('selectedIndex',0);
                // $('#district option').prop('selected', function () { return this.defaultSelected; });
                // $('#ward option').prop('selected', function () { return this.defaultSelected; });
                $('#district').removeClass('pe-none bg-light');
                select_district();
            });
        }).catch((error) => { console.error(error) })
}
function select_district() {
    var province_id = $('#province').val();
    axios.get(url_district, {
        headers: { token: token },
        params : { "province_id" : province_id } 
        }).then((res) => {
            const district = res.data.data
            $("#district").html(` <option selected disabled >District, Town</option> `);
            $.each(district, function( index, values ) {
                var data_district = `<option value="${values.DistrictID}">${values.DistrictName}</option>`
                $("#district").append(data_district);
            });
            $('#district').on('change', function() {  
                // $('#ward').prop('selectedIndex',0);
                $('#ward option').prop('selected', function () { return this.defaultSelected; });
                $('#ward').removeClass('pe-none bg-light')
                select_ward(); 
            });
        }).catch((error) => { console.error(error) });
}
function select_ward() {
    var district_id = $('#district').val()
    axios.get(url_ward, {
        headers: { token: token },
        params : { "district_id": district_id } 
        }).then((res) => {
            const ward = res.data.data
            $("#ward").html(`<option selected disabled >Ward</option>`);
            $.each(ward, function( index, values ) {
                var data_ward = `<option value="${values.WardCode}">${values.WardName}</option>`
                $("#ward").append(data_ward);
            });
            $('#ward').on('change', function(){ 
                // fee()
            });
        }).catch((error) => { console.error(error) });
}
function fee() {
    var to_district_id  = parseInt($('#district').val());
    var to_ward_code    = String($('#ward').val());
    console.log(to_district_id);
    console.log(to_ward_code);
    axios.get(url_fee, {
        headers: { token: token },
        params : {
            "service_id":53321,
            "insurance_value":20000000,
            "coupon": null,
            "from_district_id":1482,                 
            "to_district_id":to_district_id,               
            "to_ward_code":to_ward_code,               
            "height":35,
            "length":25,
            "weight":2000,
            "width":2
        } 
        }).then((res) => {
            console.log(res.data.data.total);
        }).catch(() => { 
            alert('Không có dịch vụ vận chuyển phù hợp đến địa chỉ đã chọn ! ')
            location.reload();
        })
}
const coupon_code = [
    {
        id:1,
        code:"azazer",
        coupon_percent: 60
    },
    {
        id:2,
        code:"ogatim",
        coupon_price: 2000000,
    },
    {
        id:6,
        code:"supercoupon",
        coupon_final: 100,
    }
]
$( "#apply_id_coupon" ).click(function() {
    $.each(coupon_code, function( index, values ) {
        if (values.code.includes($('#input_coupon').val())) {
            var coupon_discount = values.coupon_price
            var coupon_percent = values.coupon_percent
            var coupon_super = values.coupon_final
            if(coupon_discount) {
                // giảm theo giá
                var coupon_price = new Intl.NumberFormat('it-IT',{style:'currency',currency:'VND'}).format(coupon_discount)
                $('#coupon').html(`-&nbsp;<del>${coupon_price}</del>`);
                var total_order = (ship + subtotal) - coupon_discount ;
                $('#total_orders').val(total_order);
                $('#total_order').text(new Intl.NumberFormat('it-IT',{style:'currency',currency:'VND'}).format(total_order));
            }
            if(coupon_percent){
                // giảm theo phần trăm
                $('#coupon').html(`-&nbsp;<del>${coupon_percent}%</del>`);
                var total_order = ((ship + subtotal) * coupon_percent) / 100 ;
                $('#total_orders').val(total_order)
                $('#total_order').text(new Intl.NumberFormat('it-IT',{style:'currency',currency:'VND'}).format(total_order));
            }
            if(coupon_super){
                // giảm theo phần trăm
                $('#coupon').html(`-&nbsp;<del>${coupon_super}%</del>`);
                var total_order = (ship + subtotal) - ((ship + subtotal) * coupon_super / 100)
                $('#total_orders').val(total_order);
                $('#total_order').text(new Intl.NumberFormat('it-IT',{style:'currency',currency:'VND'}).format(total_order));
            }
        }
    });
});
// tổng tiền giỏ hàng
var subtotal = Number($('#subtotal').text());
$('#subtotal').text(new Intl.NumberFormat('it-IT',{style:'currency',currency:'VND'}).format(subtotal));
// tiền ship 
var ship = Number($('#shipping').text());
$('#shipping').text(new Intl.NumberFormat('it-IT',{style:'currency',currency:'VND'}).format(ship));
// voucher
var coupon = Number($('#coupon').text());
$('#coupon').text(new Intl.NumberFormat('it-IT',{style:'currency',currency:'VND'}).format(coupon));
// tổng tiền đơn hàng
var total_order = ship + coupon + subtotal;
$('#total_orders').val(total_order);
$('#total_order').text(new Intl.NumberFormat('it-IT',{style:'currency',currency:'VND'}).format(total_order));

// function confirm() {
//     // Thông tin khách hàng
//     var name            = $("#name").val();
//     var email           = $("#email").val();
//     var phone           = $("#phone").val();
//     var province        = $("#province").val();
//     var district        = $("#district").val();
//     var address_detail  = $("#address_detail").val();
//     var message         = $("#message").val();
//     // Thông tin giao hàng và thanh toán 
//     var truck           = $('input[name=truck').val();
//     var pay_option      = $('input[name=pay_option').val();
//     // Tổng tiền hóa đơn 
//     var total_orders    = $("#total_orders").val();
//     var order_status    = 0;
//     // Sản phẩm
//     var arr_id = [];
//     $('#example .id_prd').each(function() {
//         arr_id.push($(this).html());
//     });
//     var arr_quantity = [];
//     $('#example .quantity').each(function() {
//         arr_quantity.push($(this).html());
//     });
//     var data_id         = JSON.stringify(arr_id);
//     var data_quantity   = JSON.stringify(arr_quantity);
//     // btn process
//     var btn_submit = $("#process_pay").val();
//     $("#process_pay").click(function(e) {
//         e.preventDefault();
//         $.ajax({
//             type: "POST",
//             url: '?v=confirm_order',
//             data: {
//                 btn_submit      : btn_submit,
//                 name            : name,
//                 email           : email,
//                 phone           : phone,
//                 province        : province,
//                 district        : district,
//                 ward            : ward,
//                 address_detail  : address_detail,
//                 message         : message,
//                 truck           : truck,
//                 pay_option      : pay_option,
//                 order_status    : order_status,
//                 data_id         : data_id,
//                 data_quantity   : data_quantity,
//                 total_orders    : total_orders,
//             },
//             success: function() {
//                 location.href = '?v=confirm_order';
//             }
//         });
//     });
// }
// confirm()