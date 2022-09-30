<?php 
    include('model/model_comment.php');
    include('model/model_product.php');
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
    <h4 class="text-success">COMMENT MANAGEMENT <?= $req ?></h4>
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
            include('view/admin/comment/add.php');
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $id_product = $_POST['id_product'];
                $id_user = $_POST['id_user'];
                $time = date("Y-m-d H:i:s");
                $content_cmt = $_POST['content_cmt'];
                alert(
                    $create = $handle_comment->create($id_product,$id_user,$time,$content_cmt),
                    'Add comment successfully !',
                    'Has error in too processor !',
                    'comments'
                );
            }
        }
        elseif($act == 'detail'){
            $id = (int)$_GET['id'];
            $detail = $handle_comment->detail($id);
            $data = $handle_product->detail($id);
            $name = $data['name_prd'];
            include('view/admin/comment/detail.php');
        }
        elseif($act == 'delete'){
            $id = (int)$_GET['id'];
            if($id){
                $delete = $handle_comment->delete($id);
                header('Location: ?module=comments');
            }
        }
        else {
            $list = $handle_comment->show_list();
            include('view/admin/comment/list.php');
        }
    ?>
</div>
