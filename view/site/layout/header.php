<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="?"> <img src="assets/logo_3.png" alt="logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>
                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link " id="home" href="home">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="shop" href="#" id="navbarDropdown_2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Shop
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                    <a class="dropdown-item " href="shop">All</a>
                                    <a class="dropdown-item" href="shop?cate=laptop">Laptop</a>
                                    <a class="dropdown-item" href="shop?cate=mobile">Mobile</a>
                                    <a class="dropdown-item" href="shop?cate=tablet">Tablet</a>
                                    <a class="dropdown-item" href="shop?cate=headphones">Headphones</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="about" href="about">about</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="blog" href="blog">blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact" href="contact">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="feedback" href="feedback">Feedback</a>
                            </li>
                            <li class="nav-item dropdown" id="header_account">
                                <?php if(empty(Session::get('ID'))){ ?>
                            <a href="#" >
                                <div class="dropdown show">
                                    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa-solid fa-user"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="sign_in"><i class="fa-solid fa-right-to-bracket" style="color:#fff !important; "></i>&emsp;Sign In</a>
                                        <a class="dropdown-item" href="sign_up"><i class="fa-solid fa-user-plus" style="color:#fff !important; "></i>&emsp;Sign Up</a>
                                    </div>
                                </div>
                            </a>
                            <?php } else { ?>
                            <a href="#" >
                                <div class="dropdown show">
                                    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img style="width: 30px;border-radius: 50%" src="assets/uploads/admin/user/<?= Session::get('image') ?>" alt="">&emsp;<?= Session::get('name') ?>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <?= Session::get('vaitro') == 1 ? '<a class="dropdown-item" href="admin"><i class="fa-solid fa-paper-plane" style="color:#fff !important; "></i>&emsp;Admin</a>' : '' ?>
                                        <a class="dropdown-item" href="profiles"><i class="fa-solid fa-address-card" style="color:#fff !important; "></i>&emsp;Profiles</a>
                                        <a class="dropdown-item" href="#"><i class="fa-solid fa-money-bill" style="color:#fff !important; "></i>&emsp;Bill</a>
                                        <a class="dropdown-item" href="sign_out"><i class="fa-solid fa-right-from-bracket" style="color:#fff !important; "></i>&emsp;Sign Out</a>
                                    </div>
                                </div>
                            </a>
                            <?php } ?>
                            </li>
                        </ul>
                    </div>
                    <div class="hearer_icon d-flex align-items-center justify-content-center">
                        <div>
                            <a id="search_1" href="#" >
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                        </div>
                        <div id="spc" style="padding-left: 15px;">
                            <a href="cart" id="cart-lg">
                                <div class="dropdown show ">
                                    <a class="dropdown-toggle" data-bs-display="static" class="position-relative" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                        <span 
                                            class="position-absolute start-100 translate-middle badge rounded-pill bg-danger" 
                                            style="z-index: 10; top:-3px;" 
                                            id="count_cart">
                                            <?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : "0" ?>
                                        </span>
                                    </a>
                                    <div class="dropdown-menu bg-light" style="position: absolute; right: 0px;">
                                        <?php if(isset($_SESSION['cart'])){ if(count($_SESSION['cart']) > 0 ){  $total = 0; ?>
                                        <div class="card" style="border:none">
                                            <div class="card-header fw-bold" >
                                                Giỏ hàng
                                            </div>
                                        </div>
                                        <div class="card-body overflow-auto" style="width: 450px; max-height: 242px;">
                                            <table class="table">
                                                <?php foreach($_SESSION['cart'] as $key => $values){
                                                        $subtotal = $values['price_prd'] * $values['quantity_prd']; $total += $subtotal;    
                                                ?>
                                                <form class="w-100">
                                                    <input type="hidden" id="id_product" value="<?= $values['id_prd'] ?>">
                                                    <tr>
                                                        <td>
                                                            <img class="rounded" style="width: 80px; height: 80px" src="assets/uploads/admin/products/<?= $values['image_prd'] ?>" alt="" />
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-between mb-2">
                                                                <span class="d-inline-block text-truncate" style="max-width: 150px;"><?= $values['name_prd'] ?></span>
                                                            </div>
                                                            <?= number_format($subtotal, 0, '', ',') ?>₫
                                                        </td>
                                                        <td>
                                                            <span>x<?= $values['quantity_prd'] ?></span><br>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-danger" type="button" id="delete_prd_cart" name="delete_prd_cart" value="delete_prd_cart"><i class="fa-solid fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                </form>
                                                <?php } ?>
                                            </table>
                                        </div>
                                        <div class="card-footer bg-transparent">
                                            <a href="cart" class="btn btn-outline-secondary">Xem giỏ hàng</a>
                                        </div>
                                        <?php } 
                                        else {
                                            echo '
                                                <div class="m-5" style="width:200px; height:200px">
                                                    <img src="https://bizweb.dktcdn.net/100/438/328/themes/836630/assets/empty-cart.png?1636877535162" alt="">
                                                </div>
                                            ';
                                        }
                                        } else {
                                            echo '
                                                <div class="m-5" style="width:200px; height:200px">
                                                    <img src="https://bizweb.dktcdn.net/100/438/328/themes/836630/assets/empty-cart.png?1636877535162" alt="">
                                                </div>
                                            ';
                                        } ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div style="padding-left:50px">
                            <?php if(empty(Session::get('ID'))){ ?>
                                <div class="dropdown show" id="account">
                                    <a class=" dropdown-toggle" data-bs-display="static" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img style="width: 30px; border-radius: 50%" src="https://cdn.icon-icons.com/icons2/2506/PNG/512/user_icon_150670.png" alt="">
                                    </a>
                                    <div class="dropdown-menu" style="position: absolute; right: 0px;">
                                        <a class="dropdown-item" href="sign_in"><i class="fa-solid fa-right-to-bracket" style="color:#fff !important; "></i>&emsp;Sign In</a>
                                        <a class="dropdown-item" href="sign_up"><i class="fa-solid fa-user-plus" style="color:#fff !important; "></i>&emsp;Sign Up</a>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="dropdown show" id="account">
                                    <a class=" dropdown-toggle" data-bs-display="static" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img style="width: 30px; border-radius: 50%" src="assets/uploads/admin/user/<?= Session::get('image') ?>" alt="">
                                    </a>
                                    <div class="dropdown-menu" style="position: absolute; right: 0px;">
                                        <a href=""> </a>
                                        <a class="dropdown-item" href="profiles">Hello, <?= Session::get('name') ?></a>
                                        <?= Session::get('vaitro') == 1 ? '<a class="dropdown-item" href="admin.php"><i class="fa-solid fa-paper-plane" style="color:#fff !important; "></i>&emsp;Admin</a>' : '' ?>
                                        <a class="dropdown-item" href="profiles"><i class="fa-solid fa-address-card" style="color:#fff !important; "></i>&emsp;Profiles</a>
                                        <a class="dropdown-item" href="#"><i class="fa-solid fa-money-bill" style="color:#fff !important; "></i>&emsp;Bill</a>
                                        <a class="dropdown-item" href="?v=sign_out"><i class="fa-solid fa-right-from-bracket" style="color:#fff !important; "></i>&emsp;Sign Out</a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container ">
            <form class="d-flex justify-content-between search-inner" method="post" action="search">
                <input type="text" class="form-control" name="key" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="ti-close" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>

<script>
    $(document).ready(function createItem() {
    $("#delete_prd_cart").click(function (e) {
        var delete_prd_cart = $("#delete_prd_cart").val();
        var id_prd = $("#id_product").val();
        var dataString =
            'delete_prd_cart=' + delete_prd_cart +
            '&id_product=' + id_prd;
        $.ajax({
            type: "POST",
            url: 'cart',
            data: dataString,
            success: function () {
                alert('Xóa thành công !');
                location.reload();
            }
        });
    });
});

</script>