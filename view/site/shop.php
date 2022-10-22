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
<section class="product_list ">
    <div class="containerr w-100 p-3" >
        <div class="row">
            <div class="col-lg-2 col-md-12 col-sm-12" style="margin-top: 100px;"> 
                <div class="product_sidebar">
                    <div class="single_sedebar">
                        <form method="post">
                            <input type="text" name="search_key" placeholder="Search ..." id="searchInput" value="<?= isset($_POST['search_key']) == true ? $_POST['search_key'] : ""  ?>">
                            <?= isset($_POST['search_key']) == true ? ' <a href="shop" class="text-dark"><i class="ti-close"></i></a>' : '<i class="ti-search"></i>'  ?>
                        </form>
                    </div>
                    <div class="single_sedebar">
                        <div class="select_option">
                            <div class="select_option_list">Danh mục sản phấm <i class="right fas fa-caret-down"></i> </div>
                            <div class="select_option_dropdown filter-link <?= isset($_GET['cate']) == true ? "d-block" : "" ?>">
                                <p>
                                    <a class="filter_button" href="shop">Tất cả</a>
                                </p>
                                <?php foreach ($read_cate as $row => $values) { ?>
                                    <p><a class="filter_button" id="<?= strtolower($values['name_cate']) ?>" href="shop?cate=<?= strtolower($values['name_cate']) ?>"><?= $values['name_cate'] ?></a></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="single_sedebar">
                        <div class="select_option">
                            <div class="select_option_list">Lọc sản phẩm <i class="right fas fa-caret-down"></i> </div>
                            <div class="select_option_dropdown filter-link <?= isset($_GET['sort']) == true ? "d-block" : "" ?>">
                                <p><a class="filter_button" href="shop">Mặc định</a></p>
                                <?php
                                $direct_url = '';
                                // $base_url = $this->url;
                                if (isset($_GET['cate']) == true) {
                                    $direct_url = "shop?cate=" . $_GET['cate'] . "&sort=";
                                } else {
                                    $direct_url = "shop?sort=";
                                }
                                ?>
                                <p><a class="filter_button" id="price_desc" href="<?= $direct_url ?>price_desc">Giá từ cao -> thấp</a></p>
                                <p><a class="filter_button" id="price_asc" href="<?= $direct_url ?>price_asc">Giá từ thấp -> cao</a></p>
                                <p><a class="filter_button" id="name_desc" href="<?= $direct_url ?>name_desc">Tên từ Z -> A</a></p>
                                <p><a class="filter_button" id="name_asc" href="<?= $direct_url ?>name_asc">Tên từ A -> Z</a></p>
                                <p><a class="filter_button" id="special" href="<?= $direct_url ?>special">Hàng đặc biệt</a></p>
                                <p><a class="filter_button" id="normal" href="<?= $direct_url ?>normal">Hàng thường</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="single_sedebar">
                        <div class="select_option">
                            <div class="select_option_list">Lọc giá tùy chọn <i class="right fas fa-caret-down"></i> </div>
                            <div class="select_option_dropdown filter-link <?= isset($_GET['sort_price']) == true ? "d-block" : "" ?>">
                                <form method="post" action="shop?sort_price=price_range">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Từ</label>
                                        <input type="number" min="0" class="form-control border" name="min_price" placeholder="min" value="<?= isset($_POST['min_price']) ? $_POST['min_price'] : '' ?>">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label">Đến</label>
                                        <input type="number" min="0" class="form-control border" name="max_price" placeholder="max" value="<?= isset($_POST['max_price']) ? $_POST['max_price'] : '' ?>">
                                    </div>
                                    <div class="form-group mt-5 text-center">
                                        <button type="submit" name="filter_price_range" class="w-50 btn btn-outline-primary">Lọc</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-md-12 col-sm-12">
                <?php if (isset($alert) == true) { ?>
                    <div class="mb-5">
                        <img src="https://shop-media.vgsshop.vn/pub/media/khoa-banner-landing-page/PAGE_404-01_1.png" alt="">
                    </div>
                <?php } else { ?>
                    <div class="product_list">
                        <div class="row item-list">
                            <?php foreach ($read_prd as $items => $values) {
                                $data = total($values['price'], $values['giam_gia']);
                            ?>
                                <div class="col-lg-2 col-md-3 col-sm-6 product-item item-child animate__animated" id="product-item">
                                    <div class="single_product_item">
                                        <div class="single_product_item_thumb">
                                            <a href="shop?req=detail&id=<?= $values['id_prd'] ?>">
                                                <img style="width: 100% !important; height: 250px !important " src="assets/uploads/admin/products/<?= $values['image'] ?>" alt="#" class="img-fluid rounded">
                                            </a>
                                        </div>
                                        <h3 style="font-size: 20px;">
                                            <a href="shop?req=detail&id=<?= $values['id_prd'] ?>">
                                                <span class="d-block text-truncate" style="max-width: 100%;">
                                                    <?= $values['name_prd'] ?>
                                                </span>
                                            </a>
                                        </h3>
                                        <div class="d-flex mt-3 mb-3 <?= $values['giam_gia'] == 0 ? "invisible" : "" ?>">
                                            <del><?= number_format($values['price'], 0, '', ',');  ?>₫</del>&emsp;
                                            <span class="text-danger">Discount ( <?= $values['giam_gia'] ?>% )</span>
                                        </div>
                                        <div class="fw-bold d-flex justify-content-between align-items-center">
                                            <p>Price: <?= number_format($data, 0, '', ','); ?>₫</p>
                                            <?php if ($values['so_luong'] > 0) {
                                                echo '<small class="text-success"><i class="fa-solid fa-check"></i>&nbsp;Stock</small>';
                                            } else {
                                                echo '<small class="text-secondary"><i class="fa-solid fa-phone"></i>&nbsp;Contact</small>';
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="load_more_btn text-center d-flex justify-content-center align-items-center">
                            <a href="#" class="btn btn-outline-secondary w-25" id="loadMore">Xem thêm</a>
                            <a href="#" class="btn btn-outline-secondary w-25 d-none" id="loadLess">Rút gọn</a>
                        </div>
                    </div>
                    <div class="paginationn">
                        <?php select_page($current_page,$total_page); ?>
                    </div>
                <?php } ?>
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
                    <h2>Get promotions!</h2>
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
<script>
    const lenght = 5;
    load_more(".product-item", "#loadMore", "#loadLess", lenght);
    load_less_scroll(".product-item", "#loadLess", "#loadMore", lenght, 440);
    const cate = new URLSearchParams(window.location.search).get('cate');
    if (cate) {
        if (cate == 'laptop') {
            $('#laptop').addClass('fw-bold');
        } else if (cate == 'mobile') {
            $('#mobile').addClass('fw-bold');
        } else if (cate == 'tablet') {
            $('#tablet').addClass('fw-bold');
        } else if (cate == 'headphones') {
            $('#headphones').addClass('fw-bold');
        }
    }
    const sort = new URLSearchParams(window.location.search).get('sort');
    if (sort) {
        if (sort == 'price_desc') {
            $('#price_desc').addClass('fw-bold');
        } else if (sort == 'price_asc') {
            $('#price_asc').addClass('fw-bold');
        } else if (sort == 'name_desc') {
            $('#name_desc').addClass('fw-bold');
        } else if (sort == 'name_asc') {
            $('#name_asc').addClass('fw-bold');
        } else if (sort == 'special') {
            $('#special').addClass('fw-bold');
        } else if (sort == 'normal') {
            $('#normal').addClass('fw-bold');
        }
    }
</script>
<style>
    
</style>