<?php
if (!empty(Session::get('ID'))) {
    header('Location: ?');
} else { ?>
<div class="container">
    <div class="alert alert-danger text-center" role="alert">
        <span class="text-danger fw-bold">Đăng ký thành viên</span>
    </div>
    <form method="post" id="form-1" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label for="" class="form-label">Tên đăng nhập</label>
            <input type="text" name="username" id="username" class="form-control form-input">
            <div class="form-message text-danger mt-1">
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="" class="form-label">Mật khẩu</label>
            <input type="password" name="password" id="password" class="form-control form-input">
            <div class="form-message text-danger mt-1">
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="" class="form-label">Xác nhận mật khẩu</label>
            <input type="password" name="confirm_pass" id="repassword" class="form-control form-input">
            <div class="form-message text-danger mt-1">
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="" class="form-label">Họ tên</label>
            <input type="text" name="name" class="form-control form-input" id="name">
            <div class="form-message text-danger mt-1">
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="" class="form-label">Email</label>
            <input type="text" name="email" class="form-control form-input" id="email">
            <div class="form-message text-danger mt-1">
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="" class="form-label">Ảnh</label>
            <input type="file" name="image" class="form-control" id="image">
        </div>
        <div class="form-group mb-3 text-center">
        <?php
            if(isset($create)){
                echo '<span style="color:red;">'.$create.'</span>';
            }
        ?>
        </div>
        <div class="form-group mb-5 text-center">
            <button name="signup" id="signup" type="submit" class="btn btn-outline-success w-50">Đăng ký</button>
        </div>
    </form>
</div>

    <!-- <script>
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
                    Validator.minLength('#username', 8),
                    Validator.minLength('#password', 8),
                    Validator.isConfirmed('#repassword', function() {
                        return document.querySelector('#form-1 #password').value;
                    }, 'Mật khẩu nhập lại không chính xác')
                ]
            })
        });
    </script> -->
<?php } ?>