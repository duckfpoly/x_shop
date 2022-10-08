<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <section class="banner_part">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <div class="banner_text">
                                <div class="banner_text_iner animate__animated animate__fadeInLeft animate__slow">
                                    <h1>WELCOME TO XSHOP</h1>
                                    <p>Vietnam flagship store</p>
                                    <a href="?v=shop" class="btn_1 ">shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner_img animate__animated animate__fadeInRight animate__slow">
                    <img src="assets/lapto.jpg" alt="#" class="img-fluid">
                </div>
            </section>
        </div>
        <div class="carousel-item">
            <section class="banner_part">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <div class="banner_text">
                                <div class="banner_text_iner animate__animated animate__fadeInLeft animate__slow">
                                    <h1>Best quality</h1>
                                    <p>Seamlessly empower fully researched
                                        growth strategies and interoperable internal</p>
                                    <a href="?v=shop" class="btn_1">shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner_img animate__animated animate__fadeInRight animate__slow">
                    <img src="assets/mobile.jpg" alt="#" class="img-fluid">
                </div>
            </section>
        </div>
        <div class="carousel-item">
            <section class="banner_part">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <div class="banner_text">
                                <div class="banner_text_iner animate__animated animate__fadeInLeft animate__slow">
                                    <h1>Best quality</h1>
                                    <p>Seamlessly empower fully researched
                                        growth strategies and interoperable internal</p>
                                    <a href="?v=shop" class="btn_1">shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner_img animate__animated animate__fadeInRight animate__slow">
                    <img src="assets/headphone.jpg" alt="#" class="img-fluid">
                </div>
            </section>
        </div>
    </div>
</div>
<!-- trending item start-->
<section class="trending_items">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Sản phẩm mới</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($read_prd as $items => $values) {
                $data = total($values['price'], $values['giam_gia']);
            ?>
                <div class="col-lg-3 col-sm-6" data-aos="fade-up">
                    <div class="single_product_item">
                        <div class="single_product_item_thumb">
                            <a href="?v=product_detail&id=<?= $values['id_prd'] ?>">
                                <img style="width: 100% !important; height: 300px !important " src="assets/uploads/admin/products/<?= $values['image'] ?>" alt="#" class="img-fluid">
                            </a>
                        </div>
                        <h3 style="font-size: 20px;"> <a href="?v=product_detail&id=<?= $values['id_prd'] ?>"><?= $values['name_prd'] ?></a> </h3>
                        <div class="d-flex mt-3 mb-3 <?= $values['giam_gia'] == 0 ? "invisible" : "" ?>">
                            <del><?= number_format($values['price'], 0, '', ',');  ?>₫</del>&emsp;
                            <span class="text-danger">Tiết kiệm ( <?= $values['giam_gia'] ?>% )</span>
                        </div>
                        <div class="fw-bold d-flex justify-content-between align-items-center">
                            <p><?= number_format($data, 0, '', ','); ?>₫</p>
                            <?php if ($values['so_luong'] > 0) {
                                echo '
                                <small class="text-success"><i class="fa-solid fa-check"></i>&nbsp;còn hàng</small>
                            ';
                            } else {
                                echo '
                                <small class="text-secondary"><i class="fa-solid fa-phone"></i>&nbsp;liên hệ</small>
                            ';
                            } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- trending item end-->

<section class="trending_items">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Top 8 sản phẩm được xem nhiều nhất</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($top_view as $items => $values) {
                $data = total($values['price'], $values['giam_gia']);
            ?>
                <div class="col-lg-3 col-sm-6" data-aos="zoom-up">
                    <div class="single_product_item">
                        <div class="single_product_item_thumb">
                            <a href="?v=product_detail&id=<?= $values['id_prd'] ?>">
                                <img style="width: 100% !important; height: 300px !important " src="assets/uploads/admin/products/<?= $values['image'] ?>" alt="#" class="img-fluid">
                            </a>
                        </div>
                        <h3 style="font-size: 20px;"> <a href="?v=product_detail"><?= $values['name_prd'] ?></a> </h3>
                        <div class="d-flex mt-3 mb-3 <?= $values['giam_gia'] == 0 ? "invisible" : "" ?>">
                            <del><?= number_format($values['price'], 0, '', ',');  ?>₫</del>&emsp;
                            <span class="text-danger">Tiết kiệm ( <?= $values['giam_gia'] ?>% )</span>
                        </div>
                        <div class="fw-bold d-flex justify-content-between align-items-center">
                            <p><?= number_format($data, 0, '', ','); ?>₫</p>
                            <?php if ($values['so_luong'] > 0) {
                                echo '
                                <small class="text-success"><i class="fa-solid fa-check"></i>&nbsp;Còn hàng</small>
                            ';
                            } else {
                                echo '
                                <small class="text-secondary"><i class="fa-solid fa-phone"></i>&nbsp;Liên hệ</small>
                            ';
                            } ?>

                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</section>

<!-- product list start-->
<section class="single_product_list">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single_product_iner">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-6 col-sm-6" data-aos="fade-up">
                            <div class="single_product_img">
                                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="assets/lapto.jpg" class="img-fluid rounded" style="width: 600px ;height: 450px;" alt="#">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="assets/headphone.jpg" class="img-fluid rounded" style="width: 600px ;height: 450px;" alt="#">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="assets/mobile.jpg" class="img-fluid rounded" style="width: 600px ;height: 450px;" alt="#">
                                        </div>
                                    </div>
                                </div>
                                <img src="img/product_overlay.png" alt="#" class="product_overlay img-fluid">
                            </div>
                        </div>
                        <div class="col-lg-5 col-sm-6" data-aos="fade-up">
                            <div class="single_product_content">
                                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active ">
                                            <h5>Best quality</h5>
                                            <h2> <a href="?v=shop">Seamlessly empower fully researched
                                                growth strategies and interoperable internal</a> </h2>
                                        </div>
                                        <div class="carousel-item">
                                            <h5>Best quality</h5>
                                            <h2> <a href="?v=shop">Seamlessly empower fully researched
                                            growth strategies and interoperable internal</a> </h2>
                                        </div>
                                        <div class="carousel-item">
                                            <h5>Best quality</h5>
                                            <h2> <a href="?v=shop">Seamlessly empower fully researched
                                            growth strategies and interoperable internal</a> </h2>
                                        </div>
                                    </div>
                                </div>
                                <a href="?v=blog" class="btn_3">Explore Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product list end-->

<!-- feature part here -->
<section class="feature_part section_padding">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-6 ">
                <div class="feature_part_tittle">
                    <h3>Credibly innovate granular
                        internal or organic sources
                        whereas standards.</h3>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="feature_part_content">
                    <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic”
                        sources. Credibly innovate granular internal or “organic” sources whereas high standards in
                        web-readiness.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-sm-6" data-aos="zoom-in">
                <div class="single_feature_part">
                    <img src="img/icon/feature_icon_1.svg" alt="#">
                    <h4>Credit Card Support</h4>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6" data-aos="zoom-in">
                <div class="single_feature_part">
                    <img src="img/icon/feature_icon_2.svg" alt="#">
                    <h4>Online Order</h4>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6" data-aos="zoom-in">
                <div class="single_feature_part">
                    <img src="img/icon/feature_icon_3.svg" alt="#">
                    <h4>Free Delivery</h4>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6" data-aos="zoom-in">
                <div class="single_feature_part">
                    <img src="img/icon/feature_icon_4.svg" alt="#">
                    <h4>Product with Gift</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- feature part end -->

<!-- subscribe part here -->
<section class="subscribe_part section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="subscribe_part_content">
                    <h2>Get promotions & updates!</h2>
                    <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic”
                        sources credibly innovate granular internal .</p>
                    <div class="subscribe_form">
                        <input type="email" placeholder="Enter your mail">
                        <a href="#" class="btn_1">Subscribe</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- subscribe part end -->