<?php 
    include 'config/process.php';
    $account = new LoginUsers($process);
?>
<?php 
    class LoginUsers {
        private $process;
        public function __construct($process){
            $this->db = $process;
        }
        public function login($username,$password) {
            if(empty($username) || empty($password)){ 
                $alert = "Vui lòng nhập đầy đủ thông tin !";
                return $alert;
            }
            else {
                $query = "SELECT * FROM tbl_user WHERE username = '$username' ";
                $value = $this->db->query_one($query);
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
                $check_username = $this->db->query_one($sql, $username);
                if($check_username > 0) {
                    $alert = "Username đã được sử dụng !";
                    return $alert;
                }
                else{
                    $sql = "SELECT * FROM `tbl_user` WHERE email = ?";
                    $check_email = $this->db->query_one($sql, $email);
                    if($check_email > 0) {
                        $alert = "Email đã được sử dụng !";
                        return $alert;
                    }
                    else {
                        $pass = password_hash($password,PASSWORD_DEFAULT);
                        $sql = "INSERT INTO `tbl_user` SET `username` = ?, `name` = ?, `email` = ?,`password` = ?, `image` = ?";
                        $this->db->query_sql($sql,$username,$name,$email,$pass,$image);
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