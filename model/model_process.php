<?php 
    class process {
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $db = "xshop";
        public function connect(){
            $this->conn = null;
            try {
                $this->conn = new PDO("mysql:host=".$this->servername.";dbname=".$this->db."", $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();
            }
            return $this->conn;
        }
        public function query_sql($sql){
            $sql_args = array_slice(func_get_args(), 1);
            try {
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute($sql_args);
                return $stmt;
            } catch (PDOException $e) {
                throw $e;
            } 
        }
        public function query($sql){
            $sql_args = array_slice(func_get_args(), 1);
            try {
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute($sql_args);
                $rows = $stmt->fetchAll();
                return $rows;
            } catch (PDOException $e) {
                throw $e;
            } 
        }
        public function query_one($sql){
            $sql_args = array_slice(func_get_args(), 1);
            try {
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute($sql_args);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row;
            } catch (PDOException $e) {
                throw $e;
            } 
        }
        public function query_value($sql){
            $sql_args = array_slice(func_get_args(), 1);
            try {
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute($sql_args);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return array_values($row)[0];
            } catch (PDOException $e) {
                throw $e;
            } 
        }
    }
?>