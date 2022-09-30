<?php
    class product {
        private $process;
        public function __construct($process){
            $this->process = $process;
        }
        public function read(){
            $sql = "SELECT * FROM `tbl_products` INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate ORDER BY RAND() LIMIT 6" ;
            $read = $this->process->query($sql);
            return $read;
        }
        public function read_all(){
            $sql = "SELECT * FROM `tbl_products` INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate ORDER BY RAND()";
            $read = $this->process->query($sql);
            return $read;
        }
        public function create($name,$price,$image,$giam_gia,$ngay_nhap,$dac_biet,$description,$id_cate){
            if(empty($name) || empty($price) || empty($image) || empty($ngay_nhap) || empty($description) || empty($id_cate)){ 
                $alert = "Please enter your all fields to create a new products !";
                return $alert;
            }
            else {
                $sql = "INSERT INTO `tbl_products` SET `name_prd` = ?, `price` = ?, `image` = ?,`giam_gia` = ?, `ngay_nhap` = ?,`dac_biet` = ?,`description` = ?,`id_cate` = ?";
                $create_product = $this->process->query_sql($sql,$name,$price,$image,$giam_gia,$ngay_nhap,$dac_biet,$description,$id_cate);
                return $create_product;
            }
        }
        public function update($name,$price,$image,$giam_gia,$ngay_nhap,$dac_biet,$description,$id_cate,$id){
            if(empty($name) || empty($price) || empty($image) || empty($ngay_nhap) || empty($description) || empty($id_cate)){ 
                $alert = "Please enter your all fields to create a new products !";
                return $alert;
            }
            else {
                $sql = "UPDATE `tbl_products` SET `name_prd` = ?, `price` = ?, `image` = ?,`giam_gia` = ?, `ngay_nhap` = ?,`dac_biet` = ?,`description` = ?,`id_cate` = ? WHERE id_prd = ?";
                $update_product = $this->process->query_sql($sql,$name,$price,$image,$giam_gia,$ngay_nhap,$dac_biet,$description,$id_cate,$id);
                return $update_product;
            }
        }
        public function delete($id){ 
            if(empty($id)){
                $alert = "Please enter ID products !";
                return $alert;
            }
            else {
                $sql = "DELETE FROM `tbl_products` WHERE tbl_products.id_prd = ?";
                $delete_product = $this->process->query_sql($sql,$id);
                return $delete_product;
            }
        }
        public function detail($id){
            if(empty($id)){
                $alert = "Please enter ID User !";
                return $alert;
            }
            else {
                $sql = "SELECT * FROM `tbl_products`
                INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate
                WHERE `tbl_products`.id_prd = ?";
                $detail = $this->process->query_one($sql,$id);
                return $detail;
            }
        }
        public function top_product(){
            $sql = "SELECT * FROM `tbl_products` WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0,8";
            $top_view = $this->process->query($sql);
            return $top_view;
        }
        public function products_with_cate($id){
            if(empty($id)){
                $alert = "Please enter ID Products !";
                return $alert;
            }
            else {
                $sql = "SELECT * FROM `tbl_products` INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate WHERE `tbl_categories`.id_cate = ?";
                $detail = $this->process->query($sql,$id);
                return $detail;
            }
        }
        public function tang_view($id){
            if(empty($id)){
                $alert = "Please enter ID Products !";
                return $alert;
            }
            else {
                $sql = "UPDATE `tbl_products` SET so_luot_xem = so_luot_xem + 1 WHERE `tbl_products`.id_prd = ?";
                $detail = $this->process->query($sql,$id);
                return $detail;
            }
        }
    }
    include_once 'config/process.php';
    $handle_product = new product($process);
?>