<section class="breadcrumb_part mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <h2>User Profile - Update Infomation</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="update_profile" class="col-lg-8 col-md-6 animate__animated animate__fadeInUp animate__fast" style="margin: 0px auto;">
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
            <input type="text" class="form-control" hidden name="image" value="<?= $detail['image'] ?>">
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
            <a href="?v=profiles" class="btn btn-outline-danger" id="cancel">Cancel</a>
        </div>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
            Validator({
                form: '#form_info',
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',
                rules: [
                    Validator.isRequired('#name', 'Vui lòng nhập đầy đủ họ tên'),
                    Validator.isRequired('#username', 'Vui lòng nhập username'),
                    Validator.isRequired('#email', 'Vui lòng nhập email'),
                    Validator.isEmail('#email'),
                    Validator.minLength('#username', 6)
                ],
            });
        });
</script>