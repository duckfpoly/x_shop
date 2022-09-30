<?php 
    class process {
        public function __construct($db){
            $this->conn = $db;
        }
        public function query_sql($sql){
            $sql_args = array_slice(func_get_args(), 1);
            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->execute($sql_args);
                return $stmt;
            } catch (PDOException $e) {
                throw $e;
            } 
            // finally {
            //     unset($this->conn);
            // }
        }
        public function query($sql)
        {
            $sql_args = array_slice(func_get_args(), 1);
            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->execute($sql_args);
                $rows = $stmt->fetchAll();
                return $rows;
            } catch (PDOException $e) {
                throw $e;
            } 
            // finally {
            //     unset($this->conn);
            // }
        }
        public function query_one($sql)
        {
            $sql_args = array_slice(func_get_args(), 1);
            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->execute($sql_args);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row;
            } catch (PDOException $e) {
                throw $e;
            } 
            // finally {
            //     unset($this->conn);
            // }
        }
        public function query_value($sql)
        {
            $sql_args = array_slice(func_get_args(), 1);
            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->execute($sql_args);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return array_values($row)[0];
            } catch (PDOException $e) {
                throw $e;
            } 
            // finally {
            //     unset($this->conn);
            // }
        }
    }
    include_once 'database.php';
    $db = new db();
    $connect = $db->connect();
    $process = new process($connect);
?>