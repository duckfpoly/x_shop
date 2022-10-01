<div class="alert alert-success mt-3 text-center" role="alert">
    <h4 class="text-success">PRODUCT MANAGEMENT <?= $text ?></h4>
</div>
<div>
    <?php 
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
                    $create = $product->create($name, $price, $image, $giam_gia, $ngay_nhap, $dac_biet, $description, $id_cate),
                    'Add products successfully !',
                    'Has error in too processor !',
                    'products'
                );
            }else {
                $cate = $cate->read();
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
                    $update = $product->update($name,$price,$image,$giam_gia,$ngay_nhap,$dac_biet,$description,$id_cate,$id_product),
                    'Update products successfully !',
                    'Has error in too processor !',
                    'products'
                );
            }else {
                $id = (int)$_GET['id'];
                $cate = $cate->read();
                $detail = $product->detail($id);
                include('view/admin/products/update.php');
            }
        }
        elseif($act == 'delete'){
            $id = (int)$_GET['id'];
            if($id){
                alert(
                    $delete = $product->delete($id),
                    'Delete products successfully !',
                    'Has error in too processor !',
                    'products'
                );
            }
        }
        elseif($act == "detail"){
            $id = (int)$_GET['id'];
            $detail = $product->detail($id);
            include('view/admin/products/detail.php');
        }
        else {
            $read = $product->read_all();
            include('view/admin/products/index.php');
        }
    ?>
</div>
