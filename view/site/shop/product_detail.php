<section class="breadcrumb_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <h2>Chi tiết sản phẩm</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container ">
    <div class="mt-3 mb-3 card-header rounded bg-transparent">
        <h3 class="fw-bold"><?= strtoupper($detail['name_prd']) ?></h3>
    </div>
    <div class="d-flex justify-content-between mb-5 flex-wrap">
        <div class="col-lg-6 col-sm-12">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="margin: 0px auto !important;">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block" style="width: 100vw !important; border-radius:20px" height="530px" src="assets/uploads/admin/products/<?= $detail['image'] ?>" alt="Image Product">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block" style="width: 100vw !important; border-radius:20px" height="530px" src="assets/uploads/admin/products/<?= $detail['image'] ?>" alt="Image Product">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block" style="width: 100vw !important; border-radius:20px" height="530px" src="assets/uploads/admin/products/<?= $detail['image'] ?>" alt="Image Product">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-lg-5 col-sm-12 mt-3">
            <div class="info">
                <small>
                    Mã sản phẩm : <?= $detail['id_prd'] ?>
                    &nbsp;|&nbsp;
                    Bình luận: <?= $count ?>
                    &nbsp;|&nbsp;
                    Số lượt xem: <?= $detail['so_luot_xem'] ?>
                    &nbsp;|&nbsp;
                    Tình trạng: <?= $detail['so_luong'] == 0 ? "<small class='fw-bold text-primary'><i class='fa-solid fa-phone'></i> Liên hệ</small>" : "<small class='fw-bold text-success'>Còn hàng <i class='fa-solid fa-check'></i></small>" ?>
                </small>
                <div class="mt-3 mb-3">
                    <h4 class="mb-4">Thông tin sản phẩm</h4>
                    <ul class="mb-3">
                        <li class="text-danger"><?= $detail['dac_biet'] == 1 ? "HÀNG ĐẶC BIỆT" : "" ?></li>
                        <li> </li>
                    </ul>
                    <div class="border p-2 rounded mb-3">
                        <small class="<?= $detail['giam_gia'] == 0 ? "invisible" : "" ?>">
                            <del>Giá gốc:&nbsp;<?= number_format($detail['price'], 0, '', ',');  ?>₫</del>&nbsp;
                            <span class="text-dark fw-bold">(Tiết kiệm: <?= $detail['giam_gia'] ?>%)</span>
                        </small>
                        <h5 class="card-text mt-4 mb-3 fw-bold text-danger">
                            <?php if ($detail['giam_gia'] == 0) {
                                echo " Giá: " . number_format("$data", 0, '', ',') . "₫</h5> ";
                            } else {
                                echo " Giá khuyến mại: " . number_format("$data", 0, '', ',') . "₫</h5> ";
                            } ?>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-danger"><i class="fa-solid fa-gift"></i> Quà tặng ưu đãi kèm theo</h5>
                        </div>
                        <div class="card-body">
                            + <span>Miễn phí giao hàng toàn quốc</span>
                        </div>
                    </div>
                </div>
                <?php if ($detail['so_luong'] > 0) { ?>
                    <div>
                        <label class="mb-2">Số lượng:</label>&emsp;
                        <form onsubmit="return false">
                            
                            <input type="hidden" name="id_prd"      class="id_prd"              id="id_prd"       value="<?= $detail['id_prd'] ?>">
                            <input type="hidden" name="name_prd"    class="content-product-h3"  id="name_prd"     value="<?= $detail['name_prd'] ?>">
                            <input type="hidden" name="price_prd"   class="price"               id="price_prd"    value="<?= $data ?>">
                            <input type="hidden" name="image_prd"   class="img-prd"             id="image_prd"    value="<?= $detail['image'] ?>">

                            <div class="d-flex align-items-center mb-3" >
                                <input type="number" name="quantity_prd" id="quantity_prd" min="1" value="1" class="form-control w-25 quantity_prd">&emsp;
                                <!-- <button type="submit" onclick="add_cart()" name="addcart" id="addcart" value="addcart" class="btn btn-success">Thêm vào giỏ hàng</button>&emsp; -->
                                <button type="button" name="addcart" id="addcart" value="addcart" class="btn btn-success addcart">Thêm vào giỏ hàng</button>&emsp;
                                <button id="heart" class="btn border border-danger p-1 rounded text-danger"><i class="fa-solid fa-heart"></i></button>
                            </div>
                        </div>
                        <div>
                            <button type="button" id="buy_now" class="btn btn-danger w-100">ĐẶT MUA NGAY<br> <small>Giao hàng tận nơi, nhanh chóng</small></button>
                        </div>
                    </form>
                <?php } else { ?>
                    <div class="border border-danger rounded p-3">
                        <h5>Đăng ký nhận thông tin khi có hàng</h5>
                        <form method="post">
                            <input type="text" name="name" class="form-control mb-3 mt-3" placeholder="Họ tên (bắt buộc)" required>
                            <input type="text" name="phone" class="form-control mb-3" placeholder="Số điện thoại (bắt buộc)" required>
                            <input type="email" name="email" class="form-control mb-3" placeholder="Email">
                            <button class="btn btn-danger">Đăng ký nhận thông tin</button>
                        </form>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="card border-none ">
        <div class="card-header bg-light text-center">
            <h4>Thông tin sản phẩm</h4>
        </div>
        <div class="card-body overflow-hidden" style="max-height: 200px;">
            <span class="d-inline-block text-truncate m-3" style="max-width: 150px;">
                <?= nl2br(nl2br($detail['description'])) ?>
            </span> 
        </div>
        <div class="card-footer text-center bg-transparent">
            <button id="desc" class="btn btn-outline-secondary w-50">Xem thêm</button>
        </div>
        <div class="d-flex justify-content-center align-items-center">
        <div id="box_modal_update" class="border bg-white mt-5" style="border-radius:20px">
            <div class="card">
                <div class="card-header sticky-top bg-light d-flex justify-content-between align-items-center">
                    <div class="mt-2">
                        <h4 class="fw-bold">Mô tả sản phẩm</h4>
                    </div>
                    <div>
                        <span id="close_box_update" class="btn btn-outline-danger">X</span>
                    </div>
                </div>
                <div class="card-body ">
                    <?= nl2br(nl2br($detail['description'])) ?>
                </div>
            </div>
        </div>
</div>
    </div>
</div>
<div class=" container comments-area w-100" style="border: none;">
    <h4><span id="count_cmt"><?= $count ?></span> Review for <?= $detail['name_prd'] ?></h4>
    <div>
        <div class="comment-listt" id="cmt_list">
            
        </div>
        <?php if (empty($list_cmt)) {
            echo ' <div class="comment-list fw-bold" id="no_review">No review !</div> ';
        } else { foreach ($list_cmt as $cmt) { ?>
            <div class="comment-list">
                <div class="single-comment">
                    <div class="user d-flex w-100">
                        <div class="thumb">
                            <img src="assets/uploads/admin/user/<?= $cmt['image_client'] ?>" alt="">
                        </div>
                        <div class="desc">
                            <p class="comment"> <?= isset($alert) ? $alert : $cmt['content'] ?> </p>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <h5>
                                        <?= $cmt['name_client'] ?>
                                    </h5>
                                    <p class="date"><?= $cmt['time'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } } ?>
        <div class="text-center mb-4">
            <a href="#" class="btn animate__animated animate__fadeInUp" id="loadMore">Load More</a>
            <a href="#" class="btn d-none animate__animated animate__fadeInUp" id="loadLess">Load Less</a>
        </div>
    </div>
    <?php if (empty(Session::get('ID'))) { ?>
        <div>
            <h4>Comment</h4>
            <form class="w-100 " onsubmit="return false">
                <input type="hidden" value="user.png"   name="image" id="image">
                <input type="text" class="form-control mb-3" name="name" id="name" placeholder="Họ tên ">
                <textarea cols="10" rows="5" class="form-control mb-3" name="comment" id="comment" type="text" placeholder="Viết bình luận "></textarea>
                <input class="btn btn-outline-primary w-25" onclick="save()" id="send_cmt" name="send_cmt" type="submit" value="Send">
            </form>
        </div>
    <?php } else { ?>
        <div>
            <h4>Comment</h4>
            <form class="form-contact comment_form w-100 d-flex" id="commentForm" onsubmit="return false">
                <input type="hidden" value="<?= Session::get('name') ?>"    name="name" id="name">
                <input type="hidden" value="<?= Session::get('image') ?>"   name="image" id="image">
                <input type="hidden" value="<?= Session::get('id') ?>"      name="id" id="id">
                <img src="assets/uploads/admin/user/<?= Session::get('image') ?>" alt="" width="50px" style="border-radius: 50%; margin-right:20px;">
                <input class="form-control border border-dark" name="comment" id="comment" type="text" placeholder="Viết bình luận ">
                <input class="btn btn-outline-secondary" onclick="save()" id="send_cmt" name="send_cmt" style="margin-left: 20px;" type="submit" value="Send">
            </form>
        </div>
    <?php } ?>
</div>
<section class="trending_items">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Sản phẩm liên quan</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($list_with_cate as $items => $values) {
                $data = total($values['price'], $values['giam_gia']); ?>
                <div class="col-lg-3 col-sm-6 prd_same" data-aos="zoom-in">
                    <div class="single_product_item">
                        <div class="single_product_item_thumb">
                            <a href="shop?req=detail&id=<?= $values['id_prd'] ?>">
                                <img style="width: 100% !important; height: 300px !important; " src="assets/uploads/admin/products/<?= $values['image'] ?>" alt="#" class="img-fluid rounded">
                            </a>
                        </div>
                        <h3 style="font-size: 20px;"> <a href="shop?req=detail&id=<?= $values['id_prd'] ?>"><?= $values['name_prd'] ?></a> </h3>
                        <div class="d-flex mt-3 mb-3 <?= $values['giam_gia'] == 0 ? "invisible" : "" ?>">
                            <del><?= number_format($values['price'], 0, '', ',');  ?>₫</del>&emsp;
                            <span class="text-danger">Discount ( <?= $values['giam_gia'] ?>% )</span>
                        </div>
                        <div class="fw-bold d-flex justify-content-between align-items-center">
                            <p>Price: <?= number_format($data, 0, '', ','); ?>₫</p>
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
            <div class="text-center">
                <a href="#" class="btn animate__animated animate__fadeInUp" id="loadMoreother">Load More</a>
                <a href="#" class="btn d-none animate__animated animate__fadeInUp" id="loadLessother">Load Less</a>
            </div>
        </div>
    </div>
</section>
<!-- feature part here -->
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

<script>
     // cmt
 load_more(".comment-list", "#loadMore", "#loadLess", 2);
 load_less(".comment-list", "#loadLess", "#loadMore", 2);

//  load_more(".comment-listt", "#loadMore", "#loadLess", 2);
//  load_less(".comment-listt", "#loadLess", "#loadMore", 2);

 // product the same
 load_more(".prd_same", "#loadMoreother", "#loadLessother", 4);
 load_less(".prd_same", "#loadLessother", "#loadMoreother", 4);
</script>
