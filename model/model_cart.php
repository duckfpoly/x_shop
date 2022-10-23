<?php 
    function add_cart($id_prd,$name_prd,$price_prd,$image_prd,$quantity_prd){
        if(isset($_SESSION['cart'])){
            $available = 0;
            foreach($_SESSION['cart'] as $key => $value ) {
                if($_SESSION['cart'][$key]['id_prd'] == $id_prd ) {
                    $available++;
                    $_SESSION['cart'][$key]['quantity_prd'] += $quantity_prd;
                }
            }
            if($available == 0){
                $items = array(
                    'id_prd'        => $id_prd,
                    'name_prd'      => $name_prd,
                    'price_prd'     => $price_prd,
                    'image_prd'     => $image_prd,
                    'quantity_prd'  => $quantity_prd
                );
                $_SESSION['cart'][] = $items;
            }
        }
        else {
            $items = array(
                'id_prd'        => $id_prd,
                'name_prd'      => $name_prd,
                'price_prd'     => $price_prd,
                'image_prd'     => $image_prd,
                'quantity_prd'  => $quantity_prd
            );
            $_SESSION['cart'][] = $items;
        }
    }
    function delete_product_cart($id_prd){
        if(isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $key => $values ) {
                if($values['id_prd'] == $id_prd ) {
                    unset($_SESSION['cart'][$key]);
                }
            }
        }
        else {
            location('home');
        }
    }
    function update_product_cart($qty){
        foreach($qty as $key => $qty) { 
            foreach($_SESSION['cart'] as $cart => $values ) {
                if($values['id_prd'] == $key && $qty >= 1){
                    $_SESSION['cart'][$cart]['quantity_prd'] = $qty;
                }
                elseif($values['id_prd'] == $key && $qty <= 0){
                    unset($_SESSION['cart'][$key]);
                }
            }
        }
    }
?>