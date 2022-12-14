<?php
    $user = new user();
    class user extends process{
        public function read(){
            $sql = "SELECT * FROM `tbl_user`";
            $read = $this->query($sql);
            return $read;
        }
        public function create($username,$name,$email,$password,$image,$actived,$roled){
            if(empty($username) || empty($name) || empty($email) || empty($password) || empty($image)){ 
                $alert = "Please enter your all fields to create a new user !";
                return $alert;
            }
            else {
                $pass = password_hash($password,PASSWORD_DEFAULT);
                $sql = "INSERT INTO `tbl_user`  SET `username` = ?, `name` = ?, `email` = ?,`password` = ?, `image` = ?,`active` = ?, `vaitro` = ?";
                $create_user = $this->query_sql($sql,$username,$name,$email,$pass,$image,$actived,$roled);
                return $create_user;
            }
        }
        public function update($username,$name,$email,$image,$active,$vaitro,$id){
            if(empty($username) || empty($name) || empty($email) || empty($image) || empty($id)){ 
                $alert = "Please enter your all fields to update ! <br>";
                return $alert;
            }
            else {
                $sql = " UPDATE `tbl_user` SET `username` = ?, `name` = ?, `email` = ?, `image` = ?,`active` = ?, `vaitro` = ? WHERE ID = ?
                ";
                $update_user = $this->query_sql($sql,$username,$name,$email,$image,$active,$vaitro,$id);
                return $update_user;
            }
        }
        public function delete($id){ 
            if(empty($id)){
                $alert = "Please enter ID User !";
                return $alert;
            }
            else {
                $sql = "DELETE FROM `tbl_user` WHERE ID = ?";
                $delete_user = $this->query_sql($sql,$id);
                return $delete_user;
            }
        }
        public function detail($id){
            if(empty($id)){
                $alert = "Please enter ID User !";
                return $alert;
            }
            else {
                $sql = "SELECT * FROM `tbl_user` WHERE ID = ?";
                $detail = $this->query_one($sql,$id);
                return $detail;
            }
        }
        public function check_username($username){
            if(empty($id)){
                $alert = "Please enter ID Cate !";
                return $alert;
            }
            else {
                $sql = "SELECT * FROM `tbl_user` WHERE username = ?";
                $select_username =  $this->query($sql, $username);
                return $select_username;
            }
        }
        public function login($data,$password) {
            if(empty($data) || empty($password)){ 
                $alert = "Vui l??ng nh???p ?????y ????? th??ng tin !";
                return $alert;
            }
            else {
                $query = "SELECT * FROM tbl_user WHERE username = '$data' OR email = '$data'";
                $value = $this->query_one($query);
                if(isset($value['username']) || isset($value['email'])){
                    if($value['active'] == 1 ){
                        $alert = "T??i kho???n c???a b???n ???? b??? v?? hi???u h??a !";
                        return $alert;
                    }
                    else {
                        $checkPass = password_verify($password, $value['password']);
                        if ($checkPass > 0) {
                            Session::set('user_login'   ,true);
                            Session::set('ID'           ,$value['ID']);
                            Session::set('username'     ,$value['username']);
                            Session::set('name'         ,$value['name']);
                            Session::set('email'        ,$value['email']);
                            Session::set('password'     ,$value['password']);
                            Session::set('image'        ,$value['image']);
                            Session::set('active'       ,$value['active']);
                            Session::set('vaitro'       ,$value['vaitro']);
                        } else {
                            $alert = "Sai m???t kh???u !";
                            return $alert;
                        }
                    }
                }
                else {
                    $alert = "T??i kho???n kh??ng t???n t???i !";
                    return $alert;
                }
            }
        }
        public function login_gg($email){
            if(empty($email)){ 
                $alert = "Vui l??ng nh???p ?????y ????? th??ng tin !";
                return $alert;
            }
            else {
                $query = "SELECT * FROM tbl_user WHERE email = '$email'";
                $value = $this->query_one($query);
                if(isset($value['email'])){
                    if($value['active'] == 1) {
                        $alert = "T??i kho???n c???a b???n ???? b??? v?? hi???u h??a !";
                        return $alert;
                    }
                    else {
                        Session::set('user_login'   ,true);
                        Session::set('ID'           ,$value['ID']);
                        Session::set('username'     ,$value['username']);
                        Session::set('name'         ,$value['name']);
                        Session::set('email'        ,$value['email']);
                        Session::set('password'     ,$value['password']);
                        Session::set('image'        ,$value['image']);
                        Session::set('active'       ,$value['active']);
                        Session::set('vaitro'       ,$value['vaitro']);
                        echo ' <script language="javascript"> history.go(-2);</script>';
                        // echo ' <script language="javascript"> location.href = "home"; </script>';
                    }
                }
                else {
                    $alert = "Email ch??a ???????c ????ng k?? !";
                    return $alert;
                }
            }
        }
        public function sign_up_gg($username,$name,$email,$password){
            if(empty($username) || empty($name) || empty($email) || empty($password)){ 
                $alert = "Vui l??ng nh???p ?????y ????? th??ng tin !";
                return $alert;
            }
            else {
                $sql = "SELECT * FROM `tbl_user` WHERE email = ?";
                $check_email = $this->query_one($sql, $email);
                if($check_email > 0) {
                    $alert = "Email ???? ???????c s??? d???ng !";
                    return $alert;
                }
                else{
                    $pass = password_hash($password,PASSWORD_DEFAULT);
                    $sql = "INSERT INTO `tbl_user` SET `username` = ?, `name` = ?, `email` = ?,`password` = ?, `image` = 'user.png'";
                    $create_user = $this->query_sql($sql,$username,$name,$email,$pass);
                    $output     = '<p>Dear ,'.$name.'</p>';
                    $output .= '
                        <h1>????ng k?? t??i kho???n th??nh c??ng</h1>
                        <p>X Store xin ???????c g???i t??i kho???n v?? m???t kh???u c???a qu?? kh??ch:</p>
                        <ul>
                            <li><strong>T??i kho???n: </strong>'.$username.'</li>
                            <li><strong>M???t kh???u: </strong>'.$password.'</li>
                        </ul>
                    '; 
                    $output .= '
                        <p>N???u kh??ng ph???i b???n ????ng k?? <br>
                        Vui l??ng nh???n <a href="mailto:ndcake.store@gmai.com">v??o ????y</a> ????? g???i email li??n h??? l???i v???i ch??ng t??i 
                        ho???c c?? th??? li??n h??? tr???c ti???p qua s??? ??i???n tho???i: <a href="tel:+84823565831">+8482 3565 831</a></p>
                    ';         
                    $output .= '<p>Thanks,</p>';
                    $output .= '<p>ADMIN X SHOP</p>';
                    send_mail($email,$output,"SIGN UP ACCOUNT");
                    echo ' <script language="javascript"> alert("????ng k?? th??nh c??ng ! Th??ng tin t??i kho???n ???? ???????c g???i v??o mail c???a b???n."); location.href="sign_in";</script>';
                }
            }
        }
        public function sign_up($username,$name,$email,$password,$image){
            if(empty($username) || empty($name) || empty($email) || empty($password)){ 
                $alert = "Vui l??ng nh???p ?????y ????? th??ng tin !";
                return $alert;
            }
            else {
                $sql = "SELECT * FROM `tbl_user` WHERE username = ?";
                $check_username = $this->query_one($sql, $username);
                if($check_username > 0) {
                    $alert = "Username ???? ???????c s??? d???ng !";
                    return $alert;
                }
                else{
                    $sql = "SELECT * FROM `tbl_user` WHERE email = ?";
                    $check_email = $this->query_one($sql, $email);
                    if($check_email > 0) {
                        $alert = "Email ???? ???????c s??? d???ng !";
                        return $alert;
                    }
                    else {
                        $pass = password_hash($password,PASSWORD_DEFAULT);
                        $sql = "INSERT INTO `tbl_user` SET `username` = ?, `name` = ?, `email` = ?,`password` = ?, `image` = ?";
                        $this->query_sql($sql,$username,$name,$email,$pass,$image);
                    }
                }
            }
        }
        public function sign_out(){
            Session::unset('user_login');
            Session::unset('ID');
            Session::unset('username');
            Session::unset('name');
            Session::unset('email');
            Session::unset('password');
            Session::unset('image');
            Session::unset('active');
            Session::unset('vaitro');
        }
        public function change_password($old_password,$new_password,$id){
            if(empty($old_password) || empty($new_password) || empty($id)){ 
                $alert = "Please enter your all fields to update !";
                return $alert;
            }
            else {
                $sql = "SELECT * FROM `tbl_user` WHERE ID = ?";
                $value = $this->query_one($sql, $id);
                $checkPass = password_verify($old_password, $value['password']);
                if($checkPass > 0 ){
                    $pass = password_hash($new_password,PASSWORD_DEFAULT);
                    $sql = " UPDATE `tbl_user` SET `password` = ? WHERE ID = ?";
                    $update = $this->query_sql($sql,$pass,$id);
                    echo ' <script language="javascript"> alert("c???p nh???t m???t kh???u th??nh c??ng !"); location.href="?v=profiles";</script>';
                }
                else {
                    $alert = "M???t kh???u c?? kh??ng ????ng !";
                    return $alert;
                }
            }
        }
        public function check_email($email){
            if(empty($email)){
                $alert = "Vui l??ng nh???p ?????a ch??? email !";
                return $alert;
            }
            else{
                $sql = "SELECT * FROM `tbl_user` WHERE email = ?";
                $check_email = $this->query_one($sql, $email);
                if(!isset($check_email['email'])) {
                    $alert = "Email kh??ng t???n t???i !";
                    return $alert;
                }
                else {
                    $expFormat = mktime(
                        date("H"),
                        date("i"),
                        date("s"),
                        date("m"),
                        date("d") + 1,
                        date("Y")
                    );
                    $expDate = date("Y-m-d H:i:s", $expFormat);
                    $key = md5((2418 * 2) . $email);
                    $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
                    $key = $key . $addKey;
                    $password_reset_temp = $this->reset_pass($email,$key,$expDate);
                    $output = '<p>Dear user,</p>';
                    $output .= '<p>Vui l??ng click v??o li??n k???t sau ????? ?????t l???i m???t kh???u c???a b???n.</p>';
                    $output .= '<p>-------------------------------------------------------------</p>';
                    $output .= '<p><a href="localhost/xshop/reset_pass?key=' . $key . '&email=' . $email . '&action=reset" target="_blank">?????t l???i m???t kh???u</a></p>';
                    $output .= '<p>-------------------------------------------------------------</p>';
                    $output .= '<p>Li??n k???t s??? h???t h???n sau 1 ng??y v?? l?? do b???o m???t.</p>';
                    $output .= '<p>N???u b???n kh??ng y??u c???u email qu??n m???t kh???u n??y, kh??ng c?? h??nh ?????ng n??o
                            l?? c???n thi???t, m???t kh???u c???a b???n s??? kh??ng ???????c ?????t l???i. Tuy nhi??n, b???n c?? th??? mu???n ????ng nh???p v??o
                            t??i kho???n c???a b???n v?? thay ?????i m???t kh???u b???o m???t c???a b???n nh?? ai ???? c?? th??? ???? ??o??n ra.</p>';
                    $output .= '<p>Thanks,</p>';
                    $output .= '<p>ADMIN TEAM X STORE</p>';
                    send_mail($email,$output,"RESET PASSWORD");
                    echo '<script language="javascript">alert("M???t email ???? ???????c g???i v???i h?????ng d???n v??? c??ch ?????t l???i m???t kh???u c???a b???n."); window.location="https://mail.google.com/";</script>';
                }
            }
        }
        public function reset_pass($email,$key,$expdate){
            $sql = "INSERT INTO `password_reset_temp` SET `email` = ?, `keyy` = ?, `expDate` = ?";
            $temp = $this->query_sql($sql,$email,$key,$expdate);
        }
        public function delete_code_reset_pass($email){
            $sql = "DELETE FROM `password_reset_temp` WHERE `email` = $email";
            $temp = $this->query_sql($sql,$email);
        }
        public function read_code_reset_pass($email,$keyy){
            $sql = "SELECT * FROM `password_reset_temp` WHERE `email` = ? AND `keyy` = ?";
            $temp = $this->query($sql, $email, $keyy);
        }
        public function assoc_read_code_reset_pass($email,$keyy){
            $sql = "SELECT * FROM `password_reset_temp` WHERE `email` = ? AND `keyy` = ?";
            $temp2 = $this->query_one($sql, $email, $keyy);
            return $temp2;
        }
        public function reset_password($new_password,$email){
            if(empty($new_password) || empty($email)){ 
                $alert = "Please enter your all fields to reset pass !";
                return $alert;
            }
            else {
                $pass = password_hash($new_password,PASSWORD_DEFAULT);
                $sql = " UPDATE `tbl_user` SET `password` = ? WHERE email = ?";
                $reset = $this->query_sql($sql,$pass,$email);
            }
        }
    }
    
?>