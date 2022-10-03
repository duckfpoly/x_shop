const url_country   = 'https://online-gateway.ghn.vn/shiip/public-api/master-data/province';
const url_district  = 'https://online-gateway.ghn.vn/shiip/public-api/master-data/district';
const url_ward      = 'https://online-gateway.ghn.vn/shiip/public-api/master-data/ward';
const url_fee       = 'https://online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/fee';

const token = '753a1f77-4239-11ed-b824-262f869eb1a7'
const shop_id = '3310118'

select_country()
function select_country(){
    axios.get(url_country, {
        headers: { token: token }
        }).then((res) => {
            const country = res.data.data
            $("#country").html(` <option selected disabled >Province, City</option> `);
            $.each(country, function( index, values ) {
                var data_country = `<option value="${values.ProvinceID}">${values.ProvinceName}</option>`
                $("#country").append(data_country);
            });
            $('#country').on('change', function() { 
                $('#district').val('')
                $('#ward').val('')
                $('#district').removeClass('pe-none bg-light')
                select_district();
            });
        }).catch((error) => {
            console.error(error)
        })
}
function select_district() {
    var province_id = $('#country').val()
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
                $('#ward').val('')
                $('#ward').removeClass('pe-none bg-light')
                select_ward(); 
            });
        }).catch((error) => {
            console.error(error)
        })
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
        }).catch((error) => {
            console.error(error)
        })
}

function fee(district, ward) {
    axios.get(url_fee, {
        headers: { token: token },
        params : {
            "service_id": 53321,
            "insurance_value": 20000000,
            "coupon": null,
            "from_district_id": 1482,    // Quận/Huyện người gửi
            "to_district_id": id_district,     // Quận/Huyện người nhận
            "to_ward_code": id_ward,    // ID Phường/ Xã người nhận 
            "height": 35,
            "length": 25,
            "weight": 2000,
            "width": 2
        } 
        }).then((res) => {
            console.log(res.data.data);
        }).catch((error) => {
            console.error(error)
        })
}

   
