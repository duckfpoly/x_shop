<section class="trending_items pt-5">
    <div class="container">
        <div class="row">
            <form action="search" method="post">
                <div class="search" style="border-radius: 20px; margin: 0px auto;">
                    <input type="text" name="key" id="" placeholder="Search ..." class="search__input " style="border: none" value="<?= isset($key) == true ? $key : "" ?>">
                    <button type="submit" style="border-radius: 20px;" class="search__button" tabIndex="-1">Search</button>
                </div>
            </form>
        </div>
        <div class="row" style="margin-top: 100px">
            <?php if(isset($search)){ if ($search != null) { foreach ($search as $items => $values) { ?>
                <div class="col-lg-3 col-sm-6" data-aos="fade-up">
                    <div class="single_product_item">
                        <div class="single_product_item_thumb">
                            <a href="?v=product_detail&id=<?= $values['id_prd'] ?>">
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
                            <del>$<?= number_format($values['price'], 0, '', ',');  ?></del>&emsp;
                            <span class="text-danger">Discount ( <?= $values['giam_gia'] ?>% )</span>
                        </div>
                        <div class="fw-bold d-flex justify-content-between align-items-center">
                            <p>Price: $<?= number_format(total($values['price'], $values['giam_gia']), 0, '', ','); ?></p>
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
            <?php } } else { echo '<div><img src="https://shop-media.vgsshop.vn/pub/media/khoa-banner-landing-page/PAGE_404-01_1.png" alt=""></div>'; } } ?>
        </div>
    </div>
</section>
<style>
    .search {
        position: relative;
        display: flex;
        flex-wrap: wrap;
        max-width: 620px;
        width: 100%;
        border: 1px solid #ddd;
        overflow: hidden;
        transition: 0.3s;
        height: 60px;
    }

    .search>* {
        border: none;
        outline: none;
    }

    .search__input {
        padding: 0 15px;
        height: 100%;
        width: calc(100% - 120px);
        font-size: 18px;
        box-sizing: border-box;
    }

    .search__input:not(:placeholder-shown)+.search__button {
        transform: translateY(0px);
    }

    .search__input:placeholder-shown+.search__button {
        transform: translateY(60px);
    }

    .search__button {
        background: #333;
        color: #feffd4;
        font-size: 15px;
        cursor: pointer;
        width: 100px;
        height: calc(100% - 20px);
        transition: 0.3s;
        position: absolute;
        right: 10px;
        top: 10px;
    }

    .search:focus-within {
        transform: translateY(-4px);
        border-color: #bbb;
        box-shadow: 4px 4px 0 #ddd, 8px 8px 0 #fcff88;
    }
</style>