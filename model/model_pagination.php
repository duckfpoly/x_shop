<?php 
    class pagination extends process {
        public function pagination_normal($id,$tbl){
            $sql = "SELECT count($id) as total from $tbl";
            $row = $this->query_one($sql);
            $total_records = $row['total'];
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 10;
            $total_page = ceil($total_records / $limit);
            if ($current_page > $total_page){
                $current_page = $total_page;
            }
            else if ($current_page < 1){
                $current_page = 1;
            }
            $start = ($current_page - 1) * $limit;
            $data_pani = "SELECT * FROM $tbl ORDER BY RAND() LIMIT $start, $limit";
            $row = $this->query($data_pani);
            $arr = [$row,$current_page,$total_page];
            return $arr;
        }
        public function pagination_with_filter($id,$tbl,$tbl_2,$record,$inner_join,$condition){
            $sql = "SELECT count($id) as total from $tbl
                    $inner_join
                    WHERE $tbl_2.$record LIKE '%$condition%'
            ";
            $row = $this->query_one($sql);
            $total_records = $row['total'];
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 10;
            $total_page = ceil($total_records / $limit);
            if ($current_page > $total_page){
                $current_page = $total_page;
            }
            else if ($current_page < 1){
                $current_page = 1;
            }
            $start = ($current_page - 1) * $limit;
            $data_pani = "SELECT * FROM $tbl 
                            $inner_join
                            WHERE $tbl_2.$record LIKE '%$condition%'
                            LIMIT $start, $limit ";
            $row = $this->query($data_pani);
            $arr = [$row,$current_page,$total_page];
            return $arr;
        }
    }

?>