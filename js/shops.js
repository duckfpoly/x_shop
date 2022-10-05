// Filter category
$(document).ready(function() {
    var lenght = 8;
    // Lấy tất cả item-child
    var items = [];
    $('.item-list .product-item').each(function() {
        items.push('<div class=" animate__zoomOutDown ' + $(this).attr('class') + '" data-group="' + $(this).data('group') + '">' + $(this).html() + '</div>');
    });
    // Sự kiện khi bấm vào bộ lọc
    $('.filter-link p .filter_button').click(function(e) {
        e.preventDefault();
        var group = $(this).data('filter');
        if (group == 0) {
            $('.item-list .product-item').addClass('animate__faster animate__zoomOutDown');
            $('.item-list .product-item').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                // Lấy kết quả
                var result = '';
                for (var i = 0; i < items.length; i++) {
                    result += items[i];
                };
                $('.item-list').html(result);
                $('.item-list .product-item').removeClass('animate__zoomOutDown').addClass('animate__fadeInUp');
                $(".item-list .product-item").hide();
                $(".item-list .product-item").slice(0, lenght).show();
            });
        } else {
            $('.item-list .product-item').addClass('animate__faster animate__zoomOutDown');
            $('.item-list .product-item').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                $('.item-list').html(''); // Làm trống nội dung
                // Lấy kết quả
                var result = '';
                for (var i = 0; i < items.length; i++) {
                    if (items[i].includes('data-group="' + group + '"')) {
                        result += items[i];
                    }
                };
                $('.item-list').html(result);
                $('.item-list .product-item').removeClass('animate__zoomOutDown').addClass('animate__fadeInUp');
                $(".item-list .product-item").hide();
                $(".item-list .product-item").slice(0, lenght).show();
            });
        }
    });
});
const shop = new URLSearchParams(window.location.search).get('v');
if(shop){
    if(shop == 'shop'){
        document.querySelector('#searchInput').addEventListener('keyup', function(e) {
            // UI Element
            let namesLI = document.getElementsByClassName('product-item');
            // Get Search Query
        let searchQuery = searchInput.value.toLowerCase();
        // Search Compare & Display
        for (let index = 0; index < namesLI.length; index++) {
            const name = namesLI[index].textContent.toLowerCase();
            if (name.includes(searchQuery)) {
                namesLI[index].style.display = 'block';
            } else {
                namesLI[index].style.display = 'none';
            }
        }
        });
    }
}