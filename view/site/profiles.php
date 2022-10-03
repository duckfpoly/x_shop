<?php
if (empty(Session::get('ID'))) {
    echo ' <script language="javascript"> location.href = "?"; </script>';
} else { ?>
    <!-- breadcrumb part start-->
    <section class="breadcrumb_part mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>User Profile</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->
    <div class="container">
        <div class="d-flex justify-content-around flex-wrap">
            <div class="col-lg-3 col-md-6 col-12 animate__animated animate__fadeInDown">
                <img id="img_info" src="assets/uploads/admin/user/<?= $detail['image'] ?>" class="card-img-top" alt="...">
                <div class="card" style="width: 18rem;">
                    <div class="card-header text-light" style="background: #B08EAD ">
                        Option
                    </div>
                    <ul class="list-group list-group-flush">
                        <!-- <a href="" class="list-group-item">Changed Password</a> -->
                        <a type="button" id="update" class="list-group-item">Update Infomation</a>
                        <a type="button" id="update_pass" class="list-group-item">Changed Password</a>
                        <a href="" class="list-group-item text-danger">Delete Account</a>
                    </ul>
                </div>
            </div>
            <div id="profiles" class="col-lg-8 col-md-6 col-12 animate__animated animate__fadeInUp">
                <div class="form-group mb-3">
                    <label for="" class="form-label">Name</label>
                    <div class="form-control">
                        <?= $detail['name'] ?>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Username</label>
                    <div class="form-control">
                        <?= $detail['username'] ?>
                    </div>
                </div>
                <div div class="form-group mb-3">
                    <label for="" class="form-label">Email</label>
                    <div class="form-control">
                        <?= $detail['email'] ?>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Status</label>
                    <div class="form-control">
                        <?= $detail['active'] == 0
                            ? '<span class="text-success">Active <i class="fa-solid fa-check"></i></span>'
                            : '<span class="text-secondary">Chờ kích hoạt <i class="fa-solid fa-exclamation"></i></span>' ?>
                    </div>
                </div>
            </div>
            <div id="update_profile" class="col-lg-8 col-md-6 animate__animated animate__fadeInUp animate__fast d-none ">
                <h5 class="text-danger text-center mb-4"><br><?= isset($update) ? $update : "" ?></h5>
                <form method="post" id="form_info">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Họ tên</label>
                        <input type="text" class="form-control" value="<?= $detail['name'] ?>" id="name" name="name">
                        <div class="form-message text-danger mt-1"><br></div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Ảnh</label>
                        <input type="file" class="form-control" name="image_update">
                        <input type="text" class="form-control" hidden name="image" value="<?= $detail['image'] ?>" >
                        <div class="form-message text-danger mt-1"><br></div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Username</label>
                        <input type="text" class="form-control" value="<?= $detail['username'] ?>" id="username" name="username">
                        <div class="form-message text-danger mt-1"><br></div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" value="<?= $detail['email'] ?>" id="email" name="email">
                        <div class="form-message text-danger mt-1"><br></div>
                    </div>
                    <div class="form-group mb-3">
                        <button class="btn btn-outline-success" name="update_info_user" type="submit">Update</button>
                        <button class="btn btn-outline-danger" type="button" id="cancel">Cancel</button>
                    </div>
                </form>
            </div>
            <div id="changed_pass" class="col-lg-8 col-md-6 animate__animated animate__fadeInUp animate__fast d-none ">
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
                    <div class="form-group mb-3">
                        <button class="btn btn-outline-success" name="update_pass_user" type="submit">Update</button>
                        <button class="btn btn-outline-danger" type="button" id="cancel_pass">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#update").click(function(e) {
                $("#profiles").addClass("d-none");
                $("#changed_pass").addClass("d-none");
                $("#update_profile").removeClass("d-none")
                $("#update_profile").addClass("d-block");
            });
            $("#update_pass").click(function(e) {
                $("#profiles").addClass("d-none");
                $("#update_profile").addClass("d-none");
                $("#changed_pass").removeClass("d-none")
            });
            $("#cancel").click(function(e) {
                $("#update_profile").removeClass("d-block");
                $("#update_profile").addClass("d-none");
                $("#profiles").removeClass("d-none");
            });
            $("#cancel_pass").click(function(e) {
                $("#update_profile").removeClass("d-block");
                $("#update_profile").addClass("d-none");
                $("#changed_pass").removeClass("d-block");
                $("#changed_pass").addClass("d-none");
                $("#profiles").removeClass("d-none");
            });
        });
        // document.addEventListener('DOMContentLoaded', function() {
        //     Validator({
        //         form: '#form_info',
        //         formGroupSelector: '.form-group',
        //         errorSelector: '.form-message',
        //         rules: [
        //             Validator.isRequired('#name', 'Vui lòng nhập đầy đủ họ tên'),
        //             Validator.isRequired('#username', 'Vui lòng nhập username'),
        //             Validator.isRequired('#email', 'Vui lòng nhập email'),
        //             Validator.isEmail('#email'),
        //             Validator.minLength('#username', 6)
        //         ],
        //     });
        // });
        // document.addEventListener('DOMContentLoaded', function() {
        //     Validator({
        //         form: '#form_pass',
        //         formGroupSelector: '.form-group',
        //         errorSelector: '.form-message',
        //         rules: [
        //             Validator.isRequired('#old_password', 'Vui lòng nhập passwword'),
        //             Validator.isRequired('#new_password', 'Vui lòng nhập lại passwword'),
        //             Validator.isRequired('#re_new_password', 'Vui lòng nhập lại passwword'),
        //             Validator.minLength('#old_password', 6),
        //             Validator.minLength('#new_password', 6),
        //             Validator.minLength('#re_new_password', 6),
        //             Validator.isConfirmed('#re_new_password', function() {
        //                 return document.querySelector('#form_pass #new_password').value;
        //             }, 'Mật khẩu nhập lại không chính xác')
        //         ]
        //     })
        // });
    </script>
    <style>
        #img_info {
            display: block;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 0px auto;
        }
    </style>
<?php } ?>