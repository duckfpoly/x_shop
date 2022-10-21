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
            $("#province").html(`<option selected disabled >Tỉnh, Thành phố</option>`);
            $.each(province, function( index, values ) {
                var data_province = `<option value="${values.ProvinceID}">${values.ProvinceName}</option>`
                $("#province").append(data_province);
            });
            $('#province').on('change', function() { 
                $('#district').prop('selectedIndex',0);
                $('#ward').prop('selectedIndex',0);
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
            $("#district").html(` <option selected disabled >Quận, Huyện, Thị xã</option> `);
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
            $("#ward").html(`<option selected disabled >Xã, phường, thị trấn</option>`);
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

var truck = null;
$("input[name='truck']").click(function() {
    truck = this.value;
    if(truck == 0) {
        ship = 25000;
        $('#shipping').text(new Intl.NumberFormat('it-IT',{style:'currency',currency:'VND'}).format(ship));
        var total_order = ship + subtotal + coupon;
        $('#total_orders').val(total_order);
        $('#total_order').text(new Intl.NumberFormat('it-IT',{style:'currency',currency:'VND'}).format(total_order));
    }
    else if(truck == 1) {
        ship = 50000;
        $('#shipping').text(new Intl.NumberFormat('it-IT',{style:'currency',currency:'VND'}).format(ship));
        var total_order = ship + subtotal + coupon;
        $('#total_orders').val(total_order);
        $('#total_order').text(new Intl.NumberFormat('it-IT',{style:'currency',currency:'VND'}).format(total_order));
    }
});
const coupon_code = [
    {
        id:1,
        code:"coupon",
        coupon_percent: 60
    },
    {
        id:2,
        code:"coupon2",
        coupon_price: 2000000,
    },
    {
        id:3,
        code:"supercoupon",
        coupon_final: 100,
    }
]
$( "#apply_id_coupon" ).click(function() {
    if($('#input_coupon').val('')){
        alert('Vui lòng nhập mã giảm giá'); 
    }
    else {
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
                    // voucher order 0đ
                    $('#coupon').html(`-&nbsp;<del>${coupon_super}%</del>`);
                    var total_order = (ship + subtotal) - ((ship + subtotal) * coupon_super / 100)
                    $('#total_orders').val(total_order);
                    $('#total_order').text(new Intl.NumberFormat('it-IT',{style:'currency',currency:'VND'}).format(total_order));
                }
            }
        });
    }
});
var pay_option = null;
$("input[name='pay_option']").click(function() {
    pay_option = this.value;
    console.log(pay_option);
});