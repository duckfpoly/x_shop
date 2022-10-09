
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
    <h4 class="text-success">BLOGS MANAGEMENT <?= $req ?></h4>
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
            // include('view/admin/categories/add.php');
            // if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //     $name = $_POST['name'];
            //     alert(
            //         $create = $handle_cate->create($name),
            //         'Add category successfully !',
            //         'Has error in too processor !',
            //         'categories'
            //     );
            // }
        }
        elseif($act == 'update'){
            // if(isset($_POST['update'])){
            //     $id_cate = $_POST['id_cate'];
            //     $name = $_POST['name'];
            //     alert(
            //         $update = $handle_cate->update($name,$id_cate),
            //         'Update category successfully !',
            //         'Has error in too processor !',
            //         'categories'
            //     );
            // }else {
            //     $id = (int)$_GET['id'];
            //     $read_one = $handle_cate->detail($id);
            //     include 'view/admin/categories/update.php';
            // }
        }
        elseif($act == 'delete'){
            // $id = (int)$_GET['id'];
            // if($id){
            //     alert(
            //         $delete = $handle_cate->delete($id),
            //         'Delete category successfully !',
            //         'Has error in too processor !',
            //         'categories'
            //     );
            // }
        }
        else {
            // $read = $handle_cate->read();
            include('view/admin/blog/index.php');
        }
    ?>
</div>
