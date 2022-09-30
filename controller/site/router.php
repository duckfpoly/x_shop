<?php
    // include_once 'config/session.php';
    include 'model/validate.php';
    include 'model/model_account.php';
    include 'model/model_cate.php';
    include 'model/model_product.php';
    include 'model/model_comment.php';
    include 'global.php';


    if(isset($_GET['v'])){
        $v = $_GET['v'];
    }
    else {
        $v = '';
    }
    if($v == "shop") {
        $read_cate = $handle_cate->read();
        $read_prd = $handle_product->read_all();
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
        include('view/site/profiles.php');
    }
    elseif($v == "product_detail"){
        $id = (int)$_GET['id'];
        $up_view = $handle_product->tang_view($id);
        if(isset($_POST['cmt'])){
            $id_product = $id;
            $id_user = Session::get('ID');
            $comment_time = date("Y-m-d H:i:s");
            $content =  $_POST['comment'];
            $detail = $handle_comment->create($id_product,$id_user,$comment_time,$content);
            echo '<script language="javascript">window.location="?v=product_detail&id=' . $id_product . '";</script>';
        }
        else {
            $detail = $handle_product->detail($id);
            $list_with_cate = $handle_product->products_with_cate($detail['id_cate']);
            $list_cmt = $handle_comment->detail($id);
            $count = $handle_comment->count_cmt($id);
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
            // if(isset($_POST['save_user'])){
            //     setcookie("username", $username, time() + (86400 * 30), "/");
            //     setcookie("password", $password, time() + (86400 * 30), "/");
            // }else{
            //     add_cookie("username", '', -1);
            //     add_cookie("password", '', -1);
            // }
            $user_login = $account->login($username,$password);
            echo ' <script language="javascript"> location.href = "?"; </script>';
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
                $create = $account->sign_up($username,$name,$email,$password,$image),
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
    else {
        $read_prd = $handle_product->read();
        $top_view = $handle_product->top_product();
        include('view/site/home.php');
    }
?>