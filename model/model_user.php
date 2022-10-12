<?php
    $user = new user();
    class user extends process{
        // public function __construct(){
        //     $this = new process();
        // }
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
                $alert = "Vui lòng nhập đầy đủ thông tin !";
                return $alert;
            }
            else {
                $query = "SELECT * FROM tbl_user WHERE username = '$data' OR email = '$data'";
                $value = $this->query_one($query);
                if(isset($value['username']) || isset($value['email'])){
                    if($value['active'] == 1 ){
                        $alert = "Tài khoản của bạn đã bị vô hiệu hóa !";
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
                            $alert = "Sai mật khẩu !";
                            return $alert;
                        }
                    }
                }
                else {
                    $alert = "Tài khoản không tồn tại !";
                    return $alert;
                }
            }
        }
        public function login_gg($email){
            if(empty($email)){ 
                $alert = "Vui lòng nhập đầy đủ thông tin !";
                return $alert;
            }
            else {
                $query = "SELECT * FROM tbl_user WHERE email = '$email'";
                $value = $this->query_one($query);
                if(isset($value['email'])){
                    if($value['active'] == 1) {
                        $alert = "Tài khoản của bạn đã bị vô hiệu hóa !";
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
                        echo ' <script language="javascript"> location.href = "home"; </script>';
                    }
                }
                else {
                    $alert = "Email chưa được đăng ký !";
                    return $alert;
                }
            }
        }
        public function sign_up_gg($username,$name,$email,$password){
            if(empty($username) || empty($name) || empty($email) || empty($password)){ 
                $alert = "Vui lòng nhập đầy đủ thông tin !";
                return $alert;
            }
            else {
                $sql = "SELECT * FROM `tbl_user` WHERE email = ?";
                $check_email = $this->query_one($sql, $email);
                if($check_email > 0) {
                    $alert = "Email đã được sử dụng !";
                    return $alert;
                }
                else{
                    $pass = password_hash($password,PASSWORD_DEFAULT);
                    $sql = "INSERT INTO `tbl_user` SET `username` = ?, `name` = ?, `email` = ?,`password` = ?, `image` = 'user.png'";
                    $create_user = $this->query_sql($sql,$username,$name,$email,$pass);
                    echo ' <script language="javascript"> alert("Đăng ký thành công ! Thông tin tài khoản đã được gửi vào mail của bạn."); location.href="?v=sign_in";</script>';
                }
            }
        }
        public function sign_up($username,$name,$email,$password,$image){
            if(empty($username) || empty($name) || empty($email) || empty($password)){ 
                $alert = "Vui lòng nhập đầy đủ thông tin !";
                return $alert;
            }
            else {
                $sql = "SELECT * FROM `tbl_user` WHERE username = ?";
                $check_username = $this->query_one($sql, $username);
                if($check_username > 0) {
                    $alert = "Username đã được sử dụng !";
                    return $alert;
                }
                else{
                    $sql = "SELECT * FROM `tbl_user` WHERE email = ?";
                    $check_email = $this->query_one($sql, $email);
                    if($check_email > 0) {
                        $alert = "Email đã được sử dụng !";
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
                    echo ' <script language="javascript"> alert("cập nhật mật khẩu thành công !"); location.href="?v=profiles";</script>';
                }
                else {
                    $alert = "Mật khẩu cũ không đúng !";
                    return $alert;
                }
            }
        }
        public function check_email($email){
            if(empty($email)){
                $alert = "Vui lòng nhập địa chỉ email !";
                return $alert;
            }
            else{
                $sql = "SELECT * FROM `tbl_user` WHERE email = ?";
                $check_email = $this->query_one($sql, $email);
                if($check_email > 0) {
                    $alert = "Email đã được sử dụng !";
                    return $alert;
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
        }
        public function reset_password($new_password,$email){
            if(empty($new_password) || empty($email)){ 
                $alert = "Please enter your all fields to reset pass !";
                return $alert;
            }
            else {
                $pass = password_hash($new_password,PASSWORD_DEFAULT);
                $sql = " UPDATE `tbl_user` SET `password` = ? WHERE ID = ?";
                $reset = $this->query_sql($sql,$pass,$email);
            }
        }
    }
    
?>