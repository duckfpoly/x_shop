<form action="" method="post" id="form_1">
    <div class="d-flex justify-content-center">
        <div class="col-6">
            <div class="form-group mb-3">
                <label for="" class="form-label">ID</label>
                <input type="text" name="id_cate" readonly class="form-control" placeholder="Auto" value="<?= $read_one['id_cate'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Tên danh mục</label>
                <input type="text" name="name" id="name_cate" class="form-control" value="<?= $read_one['name_cate'] ?>">
                <div class="form-message text-danger mt-2"></div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-around">
        <div class="col-3">
            <input type="submit" name="update" value="Submit" class="btn btn-outline-success">
            <input type="button" onclick="document.getElementById('from').reset()" value="Reset" id="reset_form" class="btn btn-outline-info">
            <input type="button" onclick="location.href='?module=category'" value="List" class="btn btn-outline-primary">
        </div>
    </div>
</form>
<script>
     document.addEventListener('DOMContentLoaded', function() {
            Validator({
                form: '#form_1',
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',
                rules: [
                    Validator.isRequired('#name_cate', 'Vui lòng nhập tên danh mục')
                ],
            });
        });
</script>