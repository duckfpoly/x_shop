<?php
    $user = new user();
    class user {
        public function __construct(){
            $this->process = new process();
        }
        public function read(){
            $sql = "SELECT * FROM `tbl_user`";
            $read = $this->process->query($sql);
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
                $create_user = $this->process->query_sql($sql,$username,$name,$email,$pass,$image,$actived,$roled);
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
                $update_user = $this->process->query_sql($sql,$username,$name,$email,$image,$active,$vaitro,$id);
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
                $delete_user = $this->process->query_sql($sql,$id);
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
                $detail = $this->process->query_one($sql,$id);
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
                $select_username =  $this->process->query($sql, $username);
                return $select_username;
            }
        }
        public function login($username,$password) {
            if(empty($username) || empty($password)){ 
                $alert = "Vui lòng nhập đầy đủ thông tin !";
                return $alert;
            }
            else {
                $query = "SELECT * FROM tbl_user WHERE username = '$username'";
                $value = $this->process->query_one($query);
                if(isset($value['username'])){
                    $checkPass = password_verify($password, $value['password']);
                    if ($checkPass > 0) {
                        Session::set('user_login',true);
                        Session::set('ID'       ,$value['ID']);
                        Session::set('username' ,$value['username']);
                        Session::set('name'     ,$value['name']);
                        Session::set('email'    ,$value['email']);
                        Session::set('password' ,$value['password']);
                        Session::set('image'    ,$value['image']);
                        Session::set('active'   ,$value['active']);
                        Session::set('vaitro'   ,$value['vaitro']);
                    } else {
                        $alert = "Sai mật khẩu !";
                        return $alert;
                    }
                }
                else {
                    $alert = "Username không tồn tại !";
                    return $alert;
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
                $check_username = $this->process->query_one($sql, $username);
                if($check_username > 0) {
                    $alert = "Username đã được sử dụng !";
                    return $alert;
                }
                else{
                    $sql = "SELECT * FROM `tbl_user` WHERE email = ?";
                    $check_email = $this->process->query_one($sql, $email);
                    if($check_email > 0) {
                        $alert = "Email đã được sử dụng !";
                        return $alert;
                    }
                    else {
                        $pass = password_hash($password,PASSWORD_DEFAULT);
                        $sql = "INSERT INTO `tbl_user` SET `username` = ?, `name` = ?, `email` = ?,`password` = ?, `image` = ?";
                        $this->process->query_sql($sql,$username,$name,$email,$pass,$image);
                    }
                }
            }
        }
        public function change_password($password,$id){
            if(empty($email) || empty($id)){ 
                $alert = "Please enter your all fields to update !";
                return $alert;
            }
            else {
                $pass = password_hash($password,PASSWORD_DEFAULT);
                $sql = " UPDATE `tbl_user` SET `password` = ? WHERE ID = ?";
                $update_user = $this->process->query_sql($sql,$pass,$id);
                return $update_user;
            }
        }
    }
    
?>