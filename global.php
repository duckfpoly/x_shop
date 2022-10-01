<?php 
    function save_file($fieldname, $target_dir){
        $file_uploaded = $_FILES[$fieldname];
        $file_name = basename($file_uploaded["name"]);
        $target_path = $target_dir . $file_name;
        move_uploaded_file($file_uploaded["tmp_name"], $target_path);
        return $file_name;
    }
    /**
    * Tạo cookie
    * @param string $name là tên cookie
    * @param string $value là giá trị cookie
    * @param int $day là số ngày tồn tại cookie
    */
    function add_cookie($name, $value, $day){
        setcookie($name, $value, time() + (86400 * $day), "/");
    }
    /**
    * Xóa cookie
    * @param string $name là tên cookie
    */
    function delete_cookie($name){
        add_cookie($name, '', -1);
    }
    /**
    * Đọc giá trị cookie
    * @param string $name là tên cookie
    * @return string giá trị của cookie
    */
    function get_cookie($name){
        return $_COOKIE[$name]??'';
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
