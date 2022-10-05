<?php 
    $order = new orders();
    class orders extends process{
        public function list_order(){
            $sql = "SELECT * FROM `tbl_orders`";
            $list = $this->query($sql);
            return $list;
        }
        public function order_detail(){
            $sql = "SELECT * FROM `tbl_order_detail`,`tbl_orders`,`tbl_custromer`,tbl_products
            WHERE `tbl_order_detail`.order_code = `tbl_orders`.order_code
            AND `tbl_order_detail`.product_id = `tbl_products`.id_prd
            AND `tbl_orders`.id_customer = `tbl_custromer`.id_customer
            ";
            $detail_order = $this->query($sql);
            return $detail_order;
        }
        public function list_order_width_customer($id){
            $sql = "SELECT * FROM `tbl_orders`,`tbl_custromer`
            WHERE `tbl_orders`.id_customer = `tbl_custromer`.id_customer
            AND `tbl_order_detail`.product_id = `tbl_products`.id_prd
            AND `tbl_custromer`.id_customer = ?
            ";
            $list_with_user = $this->query($sql,$id);
            return $list_with_user;
        }
        public function order_detail_width_customer($id){
            $sql = "SELECT * FROM `tbl_order_detail`,`tbl_orders`,`tbl_custromer`,tbl_products
            WHERE `tbl_order_detail`.order_code = `tbl_orders`.order_code
            AND `tbl_order_detail`.product_id = `tbl_products`.id_prd
            AND `tbl_orders`.id_customer = `tbl_custromer`.id_customer
            AND `tbl_custromer`.id_customer = ?
            ";
            $detail_with_user = $this->query($sql,$id);
            return $detail_with_user;
        }
        public function add_order($order_code,$order_date,$order_status,$order_pay,$order_method,$total){
            $sql = "INSERT INTO `tbl_orders` SET
                `order_code`    = ?, 
                `order_date`    = ?, 
                `order_status`  = ?, 
                `order_pay`     = ?, 
                `order_method`  = ?,
                `total`         = ?
                ";
            $add_order = $this->query_sql($sql,$order_code,$order_date,$order_status,$order_pay,$order_method,$total);
            return $add_order;
        }
        public function add_order_detail($order_code,$id_product,$product_quantity){
            $sql = "INSERT INTO `tbl_order_detail` SET
                `order_code`        = ?, 
                `product_id`        = ?, 
                `product_quantity`  = ? 
            ";
            $add_order_detail = $this->query_sql($sql,$order_code,$id_product,$product_quantity);
            return $add_order_detail;
        }
        public function add_order_customer($name,$email,$phone,$address,$address_detail,$message,$order_code){
            $sql = "INSERT INTO `tbl_custromer` SET
                `name`              = ?, 
                `email`             = ?, 
                `phone`             = ?, 
                `address`           = ?, 
                `address_detail`    = ?, 
                `message`           = ?, 
                `order_code`        = ?
            ";
            $add_order_customer = $this->query_sql($sql,$name,$email,$phone,$address,$address_detail,$message,$order_code);
            return $add_order_customer;
        }
    }

?>