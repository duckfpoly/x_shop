<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require_once 'vendor/autoload.php'; 

    function location($url){
        echo '<script>window.location="'.$url.'";</script>';
    }
    function save_file($fieldname, $target_dir){
        $file_uploaded = $_FILES[$fieldname];
        $file_name = basename($file_uploaded["name"]);
        $target_path = $target_dir . $file_name;
        move_uploaded_file($file_uploaded["tmp_name"], $target_path);
        return $file_name;
    }
    function total($price,$discount){
        $price = $price;
        $discount = $discount;
        if(empty($discount)){
            $total = $price;
            return $total;
        }
        else {
            $money = ($price * $discount) /100;
            $total = $price - $money; 
            return $total;
        }
    }
    function alert($process,$alert,$alert_2,$url){
        try {
            $process;
            echo '  <script language="javascript">
                        alert("'.$alert.'");
                        location.href = "?module='.$url.'";
                    </script>';
        }
        catch (Exception $exc) {
            echo '  <script language="javascript">
                        alert("'.$alert_2.'");
                        location.href = "?module='.$url.'";
                    </script>';
        }
    }
    function alert_2($process,$alert,$alert_2,$url){
        try {
            $process;
            echo '  <script language="javascript">
                        alert("'.$alert.'");
                        location.href = "?v='.$url.'";
                    </script>';
        }
        catch (Exception $exc) {
            echo '  <script language="javascript">
                        alert("'.$alert_2.'");
                        location.href = "?v='.$url.'";
                    </script>';
        }
    }
    function rand_username( $length ) {
        $chars = "abcdefghijklmnopqrstuvwxyz";
        $size = strlen( $chars );
        $str = '';
        for( $i = 0; $i < $length; $i++ ) {
            $str .= $chars[ rand( 0, $size - 1 ) ];
        }
        return $str;
    }
    function send_mail($mail,$output){
        $mailer         = new PHPMailer(true);                             
        $mailer->SMTPDebug = 0;                     
        $mailer->isSMTP();                                            
        $mailer->Host       = 'smtp.gmail.com';                     
        $mailer->SMTPAuth   = true;                                  
        $mailer->Username   = 'ndcake.store@gmail.com';                     
        $mailer->Password   = 'mswwgrjitnohamff';                               
        $mailer->SMTPSecure = 'tls';            
        $mailer->Port       = 587; 
        $mailer->setFrom('ndcake.store@gmail.com', 'X STORE');
        $mailer->addAddress($mail);  
        $mailer->isHTML(true);     
        $mailer->AddReplyTo('ndcake.store@gmail.com', 'X STORE');
        $body = $output;
        $mailer->Subject = 'X Store - Sign Up Account';
        $mailer->Body = $body;
        $mailer->send();
    }

    function cut_email($email){
        $string = $email;
        $return = strrev($string);
        $string_confirm = strstr($return, '@');
        $final = strrev($string_confirm) ;
        return chop($final,"@");
    }
    function checkLogin(){
        if(!empty(Session::get('ID'))){
            location('home');
        }
    }
    function checkLoginn(){
        if(empty(Session::get('ID'))){
            location('home');
        }
    }
    
?>