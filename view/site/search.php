<section class="trending_items pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_tittle text-center" data-aos="zoom-in">
                    <h2>Từ khóa tìm kiếm : <?= $key ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if($search != null) { foreach ($search as $items => $values) {
                $data = total($values['price'], $values['giam_gia']);
            ?>
                <div class="col-lg-3 col-sm-6" data-aos="fade-up">
                    <div class="single_product_item">
                        <div class="single_product_item_thumb">
                            <a href="?v=product_detail&id=<?= $values['id_prd'] ?>">
                                <img style="width: 100% !important; height: 300px !important " src="assets/uploads/admin/products/<?= $values['image'] ?>" alt="#" class="img-fluid">
                            </a>
                        </div>
                        <h3 style="font-size: 20px;"> <a href="?v=product_detail"><?= $values['name_prd'] ?></a> </h3>
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
            <?php } } else { 
                echo '<script language="javascript">window.location="?v=not_found";</script>';
            } ?>
        </div>
    </div>
</section>