<?php 
    include('model/model_user.php');
?>
<?php 
    if(isset($_GET['act'])){
        $text = $_GET['act'];
        $req = $str = strtoupper("- ".$text);
    }
    else {
        $req = '';
    }
?>
<div class="alert alert-success mt-3 text-center" role="alert">
    <h4 class="text-success">USER ACCOUNT MANAGEMENT <?= $req ?></h4>
</div>
<div>
<?php 
    if(isset($_GET['act'])){
        $act = $_GET['act'];
    }
    else {
        $act = '';
    }
    if($act == 'create'){
        include('view/admin/users/add.php');
        if(isset($_POST['add_user'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $active = $_POST['active'];

            $name = $_POST['name'];
            $image = $_FILES['image']['name'];
            $role = $_POST['role'];

            $uploads = save_file("image", "$IMAGE_DIR/admin/user/");
            alert(
                $create = $handle_user->create($username,$name,$email,$password,$image,$active,$role),
                'Add User successfully !',
                'Has error in too processor !',
                'users'
            );
        };
    }
    elseif($act == 'update'){
        $id = $_GET['id'];
        if(isset($_POST['update_user'])){
            $id_user = $id;
            $username = $_POST['username'];
            $email = $_POST['email'];
            $active = $_POST['active'];
            $name = $_POST['name'];
            $image_goc = $_POST['image'];
            $image_up = $_FILES['image_update']['name'];
            if($image_up == ''){
                $image = $image_goc;
            }
            else {
                $image = $image_up;
                $image_uploads = save_file("image_update", "$IMAGE_DIR/admin/user/");
            }
            $vaitro = $_POST['role'];
            alert(
                $update = $handle_user->update($username,$name,$email,$image,$active,$vaitro,$id_user),
                'Update User successfully !',
                'Has error in too processor !',
                'users'
            );
        }
        else {
            if($id){
                $detail = $handle_user->detail($id);
                include('view/admin/users/update.php');
            }
        }
    }
    elseif($act == 'delete'){
        $id = (int)$_GET['id'];
        if($id){
            alert(
                $delete = $handle_user->delete($id),
                'Delete User successfully !',
                'Has error in too processor !',
                'users'
            );
        }
    }
    else {
        $read = $handle_user->read();
        include('view/admin/users/index.php');
    }
?>
</div>
