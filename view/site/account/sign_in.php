<?php if (!empty(Session::get('ID'))) {
    echo '<script>window.location="?";</script>';
} else { ?>
    <!--================login_part Area =================-->
    <section class="login_part mt-5 ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>New to our Shop?</h2>
                            <p>There are advances being made in science and technology
                                everyday, and a good example of this is the</p>
                            <a href="?v=sign_up" class="btn_3">Create an Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3 class="mb-4">Welcome Back ! <br> Sign in now</h3>
                            <h5 class="text-danger text-center mb-4"><br><?= isset($user_login) ? $user_login : "" ?></h5>
                            <form class="row contact_form" id="form-1" method="post">
                                <div class="col-md-12 form-group mb-3">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                    <div class="form-message text-danger mt-2"><br></div>
                                </div>
                                <div class="col-md-12 form-group mb-3">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    <div class="form-message text-danger mt-2"><br></div>
                                </div>
                                <div class="col-md-12 form-group mb-4">
                                <div class="form-group mb-3">
                                    <input class="form-check-input" type="checkbox" name="save_user" value="save_user" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Ghi nhớ tài khoản
                                    </label>
                                </div>
                                    <button type="submit" name="sign_in" class="btn_3">Log in</button>
                                    <a class="lost_pass" href="#">forget password?</a>
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
                    Validator.isRequired('#username', 'Vui lòng nhập username'),
                    Validator.isRequired('#password', 'Vui lòng nhập passwword'),
                    Validator.minLength('#username', 1),
                    Validator.minLength('#password', 1)
                ]
            })
        })
    </script>
<?php } ?>