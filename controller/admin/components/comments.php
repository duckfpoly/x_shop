<div class="alert alert-success mt-3 text-center" role="alert">
    <h4 class="text-success">COMMENT MANAGEMENT <?= $text ?></h4>
</div>
<div>
    <?php 
        if($act == 'create'){
            include('view/admin/comment/add.php');
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $id_product = $_POST['id_product'];
                $id_user = $_POST['id_user'];
                $time = date("Y-m-d H:i:s");
                $content_cmt = $_POST['content_cmt'];
                alert(
                    $create = $comment->create($id_product,$id_user,$time,$content_cmt),
                    'Add comment successfully !',
                    'Has error in too processor !',
                    'comments'
                );
            }
        }
        elseif($act == 'detail'){
            $id = (int)$_GET['id'];
            $detail = $comment->detail($id);
            $data = $product->detail($id);
            $name = $data['name_prd'];
            include('view/admin/comment/detail.php');
        }
        elseif($act == 'delete'){
            $id = (int)$_GET['id'];
            $delete = $comment->delete($id);
            echo '<script language="javascript">location.href = "?module=comments";</script>';
        }
        else {
            $list = $comment->show_list();
            include('view/admin/comment/list.php');
        }
    ?>
</div>
