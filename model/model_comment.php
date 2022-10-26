<?php
    $comment = new comment();
    class comment extends process{
        public function read(){
            $sql = "SELECT * FROM `tbl_comments`";
            $read = $this->query($sql);
            return $read;
        }
        public function show_list(){
            $sql = "SELECT 
            `tbl_products`.id_prd,
            `tbl_products`.name_prd,
            COUNT(*) so_luong,
            MIN(`tbl_comments`.time) cu_nhat,
            MAX(`tbl_comments`.time) moi_nhat
            FROM tbl_comments 
            INNER JOIN tbl_products ON tbl_products.id_prd = tbl_comments.ID_Product
            GROUP BY `tbl_products`.id_prd, `tbl_products`.name_prd
            HAVING so_luong > 0
            ";
            $read = $this->query($sql);
            return $read;
        }
        public function create($id_product,$img_client,$name_client,$time,$content_cmt){
            if(empty($id_product)  || empty($img_client) || empty($name_client) || empty($time) || empty($content_cmt)){ 
                $alert = "Please enter your fields to create a new comment !";
                return $alert;
            }
            else {
                $sql = "INSERT INTO `tbl_comments` SET 
                `ID_Product`    = ?,
                `image_client`  = ?,
                `name_client`   = ?,
                `time`          = ?,
                `content`       = ? 
                ";
                $create_cmt = $this->query_sql($sql,$id_product,$img_client,$name_client,$time,$content_cmt);
                return $create_cmt;
            }
        }
        public function delete($id){ 
            if(empty($id)){
                $alert = "Please enter ID comments !";
                return $alert;
            }
            else {
                $sql = "DELETE FROM `tbl_comments` WHERE id_cmt = ?";
                $delete_cmt = $this->query_sql($sql,$id);
                return $delete_cmt;
            }
        }
        public function detail($id){
            if(empty($id)){
                $alert = "Please enter ID Comments !";
                return $alert;
            }
            else {
                $sql = "SELECT 
                `tbl_products`.id_prd,
                `tbl_products`.name_prd,
                `tbl_comments`.*
                FROM `tbl_comments`
                INNER JOIN `tbl_products` ON `tbl_products`.id_prd = `tbl_comments`.ID_Product
                WHERE tbl_comments.ID_Product = ?
                ORDER BY `tbl_comments`.id_cmt DESC
                ";
                $detail = $this->query($sql,$id);
                return $detail;
            }
        }
        public function count_cmt($id){
            if(empty($id)){
                $alert = "Please enter ID Products !";
                return $alert;
            }
            else {
                $sql = "SELECT COUNT(*) so_cmt FROM `tbl_comments` WHERE tbl_comments.ID_Product = ?";
                $getCmt = $this->query_value($sql,$id);
                return $getCmt;
            }
        }
    }
    
?>