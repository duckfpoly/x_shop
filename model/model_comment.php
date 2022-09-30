<?php
    class comment {
        private $process;
        public function __construct($process){
            $this->process = $process;
        }
        public function read(){
            $sql = "SELECT * FROM `tbl_comments`";
            $read = $this->process->query($sql);
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
            $read = $this->process->query($sql);
            return $read;
        }
        public function create($id_product,$id_user,$time,$content_cmt){
            if(empty($id_product)  || empty($id_user) || empty($time) || empty($content_cmt)){ 
                $alert = "Please enter your fields to create a new comment !";
                return $alert;
            }
            else {
                $sql = "INSERT INTO `tbl_comments` SET 
                `ID_Product` = ?,
                `ID_User` = ?,
                `time` = ?,
                `content` = ?
                ";
                $create_cate = $this->process->query_sql($sql,$id_product,$id_user,$time,$content_cmt);
                return $create_cate;
            }
        }
        public function delete($id){ 
            if(empty($id)){
                $alert = "Please enter ID Cate !";
                return $alert;
            }
            else {
                $sql = "DELETE FROM `tbl_comments` WHERE id_cmt = ?";
                $delete_cate = $this->process->query_sql($sql,$id);
                return $delete_cate;
            }
        }
        public function detail($id){
            if(empty($id)){
                $alert = "Please enter ID Comments !";
                return $alert;
            }
            else {
                $sql = "SELECT 
                `tbl_user`.name,
                `tbl_user`.image,
                `tbl_user`.username,
                `tbl_products`.name_prd,
                `tbl_products`.id_prd,
                `tbl_comments`.*
                FROM `tbl_comments`
                INNER JOIN `tbl_products` ON `tbl_products`.id_prd = `tbl_comments`.ID_Product
                INNER JOIN `tbl_user` ON `tbl_user`.ID = `tbl_comments`.ID_User 
                WHERE tbl_comments.ID_Product = ?";
                $detail = $this->process->query($sql,$id);
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
                $getCmt = $this->process->query_value($sql,$id);
                return $getCmt;
            }
        }
        
    }
    include_once 'config/process.php';
    $handle_comment = new comment($process);
?>