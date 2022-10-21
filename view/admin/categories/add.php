<form method="post" id="form_1">
    <div class="d-flex justify-content-center">
        <div class="col-6">
            <div class="form-group mb-3">
                <label for="name_cate" class="form-label">Tên danh mục</label>
                <input type="text" name="name" id="name_cate" class="form-control">
                <div class="form-message text-danger mt-2"></div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-around">
        <div class="col-3">
            <button class="btn btn-outline-success" name="add_cate" type="submit">Submit</button>
            <input type="button" onclick="document.getElementById('from').reset()" value="Reset" id="reset_form" class="btn btn-outline-info">
            <input type="button" onclick="location.href='?module=categories'" value="List" class="btn btn-outline-primary">
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