<div class="sidebar">
    <div class="logo-details">
        <img width="80px" id="logo" class="p-2" style="border-radius: 50%;" src="https://www.pngitem.com/pimgs/m/457-4579707_x-letter-logo-hd-png-download.png" alt="">
        <span class="logo_name">XShop Admin</span>
    </div>
    <ul class="nav-links">
        <li id="home">
            <a href="?" >
                <i class='bx bx-grid-alt'></i>
                <span class="link_name">Dashboard</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="?">Dashboard</a></li>
            </ul>
        </li>
        <li id="cate">
            <a href="?module=categories">
                <i class='bx bx-collection'></i>
                <span class="link_name">Categories</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="?module=categories">Categories</a></li>
            </ul>
        </li>
        <li id="prd">
            <a href="?module=products">
                <i class='bx bx-book-alt'></i>
                <span class="link_name">Products</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="?module=products">Products</a></li>
            </ul>
        </li>
        <li id="cmt">
            <a href="?module=comments">
                <i class='bx bxs-comment' ></i>
                <span class="link_name">Comments</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="?module=comments">Comments</a></li>
            </ul>
        </li>
        <li id="sta">
            <a href="?module=statisticals">
                <i class='bx bx-line-chart'></i>
                <span class="link_name">Statistical</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="?module=statisticals">Statistical</a></li>
            </ul>
        </li>
        <li id="users">
            <a href="?module=users">
                <i class='bx bxs-user' ></i>
                <span class="link_name">Users</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="?module=users">Users</a></li>
            </ul>
        </li>
        <li>
            <div class="profile-details">
                <div class="profile-content">
                    <img width="75px" id="logo" class="p-2" style="border-radius: 50%;" src="assets/uploads/admin/user/<?= Session::get('image') ?>" alt="">
                </div>
                <div class="name-job">
                    <div class="profile_name"><?= Session::get('name') ?></div>
                    <div class="job">Manager</div>
                </div>
                <a href="?module=sign_out"><i class='bx bx-log-out'></i></a>
            </div>
        </li>
    </ul>
</div>
<script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e) => {
            let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
            arrowParent.classList.toggle("showMenu");
        });
    }
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    console.log(sidebarBtn);
    /* sidebarBtn.addEventListener("click", () => {
      sidebar.classList.toggle("close");
    }); */
    $(function() {
        /* console.log("width: "+ document.body.clientWidth); */

        resizeScreen();
        $(window).resize(function() {
            resizeScreen();
        });
        $('.bx-menu').click(function() {

            // 點選選單按鈕時，大螢幕為新增或移除.close，小螢幕新增或移除.small-screen預設有.close，
            if (document.body.clientWidth > 400) {
                $('.sidebar').toggleClass('close');
            } else {
                $('.sidebar').toggleClass('small-screen');
            }
        });

        function resizeScreen() {
            // 大螢幕.sidebar預設為沒有.close，小螢幕.sidebar預設為有.close
            if (document.body.clientWidth < 400) {
                $('.sidebar').addClass('close');
            } else {
                $('.sidebar').removeClass('close');
            }
        }
    });
</script>
<style>
    .nav-links li.active{
        background-color: cadetblue;
    }
    .nav-links li.active a .link_name,
    .nav-links li.active a i {
        color: #fff !important;
    }
    .sidebar {
        display: flex;
        flex-direction: column;
        margin-bottom: 0;
        min-height: 100vh;
        width: 260px;
        background: #fff;
        background-size: cover;
        z-index: 100;
        transition: all 0.5s ease;
    }

    .sidebar.close {
        width: 78px;
    }

    .sidebar .logo-details {
        height: 60px;
        width: 100%;
        display: flex;
        align-items: center;
    }

    .sidebar .logo-details i {
        font-size: 30px;
        color: #000;
        height: 50px;
        min-width: 78px;
        text-align: center;
        line-height: 50px;
    }

    .sidebar .logo-details .logo_name {
        font-size: 22px;
        color: #000;
        font-weight: 600;
        transition: 0.3s ease;
        transition-delay: 0.1s;
    }

    .sidebar.close .logo-details .logo_name {
        transition-delay: 0s;
        opacity: 0;
        pointer-events: none;
    }

    .sidebar .nav-links {
        height: 100%;
        padding: 30px 0 100px 0;
        overflow: auto;
    }

    .sidebar.close .nav-links {
        overflow: visible;
    }

    .sidebar .nav-links::-webkit-scrollbar {
        display: none;
    }

    .sidebar .nav-links li {
        position: relative;
        list-style: none;
        transition: all 0.4s ease;
    }

    .sidebar .nav-links li:hover {
        background: cadetblue;
        color: #fff;
    }

    .sidebar .nav-links li:hover a .link_name,
    .sidebar .nav-links li:hover a i {
        color: #fff ;
    }

    .profile-details a i:hover,
    .profile-details:hover a i {
        color : cadetblue !important;
    }

    .sidebar .nav-links li .icon-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .sidebar.close .nav-links li .icon-link {
        display: block
    }

    .sidebar .nav-links li i {
        height: 50px;
        min-width: 78px;
        text-align: center;
        line-height: 50px;
        color: #000;
        font-size: 20px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .sidebar .nav-links li.showMenu i.arrow {
        transform: rotate(-180deg);
    }

    .sidebar.close .nav-links i.arrow {
        display: none;
    }

    .sidebar .nav-links li a {
        display: flex;
        align-items: center;
        text-decoration: none;
    }

    .sidebar .nav-links li a .link_name {
        font-size: 18px;
        font-weight: 400;
        color: #000;
        transition: all 0.4s ease;
    }

    .sidebar.close .nav-links li a .link_name {
        opacity: 0;
        pointer-events: none;
    }

    .sidebar .nav-links li .sub-menu {
        padding: 6px 6px 14px 80px;
        margin-top: -10px;
        background: #fff;
        display: none;
    }

    .sidebar .nav-links li.showMenu .sub-menu {
        display: block;
    }

    .sidebar .nav-links li .sub-menu a {
        color: #000 !important;
        font-size: 15px;
        padding: 5px 0;
        white-space: nowrap;
        opacity: 0.6;
        transition: all 0.3s ease;
    }

    .sidebar .nav-links li .sub-menu a:hover {
        opacity: 1;
    }

    .sidebar.close .nav-links li .sub-menu {
        position: absolute;
        left: 100%;
        top: -10px;
        margin-top: 0;
        padding: 10px 20px;
        border-radius: 0 6px 6px 0;
        opacity: 0;
        display: block;
        pointer-events: none;
        transition: 0s;
    }

    .sidebar.close .nav-links li:hover .sub-menu {
        top: 0;
        opacity: 1;
        pointer-events: auto;
        transition: all 0.4s ease;
    }

    .sidebar .nav-links li .sub-menu .link_name {
        display: none;
    }

    .sidebar.close .nav-links li .sub-menu .link_name {
        font-size: 18px;
        opacity: 1;
        display: block;
    }

    .sidebar .nav-links li .sub-menu.blank {
        opacity: 1;
        pointer-events: auto;
        padding: 3px 20px 6px 16px;
        opacity: 0;
        pointer-events: none;
    }

    .sidebar .nav-links li:hover .sub-menu.blank {
        top: 50%;
        transform: translateY(-50%);
    }

    .sidebar .profile-details {
        position: fixed;
        bottom: 0;
        width: 260px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #fff;
        padding: 12px 0;
        transition: all 0.5s ease;
    }

    .sidebar.close .profile-details {
        background: none;
    }
    .sidebar.close .profile-details {
        width: 78px;
    }
    .sidebar .profile-details .profile-content {
        display: flex;
        align-items: center;
    }

    .sidebar .profile-details img {
        height: 52px;
        width: 52px;
        object-fit: cover;
        border-radius: 16px;
        margin: 0 14px 0 12px;
        /* background: #1d1b31; */
        transition: all 0.5s ease;
    }

    .sidebar.close .profile-details img {
        padding: 10px;
    }

    .sidebar .profile-details .profile_name,
    .sidebar .profile-details .job {
        color: #000 !important;
        font-size: 18px;
        font-weight: 500;
        white-space: nowrap;
    }

    .sidebar.close .profile-details i,
    .sidebar.close .profile-details .profile_name,
    .sidebar.close .profile-details .job {
        display: none;
    }

    .sidebar .profile-details .job {
        font-size: 12px;
    }

    .home-section {
        position: relative;
        /* background: #E4E9F7; */
        min-height: 100%;
        left: 0px;
        width: calc(100% - 260px);
        transition: all 0.5s ease;
    }

    .sidebar.close~.home-section {
        left: 0px;
        width: calc(100% - 78px);
    }

    .home-section .home-content {
        height: 60px;
        display: flex;
        align-items: center;
    }

    .home-section .home-content .bx-menu,
    .home-section .home-content .text {
        color: #000 !important;
        font-size: 35px;
    }

    .home-section .home-content .bx-menu {
        margin: 0 15px;
        cursor: pointer;
    }

    .home-section .home-content .text {
        font-size: 26px;
        font-weight: 600;
    }

    @media (max-width: 400px) {

        .sidebar.close.small-screen {
            width: 0;
        }

        .sidebar.close.small-screen~.home-section {
            width: 100%;
            left: 0;
            z-index: 100;
        }
    }
</style>