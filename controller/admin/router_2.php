<?php 
    require_once 'model/model_process.php';

    require_once 'model/model_cate.php';
    require_once 'model/model_product.php';
    require_once 'model/model_comment.php';
    require_once 'model/model_user.php';
    require_once 'model/model_statistical.php';
    require_once 'model/model_blog.php';

    include 'global.php';

    $router = new Router();

    class Router {
        public function __construct(){

            $this->blogs        = new blogs();
            $this->cate         = new categories();
            $this->comment      = new comment();
            $this->product      = new product();
            $this->statistical  = new statistical();
            $this->user         = new user();

            isset($_GET['act']) == true ? $this->act = $_GET['act'] : $this->act = '';
            $this->url = $_SERVER['REQUEST_URI']; 

            if(isset($_GET['module']) == true){
                $module = $_GET['module'];
                if    ($module == "blogs")        {   $this->blogs();        }
                elseif($module == "categories")   {   $this->categories();   }
                elseif($module == "comments")     {   $this->comments();     }
                elseif($module == "products")     {   $this->products();     }
                elseif($module == "statisticals") {   $this->statisticals(); }
                elseif($module == "users")        {   $this->users();        }
            }
            else { 
                $this->home(); 
            }
        }
        private function home(){
            include('components/dashboard.php');
        }
        private function blogs(){ 
           
        }
        private function categories(){ 
            if($this->act == 'create'){
                include('view/admin/categories/add.php');
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $name = $_POST['name'];
                    alert(
                        $create = $this->cate->create($name),
                        'Add category successfully !',
                        'Has error in too processor !',
                        'categories'
                    );
                }
            }
            elseif($this->act  == 'update'){
                if(isset($_POST['update'])){
                    $id_cate = $_POST['id_cate'];
                    $name = $_POST['name'];
                    alert(
                        $update = $this->cate->update($name,$id_cate),
                        'Update category successfully !',
                        'Has error in too processor !',
                        'categories'
                    );
                }else {
                    $id = (int)$_GET['id'];
                    $read_one = $this->cate->detail($id);
                    include 'view/admin/categories/update.php';
                }
            }
            elseif($this->act == 'delete'){
                $id = (int)$_GET['id'];
                if($id){
                    alert(
                        $delete = $cate->delete($id),
                        'Delete category successfully !',
                        'Has error in too processor !',
                        'categories'
                    );
                }
            }
            else {
                $read = $this->cate->read();
                include('view/admin/categories/index.php');
            }
        }
        private function comments(){ 
            if($this->act == 'create'){
                include('view/admin/comment/add.php');
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $id_product = $_POST['id_product'];
                    $id_user = $_POST['id_user'];
                    $time = date("Y-m-d H:i:s");
                    $content_cmt = $_POST['content_cmt'];
                    alert(
                        $create = $this->comment->create($id_product,$id_user,$time,$content_cmt),
                        'Add comment successfully !',
                        'Has error in too processor !',
                        'comments'
                    );
                }
            }
            elseif($this->act == 'detail'){
                $id = (int)$_GET['id'];
                $detail = $this->comment->detail($id);
                $data = $this->product->detail($id);
                $name = $data['name_prd'];
                include('view/admin/comment/detail.php');
            }
            elseif($this->act == 'delete'){
                $id = (int)$_GET['id'];
                if($id){
                    $delete = $this->comment->delete($id);
                    header('Location: ?module=comments');
                }
            }
            else {
                $list = $this->comment->show_list();
                include('view/admin/comment/list.php');
            }
        }
        private function products(){ 
            if($this->act == 'create'){
                if(isset($_POST['add_product'])){
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $image = $_FILES['image']['name'];
                    $giam_gia = $_POST['giam_gia'];
                    $ngay_nhap = $_POST['date'];
                    $dac_biet = $_POST['special'];
                    $description = $_POST['description'];
                    $id_cate = $_POST['id_cate'];
                    $uploads = save_file("image", "assets/uploads/admin/products/");
                    alert(
                        $create = $this->product->create($name, $price, $image, $giam_gia, $ngay_nhap, $dac_biet, $description, $id_cate),
                        'Add products successfully !',
                        'Has error in too processor !',
                        'products'
                    );
                }
                else {
                    $cate = $this->cate->read();
                    include('view/admin/products/add.php');
                }
            }
            elseif($this->act == 'update'){
                $id = $_GET['id'];
                if(isset($_POST['update_product'])){
                    $id_product = $id;
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $image_goc = $_POST['image'];
                    $image_up = $_FILES['image_update']['name'];
                    if($image_up == ''){
                        $image = $image_goc;
                    }
                    else {
                        $image = $image_up;
                        $image_uploads = save_file("image_update", "assets/uploads/admin/products/");
                    }
                    $giam_gia = $_POST['giam_gia'];
                    $ngay_nhap = $_POST['date'];
                    $dac_biet = $_POST['special'];
                    $description = $_POST['description'];
                    $id_cate = $_POST['id_cate'];
                    $uploads = save_file("image_update", "assets/uploads/admin/products/");
                    alert(
                        $update = $this->product->update($name,$price,$image,$giam_gia,$ngay_nhap,$dac_biet,$description,$id_cate,$id_product),
                        'Update products successfully !',
                        'Has error in too processor !',
                        'products'
                    );
                }else {
                    $id = (int)$_GET['id'];
                    $cate = $this->cate->read();
                    $detail = $this->product->detail($id);
                    include('view/admin/products/update.php');
                }
            }
            elseif($this->act == 'delete'){
                $id = (int)$_GET['id'];
                if($id){
                    alert(
                        $delete = $this->product->delete($id),
                        'Delete products successfully !',
                        'Has error in too processor !',
                        'products'
                    );
                }
            }
            elseif($this->act == "detail"){
                $id = (int)$_GET['id'];
                $detail = $this->product->detail($id);
                include('view/admin/products/detail.php');
            }
            else {
                $read = $this->product->read_all();
                include('view/admin/products/index.php');
            }
        }
        private function statisticals(){ 
            if($this->act == 'chart'){
                $read = $this->statistical->list();
                include('view/admin/statistical/chart.php');
            }
            else {
                $read = $this->statistical->list();
                include('view/admin/statistical/index.php');
            }
        }
        private function users(){ 
            if ($this->act == 'create') {
                include('view/admin/users/add.php');
                if (isset($_POST['add_user'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $active = $_POST['active'];
    
                    $name = $_POST['name'];
                    $image = $_FILES['image']['name'];
                    $role = $_POST['role'];
    
                    $uploads = save_file("image", "assets/uploads/admin/user/");
                    alert(
                        $create = $this->user->create($username, $name, $email, $password, $image, $active, $role),
                        'Add User successfully !',
                        'Has error in too processor !',
                        'users'
                    );
                };
            } 
            elseif ($this->act == 'update') {
                $id = $_GET['id'];
                if (isset($_POST['update_user'])) {
                    $id_user = $id;
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $active = $_POST['active'];
                    $name = $_POST['name'];
                    $image_goc = $_POST['image'];
                    $image_up = $_FILES['image_update']['name'];
                    if ($image_up == '') {
                        $image = $image_goc;
                    } else {
                        $image = $image_up;
                        $image_uploads = save_file("image_update", "assets/uploads/admin/user/");
                    }
                    $vaitro = $_POST['role'];
                    alert(
                        $update = $this->user->update($username, $name, $email, $image, $active, $vaitro, $id_user),
                        'Update User successfully !',
                        'Has error in too processor !',
                        'users'
                    );
                } 
                else {
                    if ($id) {
                        $detail = $this->user->detail($id);
                        include('view/admin/users/update.php');
                    }
                }
            } 
            elseif ($this->act == 'delete') {
                $id = (int)$_GET['id'];
                if ($id) {
                    alert(
                        $delete = $this->user->delete($id),
                        'Delete User successfully !',
                        'Has error in too processor !',
                        'users'
                    );
                }
            } 
            else {
                $read = $this->user->read();
                include('view/admin/users/index.php');
            }
        }
    }
