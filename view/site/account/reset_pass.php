<section class="login_part" style="margin-top: 100px;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <h3 class="mb-4">The X Store ! <br> Reset password </h3>
                        <h5 class="text-danger text-center mb-4"><br><?= isset($user_login) ? $user_login : "" ?></h5>
                        <form class="row contact_form" id="form-1" method="post">
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
                            <div class="col-md-12 form-group mb-4">
                                <button type="submit" name="reset_pass" id="reset_pass" class="btn_3">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .form-group.invalid .form-control {
        border-color: #f33a58;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Validator({
            form: '#form-1',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#new_password', 'Vui lòng nhập passwword mới'),
                Validator.isRequired('#re_new_password', 'Vui lòng nhập lại passwword'),
                Validator.minLength('#new_password', 6),
                Validator.minLength('#re_new_password', 6),
                Validator.isConfirmed('#re_new_password', function() {
                    return document.querySelector('#form-1 #new_password').value;
                }, 'Mật khẩu nhập lại không chính xác')
            ]
        })
    });
</script>