<form method="post" id="form_prd" enctype="multipart/form-data">
    <div class="row d-flex flex-wrap">
        <div class="col-4">
            <div class="form-group mb-3">
                <label for="" class="form-label">Giảm giá (%)</label>
                <input type="text" name="giam_gia" id="giam_gia" class="form-control" value="0">
                <div class="form-message text-danger mt-2"></div>
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Loại đặc biệt ?</label>
                <div class="form-control">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" id="special" class="form-check-input" name="special" value="1"> Đặc biệt
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" id="special" class="form-check-input" name="special" value="0" checked> Bình thường
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group mb-3">
                <label for="" class="form-label">Tên sản phẩm</label>
                <input type="text" name="name" id="name" class="form-control">
                <div class="form-message text-danger mt-2"></div>
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Ảnh sản phẩm</label>
                <input type="file" name="image" id="image" class="form-control">
                <div class="form-message text-danger mt-2"></div>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group mb-3">
                <label for="" class="form-label">Đơn giá</label>
                <input type="text" name="price" id="price" class="form-control">
                <div class="form-message text-danger mt-2"></div>
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Loại hàng</label>
                <select name="id_cate" id="id_cate" class="form-control">
                    <option value="" disabled selected>Select Category</option>
                    <?php foreach ($cate as $row => $values) { ?>
                        <option value="<?= $values['id_cate'] ?>"><?= $values['name_cate'] ?></option>
                    <?php } ?>
                </select>
                <div class="form-message text-danger mt-2"></div>
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Số lượng</label>
                <input type="text" name="quantity" id="quantity" class="form-control">
                <div class="form-message text-danger mt-2"></div>
            </div>
        </div>
        <div class="col-12">
            <label for="" class="form-label">Mô tả</label>
            <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
            <div class="form-message text-danger mt-2"></div>
        </div>
    </div>
    <div class="mt-5 mb-5">
        <input type="submit" name="add_product" value="Submit" class="btn btn-outline-success">
        <input type="button" onclick="document.getElementById('from').reset()" value="Reset" id="reset_form" class="btn btn-outline-info">
        <input type="button" onclick="location.href='?module=products'" value="List" class="btn btn-outline-primary">
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        Validator({
            form: '#form_prd',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#name', 'Vui lòng nhập tên sản phấm'),
                Validator.isRequired('#image', 'Vui lòng thêm ảnh sản phẩm'),
                Validator.isRequired('#price', 'Vui lòng nhập giá tiền'),
                Validator.isRequired('#id_cate', 'Vui lòng chọn danh mục'),
                Validator.isRequired('#quantity', 'Vui lòng nhập số lượng'),
            ],
        });
    });
</script>