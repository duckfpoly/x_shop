<section class="breadcrumb_part mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <h2>User Profile - Update Password</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="changed_pass" class="col-lg-8 col-md-6 animate__animated animate__fadeInUp animate__fast" style="margin: 0px auto;">
    <form method="post" id="form_pass">
        <div class="form-group mb-3">
            <label for="" class="form-label">Mật khẩu cũ</label>
            <input type="password" class="form-control" name="old_password" id="old_password">
            <div class="form-message text-danger mt-1"><br></div>
        </div>
        <div class="form-group mb-3">
            <label for="" class="form-label">Mật khẩu mới</label>
            <input type="password" class="form-control" name="new_password" id="new_password">
            <div class="form-message text-danger mt-1"><br></div>
        </div>
        <div class="form-group mb-3">
            <label for="" class="form-label">Nhập lại mật khẩu mới</label>
            <input type="password" class="form-control" name="re_new_password" id="re_new_password">
            <div class="form-message text-danger mt-1"><br></div>
        </div>
        <div><h5 class="text-danger text-center mb-4"><br><?= isset($update) ? $update : "" ?></h5></div>
        <div class="form-group mb-3">
            <button class="btn btn-outline-success" name="update_pass_user" type="submit">Update</button>
            <a href="?v=profiles" class="btn btn-outline-danger" id="cancel">Cancel</a>
        </div>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Validator({
            form: '#form_pass',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#old_password', 'Vui lòng nhập passwword cũ'),
                Validator.isRequired('#new_password', 'Vui lòng nhập passwword mới'),
                Validator.isRequired('#re_new_password', 'Vui lòng nhập lại passwword'),
                Validator.minLength('#old_password', 6),
                Validator.minLength('#new_password', 6),
                Validator.minLength('#re_new_password', 6),
                Validator.isConfirmed('#re_new_password', function() {
                    return document.querySelector('#form_pass #new_password').value;
                }, 'Mật khẩu nhập lại không chính xác')
            ]
        })
    });
</script>