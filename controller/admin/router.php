<?php

    isset($_GET['module']) ? $module = $_GET['module'] : $module = '';
    isset($_GET['act']) ? $act = $_GET['act'] : $act = '';
    isset($_GET['act']) ? $text = strtoupper("- ".$_GET['act']) : $text = '';

    require_once 'model/model_process.php';
    
    require_once 'model/model_cate.php';
    require_once 'model/model_product.php';
    require_once 'model/model_comment.php';
    require_once 'model/model_user.php';
    require_once 'model/model_statistical.php';
    require_once 'model/model_blog.php';
    require_once 'model/model_order.php';

    require_once 'global.php';
    
    if($module == "categories") {
        include('components/categories.php');
    }
    elseif($module == "products"){
        include('components/products.php');
    }
    elseif($module == "comments"){
        include('components/comments.php');
    }
    elseif($module == "users"){
        include('components/users.php');
    }
    elseif($module == "statisticals"){
        include('components/statistical.php');
    }
    elseif($module == "blog"){
        include('components/blog.php');
    }
    elseif($module == "orders"){
        include('components/orders.php');
    }
    elseif($module == "sign_out"){
        Session::unset('user_login');
        Session::unset('ID');
        Session::unset('username');
        Session::unset('name');
        Session::unset('email');
        Session::unset('password');
        Session::unset('image');
        Session::unset('active');
        Session::unset('vaitro');
        echo ' <script language="javascript"> location.href = "./"; </script>';
    }
    else {
        include('components/dashboard.php');
    }
?>
