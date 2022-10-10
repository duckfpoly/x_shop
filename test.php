<?php
function rand_username( $length ) {
    $chars = "abcdefghijklmnopqrstuvwxyz";
    $size = strlen( $chars );
    $str = '';
    for( $i = 0; $i < $length; $i++ ) {
        $str .= $chars[ rand( 0, $size - 1 ) ];
    }
    return $str;
}
    $username = rand_username(6);
    echo $username;
?>