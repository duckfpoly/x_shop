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
                        echo ' <script language="javascript"> location.href = "?"; </script>';
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
        public function change_password($password,$id){
            if(empty($password) || empty($id)){ 
                $alert = "Please enter your all fields to update !";
                return $alert;
            }
            else {
                $pass = password_hash($password,PASSWORD_DEFAULT);
                $sql = " UPDATE `tbl_user` SET `password` = ? WHERE ID = ?";
                $update_user = $this->query_sql($sql,$pass,$id);
                return $update_user;
            }
        }
    }
    
?>