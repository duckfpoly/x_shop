<div class="pd-wrap">
    <div class="container">
        <div class="heading-section">
            <h2>Chi tiết sản phẩm</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div id="slider" class="owl-carousel product-slider">
                    <div class="item">
                        <img src="assets/uploads/admin/products/<?= $detail['image'] ?>" />
                    </div>
                    <div class="item">
                        <img src="assets/uploads/admin/products/<?= $detail['image'] ?>" />
                    </div>
                    <div class="item">
                        <img src="assets/uploads/admin/products/<?= $detail['image'] ?>" />
                    </div>
                    <div class="item">
                        <img src="assets/uploads/admin/products/<?= $detail['image'] ?>" />
                    </div>
                    <div class="item">
                        <img src="assets/uploads/admin/products/<?= $detail['image'] ?>" />
                    </div>
                    <div class="item">
                        <img src="assets/uploads/admin/products/<?= $detail['image'] ?>" />
                    </div>
                    <div class="item">
                        <img src="assets/uploads/admin/products/<?= $detail['image'] ?>" />
                    </div>
                </div>
                <div id="thumb" class="owl-carousel product-thumb">
                    <div class="item">
                        <img src="assets/uploads/admin/products/<?= $detail['image'] ?>" />
                    </div>
                    <div class="item">
                        <img src="assets/uploads/admin/products/<?= $detail['image'] ?>" />
                    </div>
                    <div class="item">
                        <img src="assets/uploads/admin/products/<?= $detail['image'] ?>" />
                    </div>
                    <div class="item">
                        <img src="assets/uploads/admin/products/<?= $detail['image'] ?>" />
                    </div>
                    <div class="item">
                        <img src="assets/uploads/admin/products/<?= $detail['image'] ?>" />
                    </div>
                    <div class="item">
                        <img src="assets/uploads/admin/products/<?= $detail['image'] ?>" />
                    </div>
                    <div class="item">
                        <img src="assets/uploads/admin/products/<?= $detail['image'] ?>" />
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-dtl">
                    <div class="product-info">
                        <div class="product-name mb-3"><?= strtoupper($detail['name_prd']) ?></div>
                        <small>
                            Mã sản phẩm : <?= $detail['id_prd'] ?>
                            <!-- &nbsp;|&nbsp; -->
                            <!-- Đánh giá: <?= $count ?> -->
                            &nbsp;|&nbsp;
                            Số lượt xem: <?= $detail['so_luot_xem'] ?>
                            &nbsp;|&nbsp;
                            Tình trạng: <?= $detail['so_luong'] == 0 ? "<small class='fw-bold text-primary'><i class='fa-solid fa-phone'></i> Liên hệ</small>" : "<small class='fw-bold text-success'>Còn hàng <i class='fa-solid fa-check'></i></small>" ?>
                        </small>
                        <div class="reviews-counter mt-3 mb-2 d-none">
                            <div class="rate">
                                <input type="radio"id="star5" name="rate" value="5" checked />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio"id="star4" name="rate" value="4" checked />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio"id="star3" name="rate" value="3" checked />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio"id="star2" name="rate" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio"id="star1" name="rate" value="1" />
                                <label for="star1" title="text">1 star</label>
                            </div>
                            <span>3 Reviews</span>
                        </div>
                        <div class="product-price-discount">
                            <h3><?= number_format($data, 0, '', ',');  ?> VND</h3>
                            <?php if($detail['giam_gia'] == 0 ) { ?>
                            <?php } else { ?>
                                <span class="line-through"><?= number_format($detail['price'], 0, '', ',');  ?> VND</span>
                                <small>Tiết kiệm: (<?= $detail['giam_gia'] ?>%)</small>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="text-danger"><i class="fa-solid fa-gift"></i> Quà tặng ưu đãi kèm theo</h5>
                        </div>
                        <div class="card-body">
                            + <span>Miễn phí giao hàng toàn quốc</span>
                        </div>
                    </div>
                    <?php if ($detail['so_luong'] > 0) { ?>
                        <div class="product-count">
                            <label for="size" class="mb-3">Số lượng</label>
                            <form onsubmit="return false">
                                <input type="hidden" name="id_prd" class="id_prd" id="id_prd" value="<?= $detail['id_prd'] ?>">
                                <input type="hidden" name="name_prd" class="content-product-h3" id="name_prd" value="<?= $detail['name_prd'] ?>">
                                <input type="hidden" name="price_prd" class="price" id="price_prd" value="<?= $data ?>">
                                <input type="hidden" name="image_prd" class="img-prd" id="image_prd" value="<?= $detail['image'] ?>">
                                <div>
                                    <input class="numberstyle quantity_prd" type="number" min="1" step="1" value="1" name="quantity_prd" id="quantity_prd">
                                    <button type="button" name="addcart" id="addcart" value="addcart" class="round-black-btn mt-5 addcart">Thêm vào giỏ hàng</button>
                                    <button type="button" class="round-black-btn mt-5">Mua trả góp</button>
                                </div>
                            </form>
                        </div>
                        <div class="mt-3">
                            <form onsubmit="return false">
                                <input type="hidden" name="id_prd" class="id_prd" id="id_prd" value="<?= $detail['id_prd'] ?>">
                                <input type="hidden" name="name_prd" class="content-product-h3" id="name_prd" value="<?= $detail['name_prd'] ?>">
                                <input type="hidden" name="price_prd" class="price" id="price_prd" value="<?= $data ?>">
                                <input type="hidden" name="image_prd" class="img-prd" id="image_prd" value="<?= $detail['image'] ?>">
                                <button type="button" id="buy_now" class="btn btn-danger w-100">ĐẶT MUA NGAY<br> <small>Giao hàng tận nơi, nhanh chóng</small></button>
                            </form>
                        </div>
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
        <div class="product-info-tabs">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Mô tả</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Đánh giá ( <span id="count_cmt"><?= $count ?></span> )</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
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
                        <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. -->
                    </div>
                </div>
                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="comments-area w-100" style="border: none; margin-top:0px">
                        <div>
                            <div class="comment-listt" id="cmt_list"></div>
                            <?php if (empty($list_cmt)) {
                                echo ' <div class="comment-list fw-bold" id="no_review">Chưa có đánh giá về sản phẩm !</div> ';
                            } else {
                                foreach ($list_cmt as $cmt) { ?>
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
                            <?php }
                            } ?>
                            <div class="text-center mb-4">
                                <a href="#" class="btn animate__animated animate__fadeInUp" id="loadMore">Load More</a>
                                <a href="#" class="btn d-none animate__animated animate__fadeInUp" id="loadLess">Load Less</a>
                            </div>
                        </div>
                        <div class="review-heading mb-3">Đánh giá của bạn</div>
                        <form class="review-form" onsubmit="return false">
                            <div class="form-group mb-3">
                                <!-- <label>Rating</label> -->
                                <div class="reviews-counter">
                                    <div class="rate">
                                        <input type="radio" id="star5" name="rate" value="5" />
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1" title="text">1 star</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- <label class="mb-2">Đ</label> -->
                                <textarea cols="10" rows="5" class="form-control mb-3" name="comment" id="comment"></textarea>
                            </div>
                            <?php if (empty(Session::get('ID'))) { ?>
                                <input type="hidden" value="user.png" name="image" id="image">
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Name*">
                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <input type="hidden" value="<?= Session::get('name') ?>" name="name" id="name">
                                <input type="hidden" value="<?= Session::get('image') ?>" name="image" id="image">
                            <?php } ?>
                            <button class="round-black-btn" onclick="save()" id="send_cmt" name="send_cmt" type="submit" value="Send">Submit Review</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
