<?php 
    include 'global.php';
    require_once 'model/model_process.php';
    require_once 'model/model_cate.php';
    require_once 'model/model_product.php';
    require_once 'model/model_comment.php';
    require_once 'model/model_user.php';
    require_once 'model/model_statistical.php';
    require_once 'model/model_blog.php';
    require_once 'model/model_cart.php';
    require_once 'model/model_order.php';
    $router = new Router();
    class Router {
        public function __construct(){
            $this->url          = $_SERVER['REQUEST_URI'];
            $this->client       = new Google_Client();
            $this->google_oauth = new Google_Service_Oauth2($this->client);
            $this->client->setClientId("860322000129-aa3jsl9jc2upei7jjitjeknhol9p552f.apps.googleusercontent.com");
            $this->client->setClientSecret("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");
            $this->client->addScope("email");
            $this->client->addScope("profile");
            $this->cate         = new categories();
            $this->product      = new product();
            $this->comment      = new comment();
            $this->user         = new user();
            $this->statistical  = new statistical();
            $this->blogs        = new blogs();
            $this->order        = new orders(); 
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

                elseif($v == "search")          {   $this->search();            }
                elseif($v == "cart")            {   $this->cart();              }
                elseif($v == "checkout")        {   $this->checkout();          }
                elseif($v == "confirm_order")   {   $this->confirm_order();     }
                elseif($v == "not_found")       {   $this->not_found();         }

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
            $sort = isset($_GET['sort']) ? $_GET['sort'] : '';
            if(isset($_GET['cate'])){
                $cate = $_GET['cate'];
                $read_prd = $this->product->product_cate($cate);
            }
            else{
                $read_prd = $this->product->read_all();
            }
            if($sort == 'price_desc'){
                $read_prd = $this->product->filter_price_desc(); 
            }
            elseif($sort == 'price_asc'){
                $read_prd = $this->product->filter_price_asc(); 
            }
            elseif($sort == 'name_desc'){
                $read_prd = $this->product->filter_name_desc(); 
            }
            elseif($sort == 'name_asc'){
                $read_prd = $this->product->filter_name_asc(); 
            }
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
            if(isset($_POST['update_info_user'])){
                $id_user        = Session::get('ID');
                $username       = $_POST['username'];
                $email          = $_POST['email'];
                $active         = Session::get('active');
                $name           = $_POST['name'];
                $image_goc      = $_POST['image'];
                $image_up       = $_FILES['image_update']['name'];
                if ($image_up == '') {
                    $image = $image_goc;
                } else {
                    $image = $image_up;
                    $image_uploads = save_file("image_update", "assets/uploads/admin/user/");
                }
                $vaitro = Session::get('vaitro');
                alert_2(
                    $update = $this->user->update($username, $name, $email, $image, $active, $vaitro, $id_user),
                    'Update successfully !',
                    'Has error in too processor !',
                    'profiles'
                );
            }
            if(isset($_POST['update_pass_user'])){
                $new_password = $_POST['new_password'];
                $id = Session::get('ID');
                alert_2(
                    $update = $this->user->change_password($new_password,$id),
                    'Update successfully !',
                    'Has error in too processor !',
                    'profiles'
                );
            }
            $detail = $this->user->detail(Session::get('ID'));
            include('view/site/profiles.php');
        }
        private function sign_in(){ 
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = $_POST['data'];
                $password = $_POST['password'];
                $user_login = $this->user->login($data,$password);
            }
            $this->client->setRedirectUri("http://localhost/xshop/?v=sign_in");
            if (isset($_GET['code'])) {
                $token = $this->client->fetchAccessTokenWithAuthCode($_GET['code']);
                $this->client->setAccessToken($token['access_token']);
                $google_account_info = $this->google_oauth->userinfo->get();
                $email =  $google_account_info->email;
                $user_login = $this->user->login_gg($email);
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
                    'sign_in'
                );
            };
            $this->client->setRedirectUri("http://localhost/xshop/?v=sign_up");
            if (isset($_GET['code'])) {
                $token = $this->client->fetchAccessTokenWithAuthCode($_GET['code']);
                $this->client->setAccessToken($token['access_token']);
                $google_account_info = $this->google_oauth->userinfo->get();
                $email      =  $google_account_info->email;
                $name_user  =  $google_account_info->name;
                $username   =  rand_username(6);
                $password   =  rand(0,9999990);
                $create     = $this->user->sign_up_gg($username,$name_user,$email,$password);
                $output     = '<p>Dear ,'.$name_user.'</p>';
                $output .= '
                    <h1>Đăng ký tài khoản thành công</h1>
                    <p>X Store xin được gửi tài khoản và mật khẩu của quý khách:</p>
                    <ul>
                        <li><strong>Tài khoản: </strong>'.$username.'</li>
                        <li><strong>Mật khẩu: </strong>'.$password.'</li>
                    </ul>
                '; 
                $output .= '
                    <p>Nếu không phải bạn đăng ký <br>
                    Vui lòng nhấn <a href="mailto:ndcake.store@gmai.com">vào đây</a> để gửi email liên hệ lại với chúng tôi 
                    hoặc có thể liên hệ trực tiếp qua số điện thoại: <a href="tel:+84823565831">+8482 3565 831</a></p>
                ';         
                $output .= '<p>Thanks,</p>';
                $output .= '<p>ADMIN X SHOP</p>';
                send_mail($email,$output);
            } 
            include 'view/site/account/sign_up.php'; 
        }
        private function sign_out(){ 
            Session::unset('user_login');
            Session::unset('ID');
            Session::unset('username');
            Session::unset('name');
            Session::unset('email');
            Session::unset('password');
            Session::unset('image');
            Session::unset('active');
            Session::unset('vaitro');
            echo ' <script language="javascript"> location.href = "?"; </script>';
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
        private function search(){
            if(isset($_POST['key'])){
                $key = $_POST['key'];
                $search = $this->product->searchs($key);
                include('view/site/search.php');
            }else {
                echo '<script language="javascript">window.location="?";</script>';
            }
        }
        private function cart(){
            if(isset($_POST['addcart'])){
                $id_prd             = isset($_POST['id_prd'])       ? $_POST['id_prd'] : "" ;
                $name_prd           = isset($_POST['name_prd'])     ? $_POST['name_prd'] : "" ;
                $price_prd          = isset($_POST['price_prd'])    ? $_POST['price_prd'] : "" ;
                $image_prd          = isset($_POST['image_prd'])    ? $_POST['image_prd'] : "" ;
                $quantity_prd       = isset($_POST['quantity_prd']) ? $_POST['quantity_prd'] : "" ;
                $addcart            = add_cart($id_prd,$name_prd,$price_prd,$image_prd,$quantity_prd);
                echo '<script language="javascript">window.location="?v=cart";</script>';
            }
            if(isset($_POST['delete_prd_cart'])){
                $id_prd             = isset($_POST['id_product']) ? $_POST['id_product'] : "" ;
                $del_product_cart   = delete_product_cart($id_prd);
                echo '<script language="javascript">window.location="?v=cart";</script>';
            }
            if(isset($_POST['update_prd_cart'])){
                $id_prd                 = isset($_POST['id_product'])   ? $_POST['id_product']  : "" ;
                $qty                    = isset($_POST['qty'])          ? $_POST['qty']         : "" ;
                $update_product_cart    = update_product_cart($id_prd,$qty);
                echo '<script language="javascript">window.location="?v=cart";</script>';
            }
            include('view/site/cart.php');
        }
        private function checkout(){
            if(isset($_POST['process_pay'])){
                // order code
                $order_code = rand(0,999999);
                // thời gian đặt hàng
                $order_date = date("Y-m-d H:i:s");
                // trạng thái đơn hàng (0: Chưa thanh toán - 1: Đã thanh toán)
                $order_status = 0;
                // thông tin khách hàng
                $name           = isset($_POST['name'])             ? $_POST['name']            : "" ;
                $email          = isset($_POST['email'])            ? $_POST['email']           : "" ;
                $phone          = isset($_POST['phone'])            ? $_POST['phone']           : "" ;
                $province       = isset($_POST['province'])         ? $_POST['province']        : "" ;
                $district       = isset($_POST['district'])         ? $_POST['district']        : "" ;
                $ward           = isset($_POST['ward'])             ? $_POST['ward']            : "" ;
                $address        = $province." ".$district." ".$ward;
                $address_detail = isset($_POST['address_detail'])   ? $_POST['address_detail']  : "" ;
                $message        = isset($_POST['message'])          ? $_POST['message']         : "" ;
                // Phương thức thanh toán và vận chuyển
                $order_pay      = isset($_POST['pay_option'])       ? $_POST['pay_option']      : "" ;
                $order_track   = isset($_POST['truck'])             ? $_POST['truck']           : "" ;
                // giỏ hàng
                if(Session::get('cart') == true){
                    foreach(Session::get('cart') as $key => $values){
                        $product_id         = $values['id_prd']; 
                        $product_quantity   = $values['quantity_prd']; 
                        // thêm từng sản phẩm vào table 
                        $add_order_detail   = $this->order->add_order_detail($order_code,$product_id,$product_quantity);
                    }
                }
                // tổng tiền
                $total_orders   = isset($_POST['total_orders'])    ? $_POST['total_orders'] : "" ;
                // insert db
                $add_order               = $this->order->add_order($order_code,$order_date,$order_status,$order_pay,$order_track,$total_orders);
                $add_order_customer      = $this->order->add_order_customer($name,$email,$phone,$address,$address_detail,$message,$order_code);
                // clear giỏ hàng
                unset($_SESSION['cart']);
                // view hiển thị đặt hàng thành công !
                echo '<script language="javascript">window.location="?v=confirm_order";</script>';
            }
            include('view/site/checkout.php');
        }
        private function confirm_order(){
            include('view/site/confirm_order.php');
        }
        private function not_found(){
            include('view/404notfound.php');
        }
    }
?>