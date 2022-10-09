<?php
    $handle_blog = new blogs();
    class blogs {
        public function __construct(){
            $this->process = new process();
        }
        public function read(){
            $sql = "SELECT * FROM `tbl_blogs`
            INNER JOIN `tbl_user` ON `tbl_blogs`.`user_post` = `tbl_user`.ID
            INNER JOIN `tbl_categories` ON `tbl_blogs`.`id_category` = `tbl_categories`.id_cate
            INNER JOIN `tbl_categories` ON `tbl_blogs`.`id_category` = `tbl_categories`.id_cate
            ";
            $read = $this->process->query($sql);
            return $read;
        }
        public function create($id_user,$time_post,$title,$content,$quote,$image,$id_category){
            if(empty($id_user) || empty($time_post) || empty($title) || empty($content) || empty($image) || empty($id_category)){ 
                $alert = "Please enter your fields to create a new blogs !";
                return $alert;
            }
            else {
                $sql = "INSERT INTO `tbl_blogs` SET 
                    `user_post`   = ? ,
                    `time_post`   = ? ,
                    `title`       = ? ,
                    `content`     = ? ,
                    `quote`       = ? ,
                    `image`       = ? ,
                    `id_category` = ? 
                ";
                $create_blog = $this->process->query_sql($sql,$id_user,$time_post,$title,$content,$quote,$image,$id_category);
                return $create_blog;
            }
        }
        public function update($id_user,$time_post,$title,$content,$quote,$image,$id_category,$id){
            if(empty($id_user) || empty($time_post) || empty($title) || empty($content) || empty($image) || empty($id_category) || empty($id)){ 
                $alert = "Please enter your fields to update blogs !";
                return $alert;
            }
            else {
                $sql = "UPDATE `tbl_blogs` SET 
                    `user_post`   = ? ,
                    `time_post`   = ? ,
                    `title`       = ? ,
                    `content`     = ? ,
                    `quote`       = ? ,
                    `image`       = ? ,
                    `id_category` = ?  
                WHERE id_blog = ? 
                ";
                $update_blog = $this->process->query_sql($sql,$id_user,$time_post,$title,$content,$quote,$image,$id_category,$id);
                return $update_blog;
            }
        }
        public function delete($id){ 
            if(empty($id)){
                $alert = "Please enter ID blog !";
                return $alert;
            }
            else {
                $sql = "DELETE FROM `tbl_blogs` WHERE id_blog = ?";
                $delete_blog = $this->process->query_sql($sql,$id);
                return $delete_blog;
            }
        }
        public function detail($id){
            if(empty($id)){
                $alert = "Please enter ID blog !";
                return $alert;
            }
            else {
                $sql = "SELECT * FROM `tbl_blogs` WHERE id_blog = ?";
                $detail = $this->process->query_one($sql,$id);
                return $detail;
            }
        }
    }
?>