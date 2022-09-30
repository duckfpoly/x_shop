<form action="" method="post" id="form" enctype="multipart/form-data">
    <div class="row d-flex flex-wrap">
        <div class="col-4">
            <div class="form-group mb-3">
                <label for="" class="form-label">Mã sản phẩm</label>
                <input type="text" name="id_product" id="id_product" class="form-control" readonly placeholder="Auto">
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Giảm giá</label>
                <input type="text" name="giam_gia" id="giam_gia" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Loại đặc biệt ?</label>
                <div class="form-control">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="special" value="1"> Đặc biệt
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="special" value="0" checked> Bình thường
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group mb-3">
                <label for="" class="form-label">Tên sản phẩm</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Ảnh sản phẩm</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Ngày nhập</label>
                <input type="date" name="date" id="date" class="form-control">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group mb-3">
                <label for="" class="form-label">Đơn giá</label>
                <input type="text" name="price" id="price" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Loại hàng</label>
                <select name="id_cate" id="" class="form-control">
                    <option value="" disabled selected>Select Category</option>
                    <?php foreach ($cate as $row => $values) { ?>
                        <option value="<?= $values['id_cate'] ?>"><?= $values['name_cate'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Số lượt xem</label>
                <input type="view_product" name="view_product" id="view_product" class="form-control">
            </div>
        </div>
        <div class="col-12">
            <label for="" class="form-label">Mô tả</label>
            <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
        </div>
    </div>
    <div class="mt-5 mb-5">
        <input type="submit" name="add_product" value="Submit" class="btn btn-outline-success">
        <input type="button" onclick="document.getElementById('from').reset()" value="Reset" id="reset_form" class="btn btn-outline-info">
        <input type="button" onclick="location.href='?module=products'" value="List" class="btn btn-outline-primary">
    </div>
</form>