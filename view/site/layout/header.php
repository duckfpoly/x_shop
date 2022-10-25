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
                                <a class="nav-link" id="contact" href="contact">Contact</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="shop" href="#" id="navbarDropdown_2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Menu
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                    <a class="dropdown-item" href="feedback">Feedback</a>
                                    <a class="dropdown-item" href="check_order">Đơn hàng</a>
                                    <a class="dropdown-item" href="blog">Blog</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown" id="header_account">
                                <?php if(empty(Session::get('ID'))){ ?>
                            <a href="#">
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
                            <a href="#">
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
                                    <a href="cart" class="dropdown-toggle" data-bs-display="static" class="position-relative" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                        <span 
                                            class="position-absolute start-100 translate-middle badge rounded-pill bg-danger" 
                                            style="z-index: 10; top:-3px;" 
                                            id="count_cart-2">
                                            <?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : "0" ?>
                                        </span>
                                    </a>
                                    <div class="dropdown-menu bg-light" style="position: absolute; right: 0px;">
                                        <button id="show_cart" class="btn w-100">Xem giỏ hàng</button>    
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div id="acc">
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
