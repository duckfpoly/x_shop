<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(isset($_POST['save_user'])){
        add_cookie("username", $username, 30);
        add_cookie("password", $password, 30);
        // setcookie("username", $username, time() + (86400 * 30), "/");
        // setcookie("password", $password, time() + (86400 * 30), "/");
    }else{
        delete_cookie('username');
        delete_cookie('password');
    }
    get_cookie('username');
    get_cookie('password');
    // $user_login = $account->login($username,$password);
    // echo ' <script language="javascript"> location.href = "?"; </script>';
}
?>