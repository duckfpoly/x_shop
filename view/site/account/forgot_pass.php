<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>X Shop</title>
    <link rel="icon" href="https://www.pngitem.com/pimgs/m/457-4579707_x-letter-logo-hd-png-download.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../css/signin.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>
<body class="login-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
        <div class="container">
            <div class="dropdown button-dropdown">
                <a href="#pablo" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
                <span class="button-bar"></span>
                <span class="button-bar"></span>
                <span class="button-bar"></span>
                </a>
            </div>
            <div class="navbar-translate">
                <a class="navbar-brand" href="../../../" rel="tooltip" title="Designed by Invision. Coded by Creative Tim" data-placement="bottom" target="_blank">
                X Shop
                </a>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../../../">Back to home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://duckfpoly.github.io/profiles/">About Admin</a>
                </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="page-header clear-filter">
        <div class="page-header-image" style="background-image:url('https://wallpaperaccess.com/full/2454628.png')"></div>
        <div class="content">
            <div class="container">
                <div class="col-md-4 ml-auto mr-auto">
                    <div class="card card-login card-plain">
                        <form class="form" method="post" action="" >
                            <div class="card-header text-center">
                                <div class="logo-container">
                                    <img src="../../../assets/logo.png" alt="">
                                </div>
                            </div>
                            <div id="container">
                                <div class="card-body" >
                                    <div class="input-group no-border input-lg">
                                        <input name="username" type="text" class="form-control" placeholder="Username...">
                                    </div>
                                    <div class="input-group no-border input-lg">
                                        <input name="Email" type="Email" placeholder="Email" class="form-control" />
                                    </div>
                                    <div class="mt-4">
                                        <?php
                                            if(isset($login_check)){
                                                echo '<span style="color:red;">'.$login_check.'</span>';
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary btn-round btn-lg btn-block mb-5">Reset Pass</button>
                                <div class="pull-right">
                                    <h6>
                                        <a href="sign_in.php" class="link">Return Sign In&emsp;<i class="fas fa-arrow-right"></i></a>
                                    </h6>
                                </div>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>