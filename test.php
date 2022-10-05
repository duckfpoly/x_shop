<?php 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $district = $_POST['district'];
    $address_detail = $_POST['address_detail'];
    $message = $_POST['message'];
    $value_pay = $_POST['pay_option'];
    echo 
        $name . "<br>" . 
        $email . "<br>" . 
        $phone . "<br>" . 
        $country . "<br>" . 
        $district . "<br>" . 
        $address_detail . "<br>" . 
        $message . "<br>" . 
        $value_pay . "<br>" 
    ;
?>