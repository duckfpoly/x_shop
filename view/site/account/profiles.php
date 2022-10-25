<?php
if (empty(Session::get('ID'))) {
    echo ' <script language="javascript"> location.href = "home"; </script>';
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
                        <a href="update_info" id="update" class="list-group-item">Update Infomation</a>
                        <a href="changed_pass" id="update_pass" class="list-group-item">Changed Password</a>
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
           
            
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <style>
        #img_info {
            display: block;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 0px auto;
            margin-bottom: 20px;
        }
    </style>
<?php } ?>