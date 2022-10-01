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

            $this->cate         = new categories();
            $this->product      = new product();
            $this->comment      = new comment();
            $this->user         = new user();
            $this->statistical  = new statistical();
            $this->blogs        = new blogs();

            if(isset($_GET['v']) == true){
                $v = $_GET['v'];
                if    ($v == "shop")            {   $this->shop();              }
                elseif($v == "blog")            {   $this->blog();              }
                elseif($v == "about")           {   $this->about();             }
                elseif($v == "contact")         {   $this->contact();           }
                elseif($v == "profiles")        {   $this->profiles();          }
                elseif($v == "feedback")        {   $this->feedback();          }

                elseif($v == "sign_in")         {   $this->sign_in();           }
                elseif($v == "sign_up")         {   $this->sign_up();           }
                elseif($v == "sign_out")        {   $this->sign_out();          }
                elseif($v == "blog_detail")     {   $this->blog_detail();       }
                elseif($v == "product_detail")  {   $this->product_detail();    }
            }
            else { 
                $this->home(); 
            }
        }
        private function home(){
            $read_prd = $this->product->read();
            $top_view = $this->product->top_product();
            include('view/site/home.php');
        }
        private function shop(){ 
            $read_cate = $this->cate->read();
            $read_prd = $this->product->read_all();
            require_once 'view/site/shop.php';
        }
        private function about(){ 
            include('view/site/about.php');
        }
        private function blog(){ 
            include('view/site/blog.php');
        }
        private function contact(){ 
            include('view/site/contact.php');
        }
        private function feedback(){ 
            include('view/site/feedback.php');
        }
        private function profiles(){ 
            include('view/site/profiles.php');
        }
        private function sign_in(){ 
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $user_login = $this->user->login($username,$password);
            }
            include 'view/site/account/sign_in.php';
        }
        private function sign_up(){ 
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $username     = isset($_POST['username']) ? $_POST['username'] : '';
                $password     = isset($_POST['password']) ? $_POST['password'] : '';
                $name         = isset($_POST['name']) ? $_POST['name'] : '';
                $email        = isset($_POST['email']) ? $_POST['email'] : '';
                if(isset($_FILES['image']['name'])){
                    $image = $_FILES['image']['name'];
                    $image_uploads = save_file("image", "assets/uploads/admin/user/");
                }
                else {
                    $image = 'user.png';
                }
                alert_2(
                    $create = $this->user->sign_up($username,$name,$email,$password,$image),
                    'Đăng ký tài khoản thành công !',
                    'Has error in too processor !',
                    '?v=sign_in'
                );
            };
            include 'view/site/account/sign_up.php'; 
        }
        private function sign_out(){ 
            Session::destroy();
        }
        private function blog_detail(){ 
        }
        private function product_detail(){ 
            $id = (int)$_GET['id'];
            $up_view = $this->product->tang_view($id);
            if(isset($_POST['cmt'])){
                $id_product = $id;
                $id_user = Session::get('ID');
                $comment_time = date("Y-m-d H:i:s");
                $content =  $_POST['comment'];
                $detail = $this->comment->create($id_product,$id_user,$comment_time,$content);
                echo '<script language="javascript">window.location="?v=product_detail&id=' . $id_product . '";</script>';
            }
            else {
                $detail = $this->product->detail($id);
                $list_with_cate = $this->product->products_with_cate($detail['id_cate']);
                $list_cmt = $this->comment->detail($id);
                $count = $this->comment->count_cmt($id);
                $data = total($detail['price'],$detail['giam_gia']);
                include('view/site/product_detail.php');
            }
        }
    }
?>