<section class="breadcrumb_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <h2>product list</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product_list section_padding">
    <div class="containerr w-75" style="margin: 0px auto;">
        <div class="row">
            <div class="col-md-2">
                <div class="product_sidebar">
                    <div class="single_sedebar">
                        <form action="#">
                            <input type="text" name="#" placeholder="Search keyword" id="searchInput" >
                            <i class="ti-search"></i>
                        </form>
                    </div>
                    <div class="single_sedebar">
                        <div class="select_option">
                            <div class="select_option_list">Category <i class="right fas fa-caret-down"></i> </div>
                            <div class="select_option_dropdown filter-link">
                                <p>
                                    <a class="filter_button" href="#" data-filter="0">All</a>
                                </p>
                                <?php foreach ($read_cate as $row => $values) { ?>
                                    <p>
                                        <a class="filter_button" href="#" data-filter="<?= $values['id_cate'] ?>"><?= $values['name_cate'] ?></a>
                                    </p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="product_list">
                    <div class="row item-list">
                        <?php foreach ($read_prd as $items => $values) {
                            $data = total($values['price'], $values['giam_gia']);
                        ?>
                            <div class="col-lg-3 col-sm-6 product-item item-child animate__animated" data-group="<?= $values['id_cate'] ?>">
                                <div class="single_product_item">
                                    <div class="single_product_item_thumb">
                                        <a href="?v=product_detail&id=<?= $values['id_prd'] ?>">
                                            <img style="width: 100% !important; height: 300px !important " src="assets/uploads/admin/products/<?= $values['image'] ?>" alt="#" class="img-fluid rounded">
                                        </a>
                                    </div>
                                    <h3 style="font-size: 20px;"> <a href="?v=product_detail&id=<?= $values['id_prd'] ?>"><?= $values['name_prd'] ?></a> </h3>
                                    <div class="d-flex mt-3 mb-3 <?= $values['giam_gia'] == 0 ? "invisible" : "" ?>">
                                        <del>$<?= number_format($values['price'], 0, '', ',');  ?></del>&emsp;
                                        <span class="text-danger">Discount ( <?= $values['giam_gia'] ?>% )</span>
                                    </div>
                                    <div class="fw-bold d-flex justify-content-between align-items-center">
                                        <p>Price: $<?= number_format($data, 0, '', ','); ?></p> 
                                        <?php if ($values['so_luong'] > 0) {
                                            echo '
                                                <small class="text-success"><i class="fa-solid fa-check"></i>&nbsp;Stock</small>
                                            ';
                                        } else {
                                            echo '
                                                <small class="text-secondary"><i class="fa-solid fa-phone"></i>&nbsp;Contact</small>
                                            ';
                                        } ?>
                                        
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="load_more_btn text-center d-flex justify-content-center align-items-center">
                        <a href="#" class="btn_3 w-25" id="loadMore">Load More</a>
                        <a href="#" class="btn_3 w-25 d-none" id="loadLess">Load Less</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="feature_part section_padding">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-6">
                <div class="feature_part_tittle">
                    <h3>Credibly innovate granular
                        internal or organic sources
                        whereas standards.</h3>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="feature_part_content">
                    <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources. Credibly innovate granular internal or “organic” sources whereas high standards in web-readiness.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-sm-6">
                <div class="single_feature_part">
                    <img src="img/icon/feature_icon_1.svg" alt="#">
                    <h4>Credit Card Support</h4>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single_feature_part">
                    <img src="img/icon/feature_icon_2.svg" alt="#">
                    <h4>Online Order</h4>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single_feature_part">
                    <img src="img/icon/feature_icon_3.svg" alt="#">
                    <h4>Free Delivery</h4>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single_feature_part">
                    <img src="img/icon/feature_icon_4.svg" alt="#">
                    <h4>Product with Gift</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="subscribe_part section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="subscribe_part_content">
                    <h2>Get promotions & updates!</h2>
                    <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources credibly innovate granular internal .</p>
                    <div class="subscribe_form">
                        <input type="email" placeholder="Enter your mail">
                        <a href="#" class="btn_1">Subscribe</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script>
<script>
    // loadMore
    $(document).ready(function() {
        $(".product-item").hide();
        $(".product-item").slice(0, 8).show();
        if ($(".product-item").length <= 8) {
            $("#loadMore").addClass("d-none");
        } else {
            $("#loadMore").on("click", function(e) {
                e.preventDefault();
                $(".product-item:hidden").slice(0, 8).slideDown();
                if ($(".product-item:hidden").length == 0) {
                    $("#loadMore").addClass("d-none");
                    $("#loadLess").removeClass("d-none");
                    $("#loadLess").addClass("d-block");
                }
            });
        }
    });
    // LoadLess
    $(document).ready(function() {
        $('#loadLess').click(function(e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: 440
            }, 0);
            // $(".item-list .product-item").slideUp();
            $('.item-list .product-item').addClass('animate__fadeInDown');
            $(".item-list .product-item").hide();
            $(".item-list .product-item").slice(0, 8).show();
            $("#loadMore").removeClass("d-none");
            $("#loadLess").addClass("d-none");
        });
    });
    // Filter category
    $(document).ready(function() {
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
                    $(".item-list .product-item").slice(0, 6).show();
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
                    $(".item-list .product-item").slice(0, 6).show();
                });
            }
        });
    });
    // filter
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
</script>