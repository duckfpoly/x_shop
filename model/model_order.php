<?php 
    $order = new orders();
    class orders extends process{
        public function customer($order_code){
            $sql = "SELECT * FROM `tbl_custromer` WHERE order_code = $order_code";
            $customer = $this->query($sql);
            return $customer;
        }
        public function orders($order_code){
            $sql = "SELECT * FROM `tbl_orders` WHERE order_code = $order_code";
            $orders = $this->query($sql);
            return $orders;
        }
        public function order_details($order_code){
            $sql = "SELECT * FROM `tbl_order_detail`
            INNER JOIN tbl_products ON tbl_products.id_prd = `tbl_order_detail`.product_id
            WHERE `tbl_order_detail`.order_code = $order_code
            ";
            $order_details = $this->query($sql);
            return $order_details;
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