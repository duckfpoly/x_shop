<?php
    $product = new product();
    class product extends process {
        public function read(){
            $sql = "SELECT * FROM `tbl_products` INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate ORDER BY RAND() LIMIT 6" ;
            $read = $this->query($sql);
            return $read;
        }
        public function read_all(){
            $sql = "SELECT * FROM `tbl_products` INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate ORDER BY RAND()";
            $read = $this->query($sql);
            return $read;
        }
        public function create($name,$price,$image,$giam_gia,$ngay_nhap,$dac_biet,$description,$id_cate){
            if(empty($name) || empty($price) || empty($image) || empty($ngay_nhap) || empty($description) || empty($id_cate)){ 
                $alert = "Please enter your all fields to create a new products !";
                return $alert;
            }
            else {
                $sql = "INSERT INTO `tbl_products` SET `name_prd` = ?, `price` = ?, `image` = ?,`giam_gia` = ?, `ngay_nhap` = ?,`dac_biet` = ?,`description` = ?,`id_cate` = ?";
                $create_product = $this->query_sql($sql,$name,$price,$image,$giam_gia,$ngay_nhap,$dac_biet,$description,$id_cate);
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
                $update_product = $this->query_sql($sql,$name,$price,$image,$giam_gia,$ngay_nhap,$dac_biet,$description,$id_cate,$id);
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
                $delete_product = $this->query_sql($sql,$id);
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
                $detail = $this->query_one($sql,$id);
                return $detail;
            }
        }
        public function top_product(){
            $sql = "SELECT * FROM `tbl_products` WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0,8";
            $top_view = $this->query($sql);
            return $top_view;
        }
        public function products_with_cate($id){
            if(empty($id)){
                $alert = "Please enter ID Products !";
                return $alert;
            }
            else {
                $sql = "SELECT * FROM `tbl_products` INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate WHERE `tbl_categories`.id_cate = ?";
                $detail = $this->query($sql,$id);
                return $detail;
            }
        }
        public function products_cart($id){
            if(empty($id)){
                $alert = "Please enter ID Products !";
                return $alert;
            }
            else {
                $sql = "SELECT * FROM `tbl_products`  INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate  WHERE tbl_products.id_prd IN (?)";
                $cart = $this->query($sql,$id);
                return $cart;
            }
        }
        public function tang_view($id){
            if(empty($id)){
                $alert = "Please enter ID Products !";
                return $alert;
            }
            else {
                $sql = "UPDATE `tbl_products` SET so_luot_xem = so_luot_xem + 1 WHERE `tbl_products`.id_prd = ?";
                $detail = $this->query($sql,$id);
                return $detail;
            }
        }
        public function product_cate($name){
            if(empty($name)){
                $alert = "Please enter name cate !";
                return $alert;
            }
            else {
                $sql = "SELECT * FROM `tbl_products`
                INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate
                WHERE `tbl_categories`.name_cate LIKE '%$name%'";
                $detail = $this->query($sql);
                return $detail;
            }
        }
        public function searchs($key){
            if(empty($key)){
                $alert = "Please enter search key !";
                return $alert;
            }
            else {
                $sql = "SELECT * FROM `tbl_products` WHERE tbl_products.name_prd LIKE '%$key%'";
                $search = $this->query($sql);
                return $search;
            }
        }
        public function filter_price_desc(){
            $sql = "SELECT * FROM `tbl_products`ORDER BY price DESC";
            $read = $this->query($sql);
            return $read;
        }
        public function filter_price_asc(){
            $sql = "SELECT * FROM `tbl_products` ORDER BY price ASC";
            $read = $this->query($sql);
            return $read;
        }
        public function filter_price_range(){
            $sql = "SELECT * FROM `tbl_products` WHERE price BETWEEN 1000000 AND 20000000";
            $read = $this->query($sql);
            return $read;
        }
        public function filter_name_desc(){
            $sql = "SELECT * FROM `tbl_products` ORDER BY name_prd DESC";
            $read = $this->query($sql);
            return $read;
        }
        public function filter_name_asc(){
            $sql = "SELECT * FROM `tbl_products` ORDER BY name_prd ASC";
            $read = $this->query($sql);
            return $read;
        }
        // public function filter_product_with_cate_asc($key){
        //     $sql = "SELECT * FROM `tbl_products`
        //     INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate
        //     WHERE `tbl_products`.name_cate LIKE '%$key%'";
        //     $read = $this->query_one($sql);
        //     return $read;
        // }
        public function filter_price_product_with_cate_desc($key){
            $sql = "SELECT * FROM `tbl_products`
            INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate
            WHERE `tbl_categories`.name_cate LIKE '%$key%'
            ORDER BY `tbl_products`.price DESC
            ";
            $read = $this->query($sql);
            return $read;
        }
        public function filter_price_product_with_cate_asc($key){
            $sql = "SELECT * FROM `tbl_products`
            INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate
            WHERE `tbl_categories`.name_cate LIKE '%$key%'
            ORDER BY `tbl_products`.price ASC
            ";
            $read = $this->query($sql);
            return $read;
        }
        public function filter_price_range_product_with_cate_asc($key,$min_price,$max_price){
            $sql = "SELECT * FROM `tbl_products`
            INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate
            WHERE `tbl_categories`.name_cate LIKE '%$key%'
            AND `tbl_products`.price BETWEEN $min_price AND $max_price
            ";
            $read = $this->query($sql);
            return $read;
        }
        public function filter_name_product_with_cate_desc($key){
            $sql = "SELECT * FROM `tbl_products`
            INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate
            WHERE `tbl_categories`.name_cate LIKE '%$key%'
            ORDER BY `tbl_products`.name_prd DESC
            ";
            $read = $this->query($sql);
            return $read;
        }
        public function filter_name_product_with_cate_asc($key){
            $sql = "SELECT * FROM `tbl_products`
            INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate
            WHERE `tbl_categories`.name_cate LIKE '%$key%'
            ORDER BY `tbl_products`.name_prd ASC
            ";
            $read = $this->query($sql);
            return $read;
        }
        public function panigation(){
            
        }
    }
?>