<div class="alert alert-success mt-3 text-center" role="alert">
    <h4 class="text-success">PRODUCT CATALOG MANAGEMENT <?= $text ?></h4>
</div>
<div>
    <?php 
        if($act == 'create'){
            include('view/admin/categories/add.php');
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $name = $_POST['name'];
                alert(
                    $create = $cate->create($name),
                    'Add category successfully !',
                    'Has error in too processor !',
                    'categories'
                );
            }
        }
        elseif($act == 'update'){
            if(($_SERVER['REQUEST_METHOD'] == 'POST')){
                $id_cate = $_POST['id_cate'];
                $name = $_POST['name'];
                alert(
                    $update = $cate->update($name,$id_cate),
                    'Update category successfully !',
                    'Has error in too processor !',
                    'categories'
                );
            }else {
                $id = (int)$_GET['id'];
                $read_one = $cate->detail($id);
                include 'view/admin/categories/update.php';
            }
        }
        elseif($act == 'delete'){
            $id = (int)$_GET['id'];
            if($id){
                $delete = $cate->delete($id);
            }
        }
        else {
            $read = $cate->read();
            include('view/admin/categories/index.php');
        }
    ?>
</div>
