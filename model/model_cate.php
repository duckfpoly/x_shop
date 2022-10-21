<?php
    $cate = new categories();
    class categories extends process{
        public function read(){
            $sql = "SELECT * FROM `tbl_categories`";
            $read = $this->query($sql);
            return $read;
        }
        public function create($name){
            if(empty($name)){ 
                $alert = "Please enter your fields to create a new category !";
                return $alert;
            }
            else {
                $sql = "INSERT INTO `tbl_categories` SET `name_cate` = ?";
                $create_cate = $this->query_sql($sql,$name);
                // return $create_cate;
            }
        }
        public function update($name,$id){
            if(empty($name)){ 
                $alert = "Please enter your fields to update !";
                return $alert;
            }
            else {
                $sql = "UPDATE `tbl_categories` SET `name_cate`= ? WHERE id_cate = ?";
                $update_cate = $this->query_sql($sql,$name,$id);
                return $update_cate;
            }
        }
        public function delete($id){ 
            if(empty($id)){
                $alert = "Please enter ID Cate !";
                return $alert;
            }
            else {
                $sql = "DELETE FROM `tbl_categories` WHERE id_cate = ?";
                $delete_cate = $this->query_sql($sql,$id);
                return $delete_cate;
            }
        }
        public function detail($id){
            if(empty($id)){
                $alert = "Please enter ID Cate !";
                return $alert;
            }
            else {
                $sql = "SELECT * FROM `tbl_categories` WHERE id_cate = ?";
                $detail = $this->query_one($sql,$id);
                return $detail;
            }
        }
        
    }
    
?>