<?php 
    include 'model/model_product.php';
    include 'model/model_cate.php';
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
    <h4 class="text-success">PRODUCT MANAGEMENT <?= $req ?></h4>
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
            if(isset($_POST['add_product'])){
                $name = $_POST['name'];
                $price = $_POST['price'];
                $image = $_FILES['image']['name'];
                $giam_gia = $_POST['giam_gia'];
                $ngay_nhap = $_POST['date'];
                $dac_biet = $_POST['special'];
                $description = $_POST['description'];
                $id_cate = $_POST['id_cate'];
                $uploads = save_file("image", "$IMAGE_DIR/admin/products/");
                alert(
                    $create = $handle_product->create($name, $price, $image, $giam_gia, $ngay_nhap, $dac_biet, $description, $id_cate),
                    'Add products successfully !',
                    'Has error in too processor !',
                    'products'
                );
            }else {
                $cate = $handle_cate->read();
                include('view/admin/products/add.php');
            }
        }
        elseif($act == 'update'){
            $id = $_GET['id'];
            if(isset($_POST['update_product'])){
                $id_product = $id;
                $name = $_POST['name'];
                $price = $_POST['price'];
                $image_goc = $_POST['image'];
                $image_up = $_FILES['image_update']['name'];
                if($image_up == ''){
                    $image = $image_goc;
                }
                else {
                    $image = $image_up;
                    $image_uploads = save_file("image_update", "$IMAGE_DIR/admin/products/");
                }
                $giam_gia = $_POST['giam_gia'];
                $ngay_nhap = $_POST['date'];
                $dac_biet = $_POST['special'];
                $description = $_POST['description'];
                $id_cate = $_POST['id_cate'];
                $uploads = save_file("image_update", "$IMAGE_DIR/admin/products/");
                alert(
                    $update = $handle_product->update($name,$price,$image,$giam_gia,$ngay_nhap,$dac_biet,$description,$id_cate,$id_product),
                    'Update products successfully !',
                    'Has error in too processor !',
                    'products'
                );
            }else {
                $id = (int)$_GET['id'];
                $cate = $handle_cate->read();
                $detail = $handle_product->detail($id);
                include('view/admin/products/update.php');
            }
        }
        elseif($act == 'delete'){
            $id = (int)$_GET['id'];
            if($id){
                alert(
                    $delete = $handle_product->delete($id),
                    'Delete products successfully !',
                    'Has error in too processor !',
                    'products'
                );
            }
        }
        elseif($act == "detail"){
            $id = (int)$_GET['id'];
            $detail = $handle_product->detail($id);
            include('view/admin/products/detail.php');
        }
        else {
            $read = $handle_product->read_all();
            include('view/admin/products/index.php');
        }
    ?>
</div>
