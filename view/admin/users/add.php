<form action="" method="post" id="form" enctype="multipart/form-data">
    <div class="row d-flex flex-wrap">
        <div class="col-6">
            <div class="form-group mb-3">
                <label for="" class="form-label">Tên đăng nhập</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="username" required>
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Mật khẩu</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="*********" required>
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="example@gmail.com" required>
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Kích hoạt ?</label>
                <div class="form-control">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="active" value="0" checked> Kích hoạt
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="active" value="1"> Chưa kích hoạt
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group mb-3">
                <label for="" class="form-label">Họ và tên</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Nguyễn Văn A" required>
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Xác nhận mật khẩu</label>
                <input type="password" name="confim_password" id="confim_password" class="form-control" placeholder="*********" required>
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Hình ảnh</label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Vai trò</label>
                <div class="form-control">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="role" value="1" required> Admin
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="role" value="0" required checked> Khách hàng
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="submit" name="add_user" value="Submit" class="btn btn-outline-success">
    <input type="button" onclick="document.getElementById('from').reset()" value="Reset" id="reset_form" class="btn btn-outline-info">
    <input type="button" onclick="location.href='?module=users'" value="List" class="btn btn-outline-primary">
    <!-- <a href="javascript:void(0)">List</a> -->
</form>