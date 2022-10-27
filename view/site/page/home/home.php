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
                                    <a href="shop" class="btn_1 ">shop now</a>
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
                                    <a href="shop" class="btn_1">shop now</a>
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
                                    <a href="shop" class="btn_1">shop now</a>
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
                            <a href="shop?req=detail&id=<?= $values['id_prd'] ?>">
                                <img style="width: 100% !important; height: 300px !important " src="assets/uploads/admin/products/<?= $values['image'] ?>" alt="#" class="img-fluid">
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
                            <a href="shop?req=detail&id=<?= $values['id_prd'] ?>">
                                <img style="width: 100% !important; height: 300px !important " src="assets/uploads/admin/products/<?= $values['image'] ?>" alt="#" class="img-fluid">
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

