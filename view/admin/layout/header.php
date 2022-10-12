<div style="width: 100%; height: 80px;" class="border border-end d-flex justify-content-end align-items-center sticky-top bg-white">
    <!-- <form action="" method="post" id="form" class="w-25 d-flex" style="margin-left: 20px;">
        <input type="text" name="search" placeholder="Search" class="form-control">
        <button class="btn btn-outline-success" style="margin-left: 10px;">Search</button>
    </form> -->
    <div class="d-flex justify-content-end align-items-center" style="padding-right: 20px;">
        <div class="col-4">
            <img width="75px" id="logo" class="p-2" style="border-radius: 50%;" src="assets/uploads/admin/user/<?= Session::get('image') ?>" alt="">
        </div>
        <div class="col-7" >
            <div class="dropdown">
                <div class="btn dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    <span style="margin-right: 10px;">
                        <?= Session::get('name') ?>
                    </span>
                </div>
                <ul class="dropdown-menu dropdown-menu" aria-labelledby="dropdownMenuButton2">
                    <li><a class="dropdown-item" href="./">Return Shop</a></li>
                    <li><a class="dropdown-item" href="profiles">Profiles</a></li>
                    <li><a class="dropdown-item" href="profiles?v=changed_pass">Changed Pass</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="?module=sign_out">Sign Out</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>