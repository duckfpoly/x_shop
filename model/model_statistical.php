<?php
    class cate {
        private $process;
        public function __construct($process){
            $this->process = $process;
        }
        public function list(){
            $sql = "SELECT 
            `tbl_categories`.id_cate,
            `tbl_categories`.name_cate,
            COUNT(*) so_luong,
            MIN(`tbl_products`.price) price_min,
            MAX(`tbl_products`.price) price_max,
            AVG(`tbl_products`.price) price_avg
            FROM tbl_products 
            INNER JOIN tbl_categories ON tbl_categories.id_cate = tbl_products.ID_Cate
            GROUP BY `tbl_categories`.id_cate, `tbl_categories`.name_cate
            ";
            $read = $this->process->query($sql);
            return $read;
        }
    }
    include_once 'config/process.php';
    $handle_statistical = new cate($process);
?>