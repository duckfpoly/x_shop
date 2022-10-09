    <div id="detail" class="row d-flex flex-wrap">
        <div class="col-4">
            <img class="rounded" width="100%" src="assets/uploads/admin/products/<?= $detail['image'] ?>" alt="">
        </div>
        <div class="col-4">
            <div class="form-group mb-3">
                <label for="" class="form-label">Name</label>
                <div class="form-control">
                    <?= $detail['name_prd'] ?>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Price</label>
                <div class="form-control">
                    <?= number_format($detail['price'], 0, '', ',') ?>&nbsp;VNĐ
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Discount</label>
                <div class="form-control">
                    <?= number_format($detail['giam_gia'], 0, '', ',') ?>&nbsp;%
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Subtotal</label>
                <?php $total = total($detail['price'], $detail['giam_gia']) ?>
                <div class="form-control">
                    <?= number_format($total, 0, '', ',') ?>&nbsp;VNĐ
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Description</label>
                <div class="form-control">
                    <?= $detail['description'] ?>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group mb-3">
                <label for="" class="form-label">Date</label>
                <div class="form-control ">
                    <?= $detail['ngay_nhap'] ?>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">ESPECIALLY ?</label>
                <div class="col-7 d-flex form-control">
                    <div class="form-check form-switch" style="margin-right: 30px;">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDisabled" disabled <?= $detail['dac_biet'] == 1 ? 'checked' : '' ?>>
                        <label class="form-check-label" for="flexSwitchCheckDisabled">Especially</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDisabled" disabled <?= $detail['dac_biet'] == 0 ? 'checked' : '' ?>>
                        <label class="form-check-label" for="flexSwitchCheckDisabled">Normal</label>
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">View</label>
                <div class="form-control">
                    <?= $detail['so_luot_xem'] ?>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Product Type</label>
                <div class="form-control">
                    <?= $detail['name_cate'] ?>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="form-label">Quantity</label>
                <div class="form-control">
                    <?= $detail['so_luong'] ?>
                </div>
            </div>
        </div>
    </div>