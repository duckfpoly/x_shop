<?php
    $product = new product();
    class product extends process {
        public function read(){
            $sql = "SELECT * FROM `tbl_products` INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate ORDER BY RAND() LIMIT 8" ;
            $read = $this->query($sql);
            return $read;
        }
        public function read_all(){
            $sql = "SELECT * FROM `tbl_products` INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate " ;
            $read = $this->query($sql);
            return $read;
        }
        public function create($name,$price,$image,$giam_gia,$ngay_nhap,$dac_biet,$description,$quantity,$id_cate){
            if(empty($name) || empty($price) || empty($image) || empty($ngay_nhap) || empty($description) || empty($id_cate)){ 
                $alert = "Please enter your all fields to create a new products !";
                return $alert;
            }
            else {
                $sql = "INSERT INTO `tbl_products` SET 
                `name_prd`      = ?, 
                `price`         = ?, 
                `image`         = ?,
                `giam_gia`      = ?, 
                `ngay_nhap`     = ?,
                `dac_biet`      = ?,
                `description`   = ?,
                `so_luong`      = ?,
                `id_cate`       = ?";
                $create_product = $this->query_sql($sql,$name,$price,$image,$giam_gia,$ngay_nhap,$dac_biet,$description,$quantity,$id_cate);
                return $create_product;
            }
        }
        public function update($name,$price,$image,$giam_gia,$dac_biet,$description,$quantity,$id_cate,$id){
            $sql = "UPDATE `tbl_products` SET `name_prd` = ?,`price` = ?,`image` = ?,`giam_gia` = ?,`dac_biet` = ?,`description` = ?,`so_luong` = ?,`ID_Cate` = ? WHERE id_prd = ? ";
            $update_product = $this->query_sql($sql,$name,$price,$image,$giam_gia,$dac_biet,$description,$quantity,$id_cate,$id);
            return $update_product;
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
                $alert = "Please enter ID Categories !";
                return $alert;
            }
            else {
                $sql = "SELECT * FROM `tbl_products` WHERE ID_Cate = ?";
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
        public function filter($prop,$ordinal){
            $sql = "SELECT * FROM `tbl_products` ORDER BY $prop $ordinal";
            $read = $this->query($sql);
            return $read;
        }
        public function filter_price_range($min,$max){
            $sql = "SELECT * FROM `tbl_products` WHERE `tbl_products`.price BETWEEN $min AND $max ORDER BY price ASC";
            $read = $this->query($sql);
            return $read;
        }
        public function filter_with_cate($key,$prop,$ordinal){
            $sql = "SELECT * FROM `tbl_products`
            INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate
            WHERE `tbl_categories`.name_cate LIKE '%$key%'
            ORDER BY `tbl_products`.$prop $ordinal
            ";
            $read = $this->query($sql);
            return $read;
        }
        public function filter_with_cate_2($key,$value){
            $sql = "SELECT * FROM `tbl_products`
            INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate
            WHERE `tbl_categories`.name_cate LIKE '%$key%'
            AND `tbl_products`.dac_biet = $value";
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
        public function filter_special($value){
            $sql = "SELECT * FROM `tbl_products` WHERE dac_biet = $value";
            $read = $this->query($sql);
            return $read;
        }
        public function list(){
            $page = new pagination();
            $pagination_normal = $page->pagination_normal('id_prd','tbl_products');
            return $pagination_normal;
        }
        public function filter_update($key){
            $page = new pagination();
            $id         = 'id_prd';
            $tbl        = 'tbl_products';
            $tbl_2      = 'tbl_categories';
            $record     = 'name_cate';
            $inner_join = 'INNER JOIN `tbl_categories` ON `tbl_products`.ID_Cate = `tbl_categories`.id_cate';
            $pagination_normal = $page->pagination_with_filter($id,$tbl,$tbl_2,$record,$inner_join,$key);
            return $pagination_normal;
        }
    }
?>