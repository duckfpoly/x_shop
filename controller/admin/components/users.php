<div class="alert alert-success mt-3 text-center" role="alert">
    <h4 class="text-success">USER ACCOUNT MANAGEMENT <?= $text ?></h4>
</div>
<div>
    <?php
        if ($act == 'create') {
            include('view/admin/users/add.php');
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $active = $_POST['active'];
                $name = $_POST['name'];
                $image = $_FILES['image']['name'];
                $role = $_POST['role'];
                $uploads = save_file("image", "assets/uploads/admin/user/");
                alert(
                    $create = $user->create($username, $name, $email, $password, $image, $active, $role),
                    'Add User successfully !',
                    'Has error in too processor !',
                    'users'
                );
            };
        } 
        elseif ($act == 'update') {
            $id = $_GET['id'];
            if($id == 1){
                echo '  <script language="javascript">alert("Không thể cập nhật tài khoản gốc !"); location.href = "?module=users";</script>';
            }else {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $id_user = $id;
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $active = $_POST['active'];
                    $name = $_POST['name'];
                    $image_goc = $_POST['image'];
                    $image_up = $_FILES['image_update']['name'];
                    if ($image_up == '') {
                        $image = $image_goc;
                    } else {
                        $image = $image_up;
                        $image_uploads = save_file("image_update", "assets/uploads/admin/user/");
                    }
                    $vaitro = $_POST['role'];
                    alert(
                        $update = $user->update($username, $name, $email, $image, $active, $vaitro, $id_user),
                        'Update User successfully !',
                        'Has error in too processor !',
                        'users'
                    );
                } else {
                    if ($id) {
                        $detail = $user->detail($id);
                        include('view/admin/users/update.php');
                    }
                }
            }
        } 
        elseif ($act == 'delete') {
            $id = (int)$_GET['id'];
            if ($id) {
                if($id == 1){
                    echo '  <script language="javascript">alert("Không thể xóa tài khoản gốc !"); location.href = "admin.php";</script>';
                }else {
                    alert(
                        $delete = $user->delete($id),
                        'Delete User successfully !',
                        'Has error in too processor !',
                        'users'
                    );
                }
            }
        } 
        else {
            $read = $user->read();
            include('view/admin/users/index.php');
        }
    ?>
</div>