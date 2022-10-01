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
                                <a class="nav-link" id="home" href="?">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="shop" href="?v=shop">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="about" href="?v=about">about</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="blog" href="?v=blog">blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact" href="?v=contact">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="feedback" href="?v=feedback">Feedback</a>
                            </li>

                            <li class="nav-item dropdown" id="header_account">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Account
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                    <a class="dropdown-item" href="#">Sign In</a>
                                    <a class="dropdown-item" href="#">Sign Up</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="hearer_icon d-flex align-items-center">
                        <a id="search_1" href="javascript:void(0)"><i class="fa-solid fa-magnifying-glass"></i></a>
                        <a href="#" class="dropdown">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                        <?php if(empty(Session::get('ID'))){ ?>
                            <a href="#">
                                <div class="dropdown show" id="account">
                                    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa-solid fa-user"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="?v=sign_in"><i class="fa-solid fa-right-to-bracket" style="color:#fff !important; "></i>&emsp;Sign In</a>
                                        <a class="dropdown-item" href="?v=sign_up"><i class="fa-solid fa-user-plus" style="color:#fff !important; "></i>&emsp;Sign Up</a>
                                    </div>
                                </div>
                            </a>
                        <?php } else { ?>
                            <a href="#" style="padding-left: 5px;">
                                <div class="dropdown show" id="account">
                                    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img style="width: 30px;border-radius: 50%" src="assets/uploads/admin/user/<?= Session::get('image') ?>" alt="">
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a href=""> </a>
                                        <a class="dropdown-item" href="?v=profiles">Hello, <?= Session::get('name') ?></a>
                                        <?= Session::get('vaitro') == 1 ? '<a class="dropdown-item" href="admin.php"><i class="fa-solid fa-paper-plane" style="color:#fff !important; "></i>&emsp;Admin</a>' : '' ?>
                                        <a class="dropdown-item" href="?v=profiles"><i class="fa-solid fa-address-card" style="color:#fff !important; "></i>&emsp;Profiles</a>
                                        <a class="dropdown-item" href="#"><i class="fa-solid fa-money-bill" style="color:#fff !important; "></i>&emsp;Bill</a>
                                        <a class="dropdown-item" href="?v=sign_out"><i class="fa-solid fa-right-from-bracket" style="color:#fff !important; "></i>&emsp;Sign Out</a>
                                    </div>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container ">
            <form class="d-flex justify-content-between search-inner" method="post" action="?v=search">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="ti-close" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>
<!-- Header part end-->