<?php
    if(isset($_GET['module'])){
        $module = $_GET['module'];
    }
    else {
        $module = '';
    }
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
    else {
        include('components/dashboard.php');
    }
?>
