<section class="breadcrumb_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <h2>Product Detail</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container p-lg-5 p-2">
    <div class="mt-3 mb-3 card-header rounded bg-transparent">
        <h3 class="fw-bold"><?= strtoupper($detail['name_prd'])?></h3>
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
                            <del>Giá gốc:&nbsp;$<?= number_format($detail['price'], 0, '', ',');  ?></del>&nbsp;
                            <span class="text-dark fw-bold">(Tiết kiệm: <?= $detail['giam_gia'] ?>%)</span>
                        </small>
                        <h5 class="card-text mt-4 mb-3 fw-bold text-danger">
                            <?php if ($detail['giam_gia'] == 0) {
                                echo " Giá: $" . number_format("$data", 0, '', ',') . "</h5> ";
                            } else {
                                echo " Giá khuyến mại: $" . number_format("$data", 0, '', ',') . "</h5> ";
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
                    <div class="d-flex align-items-center mb-3">
                        <label for="">Số lượng:</label>&emsp;
                        <input type="number" min="1" value="1" class="form-control w-25" id="">&emsp;
                        <button class="btn btn-success">Thêm vào giỏ hàng</button>&emsp;
                        <button id="heart" class="btn border border-danger p-1 rounded text-danger"><i class="fa-solid fa-heart"></i></button>
                    </div>
                    <div>
                        <button onclick="" class="btn btn-danger w-100">ĐẶT MUA NGAY<br> <small>Giao hàng tận nơi, nhanh chóng</small></button>
                    </div>
                <?php } else { ?>
                    <div class="border border-danger rounded p-3">
                        <h5>Đăng ký nhận thông tin khi có hàng</h5>
                        <form action="" method="post">
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
    <div class="card">
        <div class="card-header">
            <h4>Mô tả sản phẩm</h4>
        </div>
        <div class="card-body">
            <?= nl2br(nl2br($detail['description'])) ?>
        </div>
    </div>
</div>
<div class=" container comments-area w-100 p-lg-5" style="border: none;">
    <h4><?= $count ?> Review for <?= $detail['name_prd'] ?></h4>
    <div class="">
        <?php if (empty($list_cmt)) {
            echo '
            <div class="comment-list fw-bold">No review !</div>
        ';
        } else {
            foreach ($list_cmt as $cmt) { ?>
                <div class="comment-list">
                    <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                            <div class="thumb">
                                <img src="assets/uploads/admin/user/<?= $cmt['image'] ?>" alt="">
                            </div>
                            <div class="desc">
                                <p class="comment"> <?= isset($alert) ? $alert : $cmt['content'] ?> </p>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <h5>
                                            <a href="#"><?= $cmt['name'] ?></a>
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
        <div class="text-center d-flex">
            <a href="#" class="btn btn-secondary" id="loadMore">Load More</a>
        </div>
    </div>
    <?php if (empty(Session::get('ID'))) { ?>
        <h4>Bạn cần đăng nhập để thực hiện bình luận ! <a href="?v=signin">Đăng nhập ngay</a></h4>
    <?php } else { ?>
        <div>
            <h4>Comment</h4>
            <form class="form-contact comment_form w-75 d-flex" id="commentForm">
                <img src="assets/uploads/admin/user/<?= Session::get('image') ?>" alt="" width="50px" style="border-radius: 50%; margin-right:20px;">
                <input class="form-control border border-dark" name="cmt" id="cmt" type="text" placeholder="Viết bình luận ">
                <button class="btn btn-outline-secondary" style="margin-left: 20px;" type="submit">Send</button>
            </form>
        </div>
    <?php } ?>
</div>
<section class="trending_items">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Products in the same category</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($list_with_cate as $items => $values) { $data = total($values['price'], $values['giam_gia']); ?>
                <div class="col-lg-3 col-sm-6 prd_same <?= $_GET['id'] == $values['id_prd'] ? "d-none" : "" ?> " data-aos="zoom-in">
                    <div class="single_product_item">
                        <div class="single_product_item_thumb">
                            <a href="product_detail/<?= $values['id_prd'] ?>">
                                <img style="width: 100% !important; height: 300px !important; " src="assets/uploads/admin/products/<?= $values['image'] ?>" alt="#" class="img-fluid rounded">
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
        <div class="text-center">
            <a href="#" class="btn btn-outline-secondary" id="loadMore_other">Load More</a>
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
<!-- feature part end -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script>
<script>
    $(document).ready(function() {
        $(".comment-list").slice(0, 2).show();
        if ($(".comment-list").length <= 2) {
            $("#loadMore").text("End Content").addClass("d-none pe-none text-dark bg-transparent");
        } else {
            $("#loadMore").on("click", function(e) {
                e.preventDefault();
                $(".comment-list:hidden").slice(0, 2).slideDown();
                if ($(".comment-list:hidden").length == 0) {
                    $("#loadMore").text("End Content").addClass("noContent");
                }
            });
        }
    });
    $(document).ready(function() {
        $(".prd_same").slice(0, 4).show();
        if ($(".prd_same").length <= 4) {
            $("#loadMore_other").text("End Content").addClass("d-none pe-none text-dark bg-transparent");
        } else {
            $("#loadMore_other").on("click", function(e) {
                e.preventDefault();
                $(".prd_same:hidden").slice(0, 4).slideDown();
                if ($(".prd_same:hidden").length == 0) {
                    $("#loadMore_other").text("End Content").addClass("noContent");
                }
            });
        }
    });
</script>
<style>
    .comment-list, .prd_same {
        display: none;
    }
</style>