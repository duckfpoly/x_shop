<?php if (!empty(Session::get('ID'))) {
    echo '<script>window.location="home";</script>';
} else { ?>
    <section class="login_part" style="margin-top: 100px;">
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
                            <h3 class="mb-4">The X Store ! <br> Reset password </h3>
                            <h5 class="text-danger text-center mb-4"><br><?= isset($checkemail) ? $checkemail : "" ?></h5>
                            <form class="row contact_form" id="form-1" method="post">
                                <div class="col-md-12 form-group mb-3">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="example@gmail.com">
                                    <div class="form-message text-danger mt-2"><br></div>
                                </div>
                                <div class="col-md-12 form-group mb-4">
                                    <button type="submit" name="sign_in" class="btn_3">Reset Pass</button>
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

        .btn-google {
            color: white !important;
            background-color: #ea4335;
        }

        .btn-facebook {
            color: white !important;
            background-color: #3b5998;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Validator({
                form: '#form-1',
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',
                rules: [
                    Validator.isRequired('#email', 'Vui lòng nhập email'),
                    Validator.isEmail('#email'),
                ]
            })
        })
    </script>
<?php } ?>