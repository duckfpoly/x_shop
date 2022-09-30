<?php 
    if(empty(Session::get('ID'))){ echo ' <script language="javascript"> location.href = "?"; </script>';
    } else { ?> 
<div class="alert alert-success text-center" role="alert">
    <small class="text-success fw-bold">Thông tin tài khoản</small>
</div>
<div class="container">
    <div class="d-flex justify-content-around">
        <div class="col-3 animate__animated animate__fadeInDown">
            <img width="100%" height="300px" src="assets/uploads/admin/user/<?= Session::get('image') ?>" class="card-img-top" alt="...">
        </div>
        <div class="col-8 animate__animated animate__fadeInUp">
            <div class="form-group mb-3">
                <label for="" class="form-label">Họ tên</label>
                <div class="form-control">
                    <?= Session::get('name') ?>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Username</label>
                <div class="form-control">
                    <?= Session::get('username') ?>
                </div>
            </div>
            <div div class="form-group mb-3">
                <label for="" class="form-label">Email</label>
                <div class="form-control">
                    <?= Session::get('email') ?>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Trạng thái tài khoản</label>
                <div class="form-control">
                    <?= Session::get('active') == 0 
                    ? '<span class="text-success">Hoạt động <i class="fa-solid fa-check"></i></span>' 
                    : '<span class="text-secondary">Chờ kích hoạt <i class="fa-solid fa-exclamation"></i></span>' ?>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <button id="update" class="btn btn-outline-secondary">Cập nhật thông tin</button>
    </div>
    <div id="update_profile" class="d-flex justify-content-around animate__animated animate__fadeInDown animate__fast d-none ">
        <div class="col-3">
            <img width="100%" height="300px" src="assets/uploads/admin/user/<?= Session::get('image') ?>" class="card-img-top" alt="...">
        </div>
        <div class="col-8">
            <form action="" method="post">
                <div class="form-group mb-3">
                    <label for="" class="form-label">Họ tên</label>
                    <input class="form-control" value="<?= Session::get('name') ?>" name="name">
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Ảnh</label>
                    <input type="file" class="form-control" name="image_update">
                    <input type="text" class="form-control" hidden value="<?= Session::get('image') ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Username</label>
                    <input class="form-control" value="<?= Session::get('username') ?>" name="username">
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Email</label>
                    <input class="form-control" value="<?= Session::get('email') ?>" name="email">
                </div>
                <div class="form-group mb-3">
                    <button class="btn btn-outline-success" type="submit">Update</button>
                    <button class="btn btn-outline-danger" type="button" id="cancel">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
        $(document).ready(function() {
            $("#update").click(function (e) {
                $( "#update_profile" ).removeClass("d-none")
                $("#update_profile").addClass("d-block");
            })
            $("#cancel").click(function (e) {
                $( "#update_profile" ).removeClass("d-block");
                $("#update_profile").addClass("d-none");
            })
        });
</script>

<?php } ?>

