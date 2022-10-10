<form action="" method="post" id="form_user" enctype="multipart/form-data">
    <div class="row d-flex flex-wrap">
        <div class="col-4">
            <img class="rounded" width="100%" src="assets/uploads/admin/user/<?= $detail['image'] ?>" alt="">
        </div>
        <div class="col-4">
            <div class="form-group mb-3">
                <label for="" class="form-label">Tên đăng nhập</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="username" value="<?= $detail['username'] ?>">
                <div class="form-message text-danger mt-1"><br></div>
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="example@gmail.com" value="<?= $detail['email'] ?>">
                <div class="form-message text-danger mt-1"><br></div>
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Kích hoạt ?</label>
                <div class="form-control">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="active" value="0" <?= $detail['active'] == 0 ? 'checked' : '' ?> > Kích hoạt
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="active" value="1" <?= $detail['active'] == 1 ? 'checked' : '' ?> > Chưa kích hoạt
                        </label>
                    </div>
                </div>
                <div class="form-message text-danger mt-1"><br></div>

            </div>
        </div>
        <div class="col-4">
            <div class="form-group mb-3">
                <label for="" class="form-label">Họ và tên</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Nguyễn Văn A" value="<?= $detail['name'] ?>">
                <div class="form-message text-danger mt-1"><br></div>
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Hình ảnh</label>
                <input type="file" name="image_update" id="image_update" class="form-control">
                <input type="text" class="form-control" hidden value="<?= $detail['image'] ?>" name="image">
                <div class="form-message text-danger mt-1"><br></div>
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Vai trò</label>
                <div class="form-control">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="role" value="1" <?= $detail['vaitro'] == 1 ? 'checked' : '' ?>> Admin
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" class="form-check-input" name="role" value="0" <?= $detail['vaitro'] == 0 ? 'checked' : '' ?>> Khách hàng
                        </label>
                    </div>
                </div>
                <div class="form-message text-danger mt-1"><br></div>
            </div>
        </div>
    </div>
    <div>
        <input type="text" hidden name="id_user" id="id" value="<?= $detail['ID'] ?>">
    </div>
    <div style="margin:0px auto;" class="col-2 mt-5 d-flex justify-content-around align-items-center">
        <input type="submit" name="update_user" value="Submit" class="btn btn-outline-success">
        <input type="button" onclick="document.getElementById('from').reset()" value="Reset" id="reset_form" class="btn btn-outline-info">
        <input type="button" onclick="location.href='?module=users'" value="List" class="btn btn-outline-primary">
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        Validator({
            form: '#form_user',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#username', 'Vui lòng nhập username'),
                Validator.isRequired('#email', 'Vui lòng nhập email'),
                Validator.isEmail('#email'),
                Validator.isRequired('#name', 'Vui lòng nhập đầy đủ họ tên'),
                Validator.minLength('#username', 6),
            ]
        })
    });
</script>