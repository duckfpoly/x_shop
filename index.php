<?php  
    session_start();
    include_once 'config/session.php';
?>
<!doctype html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>X SHOP</title>
    <link rel="icon" href="https://www.pngitem.com/pimgs/m/457-4579707_x-letter-logo-hd-png-download.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="src/CSS/styles.css">
    <link rel="stylesheet" href="css/aos.css">
</head>

<body>
    <div id="app">
    <a class="p-3 d-none animate__animated animate__fadeInUp" id="btn-back-to-top"><i class="fa-solid fa-circle-arrow-up"></i></a>
    <?php include 'view/site/layout/header.php' ?>
    <main>
        <?php include 'controller/site/router.php' ?>
    </main>
    <?php include 'view/site/layout/footer.php' ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="js/main.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/aos.js"></script>
    <script>
      AOS.init();
    </script>
</body>

</html>