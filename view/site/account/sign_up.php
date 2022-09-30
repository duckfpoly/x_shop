<!--================login_part Area =================-->
<section class="login_part  ">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="login_part_text text-center">
                    <div class="login_part_text_iner">
                        <h2>Do you already have an account ?</h2>
                        <p>Then just log in</p>
                        <a href="?v=sign_in" class="btn_3">Login</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <h3 class="mb-4 text-center">Welcome to X Store ! </h3>
                        <div class="text-danger text-center mb-4" style="width: 421px; height: 23px"><?= isset($create) ? $create : ""?></div>
                        <form method="post" id="form-1" enctype="multipart/form-data">
                            <div class="col-md-12 form-group mb-3">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                <div class="form-message text-danger mt-1"><br></div>
                            </div>
                            <div class="col-md-12 form-group mb-3">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                <div class="form-message text-danger mt-1"><br></div>
                            </div>
                            <div class="col-md-12 form-group mb-3">
                                <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Confirm Password">
                                <div class="form-message text-danger mt-1"><br></div>
                            </div>
                            <div class="col-md-12 form-group mb-3">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Full name">
                                <div class="form-message text-danger mt-1"><br></div>
                            </div>
                            <div class="col-md-12 form-group mb-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email ">
                                <div class="form-message text-danger mt-1"><br></div>
                            </div>
                            <div class="col-md-12 form-group mb-3">
                                <input type="file" class="form-control" id="image" name="image" placeholder="image">
                                <div class="form-message text-danger mt-1"><br></div>
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" name="register" class="btn_3">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================login_part end =================-->
<style>
    .form-group.invalid .form-control{
        border-color: #f33a58;
    }
    /* .form-group.invalid ::placeholder{
        color: #000;
    } */
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Validator({
            form: '#form-1',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#name', 'Vui lòng nhập đầy đủ họ tên'),
                Validator.isRequired('#email', 'Vui lòng nhập email'),
                Validator.isEmail('#email'),
                Validator.isRequired('#username', 'Vui lòng nhập username'),
                Validator.isRequired('#password', 'Vui lòng nhập passwword'),
                Validator.isRequired('#repassword', 'Vui lòng nhập lại passwword'),
                Validator.minLength('#username', 1),
                Validator.minLength('#password', 1),
                Validator.isConfirmed('#repassword', function() {
                    return document.querySelector('#form-1 #password').value;
                }, 'Mật khẩu nhập lại không chính xác')
            ]
        })
    });
</script>