<?php 
    class db {
        
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $db = "xshop";

        public function connect(){
            $this->conn = null;
            try {
                $this->conn = new PDO("mysql:host=".$this->servername.";dbname=".$this->db."", $this->username, $this->password);
                // thiết lập lỗi PDO thành ngoại lệ
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // Kết nối thành công sẽ hiện thông báo kết nối thành công
            }catch(PDOException $e){
                // Kết nối thất bại sẽ hiện thông báo kết nối lỗi
                echo "Connection failed: " . $e->getMessage();
            }
            return $this->conn;
        }
        
    }
?>