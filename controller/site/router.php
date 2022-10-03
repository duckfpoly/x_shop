<?php
    isset($_GET['v']) ? $v = $_GET['v'] : $v = '';

    require_once 'model/model_process.php';

    require_once 'model/model_cate.php';
    require_once 'model/model_product.php';
    require_once 'model/model_comment.php';
    require_once 'model/model_user.php';
    require_once 'model/model_statistical.php';
    require_once 'model/model_blog.php';
    require_once 'model/model_cart.php';

    include 'global.php';

    if($v == "shop") {
        $read_cate = $cate->read();
        $read_prd = $product->read_all();
        include('view/site/shop.php');
    }
    elseif($v == "about") {
        include('view/site/about.php');
    }
    elseif($v == "blog") {
        include('view/site/blog.php');
    }
    elseif($v == "contact") {
        include('view/site/contact.php');
    }
    elseif($v == "feedback") {
        include('view/site/feedback.php');
    }
    elseif($v == "profiles") {
        if(isset($_POST['update_info_user'])){
            $id_user = Session::get('ID');
            $username = $_POST['username'];
            $email = $_POST['email'];
            $active = Session::get('active');
            $name = $_POST['name'];
            $image_goc = $_POST['image'];
            $image_up = $_FILES['image_update']['name'];
            if ($image_up == '') {
                $image = $image_goc;
            } else {
                $image = $image_up;
                $image_uploads = save_file("image_update", "assets/uploads/admin/user/");
            }
            $vaitro = Session::get('active');
            alert_2(
                $update = $user->update($username, $name, $email, $image, $active, $vaitro, $id_user),
                'Update successfully !',
                'Has error in too processor !',
                'profiles'
            );
        } else {
            $detail = $user->detail( Session::get('ID'));
            include('view/site/profiles.php');
        }
    }
    elseif($v == "product_detail"){
        $id = (int)$_GET['id'];
        $up_view = $product->tang_view($id);
        if(isset($_POST['cmt'])){
            $id_product = $id;
            $id_user = Session::get('ID');
            $comment_time = date("Y-m-d H:i:s");
            $content =  $_POST['comment'];
            $detail = $comment->create($id_product,$id_user,$comment_time,$content);
            echo '<script language="javascript">window.location="?v=product_detail&id=' . $id_product . '";</script>';
        }
        else {
            $detail = $product->detail($id);
            $list_with_cate = $product->products_with_cate($detail['id_cate']);
            $list_cmt = $comment->detail($id);
            $count = $comment->count_cmt($id);
            $data = total($detail['price'],$detail['giam_gia']);
            include('view/site/product_detail.php');
        }
    }
    elseif($v == "blog_detail"){
        // $id = (int)$_GET['id'];
        include 'view/site/blog_detail.php';
    }
    elseif($v == "sign_in"){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user_login = $user->login($username,$password);
        }
        include 'view/site/account/sign_in.php';
    }
    elseif($v == "sign_up"){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $username     = isset($_POST['username']) ? $_POST['username'] : '';
            $password     = isset($_POST['password']) ? $_POST['password'] : '';
            $confirm_pass = isset($_POST['confirm_pass']) ? $_POST['confirm_pass'] : '';
            $name         = isset($_POST['name']) ? $_POST['name'] : '';
            $email        = isset($_POST['email']) ? $_POST['email'] : '';
            if(isset($_FILES['image']['name'])){
                $image = $_FILES['image']['name'];
                $image_uploads = save_file("image", "assets/uploads/admin/user/");
            }
            else {
                $image = 'user.png';
            }
            alert_2(
                $create = $user->sign_up($username,$name,$email,$password,$image),
                'Đăng ký tài khoản thành công !',
                'Has error in too processor !',
                '?v=sign_in'
            );
        };
        include 'view/site/account/sign_up.php'; 
    }
    elseif($v == "sign_out"){
        Session::destroy();
    }
    elseif($v == "search"){
        if(isset($_POST['key'])){
            $key = $_POST['key'];
            $search = $this->product->searchs($key);
            include('view/site/search.php');
        }else {
            echo '<script language="javascript">window.location="?";</script>';
        }
    }
    elseif($v == "cart"){
        if(isset($_POST['addcart'])){
            $id_prd             = isset($_POST['id_prd']) ? $_POST['id_prd'] : "" ;
            $name_prd           = isset($_POST['name_prd']) ? $_POST['name_prd'] : "" ;
            $price_prd          = isset($_POST['price_prd']) ? $_POST['price_prd'] : "" ;
            $image_prd          = isset($_POST['image_prd']) ? $_POST['image_prd'] : "" ;
            $quantity_prd       = isset($_POST['quantity_prd']) ? $_POST['quantity_prd'] : "" ;
            $addcart            = add_cart($id_prd,$name_prd,$price_prd,$image_prd,$quantity_prd);
            echo '<script language="javascript">window.location="?v=cart";</script>';
        }
        if(isset($_POST['delete_prd_cart'])){
            $id_prd             = isset($_POST['id_product']) ? $_POST['id_product'] : "" ;
            $del_product_cart   = delete_product_cart($id_prd);
            echo '<script language="javascript">window.location="?v=cart";</script>';
        }
        if(isset($_POST['update_prd_cart'])){
            $id_prd                 = isset($_POST['id_product'])   ? $_POST['id_product']  : "" ;
            $qty                    = isset($_POST['qty'])          ? $_POST['qty']         : "" ;
            $update_product_cart    = update_product_cart($id_prd,$qty);
            echo '<script language="javascript">window.location="?v=cart";</script>';
        }
        include('view/site/cart.php');
    }
    elseif($v == "checkout"){
        include('view/site/checkout.php');
    }
    elseif($v == "confirm_order"){
        include('view/site/confirm_order.php');
    }
    else {
        $read_prd = $product->read();
        $top_view = $product->top_product();
        include('view/site/home.php');
    }
?>