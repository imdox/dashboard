<?php 
session_start();
require_once 'core/config/config.php';
include("functions.php");
$isLogin = false;
if (isset($_SESSION['i_user_logged_in'])) :
	$isLogin = $_SESSION['i_user_logged_in'];
	if (!$isLogin) :
        unset($_SESSION['i_user_logged_in']);
        unset($_SESSION['i_user_id']);
        header('Location: signup.php');
    else:
       $userId =  $_SESSION['i_user_id'];
       $db = getDbInstance();
       $userData = $db->rawQuery("select * from users where id = ".$userId .";");
    endif;;
endif;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RCP London-Iraq Members and Fellows Network</title>

    <!-- Primary Meta Tags -->
    <meta name="title" content="RCP London-Iraq Members and Fellows Network">
    <meta name="description" content="The RCP's core mission is to drive improvements in health and healthcare through advocacy, education and research">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://rcpiraqnetwork.com/">
    <meta property="og:title" content="RCP London-Iraq Members and Fellows Network">
    <meta property="og:description" content="The RCP's core mission is to drive improvements in health and healthcare through advocacy, education and research">
    <meta property="og:image" content="https://rcpiraqnetwork.com/Test/assets/images/logo/logo.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://rcpiraqnetwork.com/">
    <meta property="twitter:title" content="RCP London-Iraq Members and Fellows Network">
    <meta property="twitter:description" content="The RCP's core mission is to drive improvements in health and healthcare through advocacy, education and research">
    <meta property="twitter:image" content="https://rcpiraqnetwork.com/Test/assets/images/logo/logo.png">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/logo/logo.png" type="image/svg" />

    <!-- ===== All CSS files ===== -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link rel="stylesheet" href="assets/css/lineicons.css" />
    <link rel="stylesheet" href="assets/css/ud-styles.css" />
    <link rel="stylesheet" href="assets/css/p_style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
            
        .myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
        }

        .myImg:hover {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100%;
            width: 100%;
            opacity: 0.2;
            transition: .5s ease;
            background-color: #008CBA;
        }

        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 99999; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        }

        /* Caption of Modal Image */
        #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
        }

        /* Add Animation */
        .modal-content, #caption {  
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
        from {-webkit-transform:scale(0)} 
        to {-webkit-transform:scale(1)}
        }

        @keyframes zoom {
        from {transform:scale(0)} 
        to {transform:scale(1)}
        }

        /* The Close Button */
        .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
        }

        .close:hover,
        .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px){
        .modal-content {
            width: 100%;
        }
        }

        .centerSc{
            display: -webkit-flexbox;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-flex-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
            justify-content: center;
        }


        .mainImg {
        position: relative;
        width: 100%;
        height:100%;
        }

        .image {
        display: block;
        width: 100%;
        height: auto;
        }

        .overlay {
            width: 100%;
            height: 50%;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #008CBA;
            overflow: hidden;
            width: 100%;
            height: 0;
            transition: .5s ease;
        }

        .mainImg:hover .overlay {
        opacity: 1;
        height:40%;
        }

        .textArea {
        width:100%;
        padding:10px;
        color: white !important;
        font-size: 20px;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
        text-align: center;
        }

    </style>
</head>

<body>
    <!-- ====== Header Start ====== -->
    <div>
        <header class="ud-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.php" style="margin:10px;height:120px;">
                                <img src="assets/images/logo/logo.png" style="opacity:0;" alt="Logo" />
                            </a>
                            <button class="navbar-toggler">
                            <span class="toggler-icon" style="background-color:#000 !important;"> </span>
                            <span class="toggler-icon" style="background-color:#000 !important;"> </span>
                            <span class="toggler-icon" style="background-color:#000 !important;"> </span>
                            </button>

                            <div class="navbar-collapse" style="margin-top: 15px;">
                                <ul id="nav" class="navbar-nav mx-auto">
                                    <li class="nav-item">
                                        <a class="ud-menu-scroll" href="index.php">Home</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="ud-menu-scroll" href="about.php">About Us</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="ud-menu-scroll" href="course.php">Our Courses</a>
                                    </li>


                                    <li class="nav-item">
                                        <a class="ud-menu-scroll" href="event_n_training.php">Events and training</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="ud-menu-scroll" href="media_center.php">Media center</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="ud-menu-scroll" href="contact.php">Contact Us</a>
                                    </li>

                                    <?php 	if (!$isLogin) : ?>
                                    <li class="nav-item">
                                        <a class="ud-menu-scroll" href="signup.php">Login/Register</a>
                                    </li>
                                    <?php endif; ?>

                                    <?php 	if ($isLogin) : ?>
                                        <li class="nav-item nav-item-has-children">
                                            <a href="javascript:void(0)"> <?php echo $userData[0]['f_name']; ?> </a>
                                            <ul class="ud-submenu">
                                            <li class="ud-submenu-item">
                                                <a href="profile.php" class="ud-submenu-link">
                                                Profile Page
                                                </a>
                                            </li>
                                            <li class="ud-submenu-item">
                                                <a href="logout.php" class="ud-submenu-link">
                                                Logout
                                                </a>
                                            </li>
                                            </ul>
                                        </li>
                                    <?php endif; ?>

                                </ul>
                            </div>
                            <!-- <div class="navbar-btn d-none d-sm-inline-block">
                                <a class="navbar-brand" href="index.php" style="margin:10px;">
                                    <img src="assets/images/logo/logo2.png" alt="Logo" />
                                </a>
                            </div> -->
                        </nav>
                    </div>
                </div>
            </div>
        </header>
    </div> 
    <!-- ====== Header End ====== -->

    <!-- ====== Banner Start ====== -->
        <section class="ud-hero" id="home">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ud-hero-content wow fadeInUp" data-wow-delay=".2s">
                                <h4 class="ud-hero-title">
                                Media Center
                                </h4>
                            </div>
                            <div class="ud-hero-brands-wrapper wow fadeInUp"></div>
                        </div>
                    </div>
                </div>
        </section>
    <!-- ====== Banner End ====== -->

    <section class="portfolio" id="Portfolio">
        <div class="container">
            <!-- <div class="row">
                <div class="section-title text-center">
                    <h1>Portfolio Filter</h1>
                </div>
            </div> -->
           
            <div class="row">
                <div class="filter-buttons">
                    <ul id="filter-btns">
                        <li class="active" data-target="all">ALL</li>
                        <li data-target="Image">Image</li>
                        <li data-target="Video">Video</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="portfolio-gallery">
                    <div class="item" data-id="Image">
                        <div class="inner" style="height:100%;">
                            <div class="ud-single-blog">
                                <div class="ud-blog-image" style="height:300px;" onclick="openModal('1-myModal')">
                                    <img src="assets/images/blog/1.jpg" alt="blog" style="height:100%;object-fit: cover;" />
                                </div>
                                <div class="ud-blog-content">
                                    <h5 style="color:#000;">
                                        How to earn more money as a wellness coach
                                    </h5>
                                    <p class="ud-blog-desc">
                                        Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry.
                                    </p>
                                </div>
                                <div id="1-myModal" class="modal">
                                    <span class="close" onclick="closeModal('1-myModal')">&times;</span>
                                    <div  class="centerSc">
                                    <img class="modal-content" src="assets/images/blog/1.jpg" id="img01">
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div>
                    <div class="item" data-id="Video">
                        <div class="inner" style="height:100%;">
                            <div class="ud-single-blog">
                                <div class="ud-blog-image" style="height:300px;" onclick="openModal('2-myModal')">
                                    <img src="assets/images/blog/2.jpeg" alt="blog" style="height:100%;object-fit: cover;" />
                                </div>
                                <div class="ud-blog-content">
                                    <h5 style="color:#000;">
                                        How to earn more money as a wellness coach
                                    </h5>
                                    <p class="ud-blog-desc">
                                        Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry.
                                    </p>
                                </div>
                                <div id="2-myModal" class="modal">
                                    <span class="close" onclick="closeModal('2-myModal')">&times;</span>
                                    <div  class="centerSc">
                                    <iframe class="responsive-iframe" width="560" height="315" src="https://www.youtube.com/embed/qzsidFlfhMQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div>
                    <div class="item" data-id="Image">
                        <div class="inner" style="height:100%;">
                            <div class="ud-single-blog">
                                <div class="ud-blog-image" style="height:300px;" onclick="openModal('3-myModal')">
                                    <img src="assets/images/blog/3.jpg" alt="blog" style="height:100%;object-fit: cover;" />
                                </div>
                                    <div class="ud-blog-content">
                                        <h5 style="color:#000;">
                                            How to earn more money as a wellness coach
                                        </h5>
                                        <p class="ud-blog-desc">
                                            Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry.
                                        </p>
                                    </div>
                                    <div id="3-myModal" class="modal">
                                        <span class="close" onclick="closeModal('3-myModal')">&times;</span>
                                        <div  class="centerSc">
                                        <img class="modal-content" src="assets/images/blog/3.jpg" id="img01">
                                    </div>  
                                </div>
                            </div>
                            </div>
                    </div>
                    <div class="item" data-id="Video">
                        <div class="inner" style="height:100%;">
                            <div class="ud-single-blog">
                                <div class="ud-blog-image" style="height:300px;" onclick="openModal('4-myModal')">
                                    <img src="assets/images/blog/4.jpg" alt="blog" style="height:100%;object-fit: cover;" />
                                </div>
                                <div class="ud-blog-content">
                                    <h5 style="color:#000;">
                                        How to earn more money as a wellness coach
                                    </h5>
                                    <p class="ud-blog-desc">
                                        Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry.
                                    </p>
                                </div>
                                <div id="4-myModal" class="modal">
                                    <span class="close" onclick="closeModal('4-myModal')">&times;</span>
                                    <div  class="centerSc">
                                    <iframe class="responsive-iframe" width="560" height="315" src="https://www.youtube.com/embed/qzsidFlfhMQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div>
                    <div class="item" data-id="Image">
                        <div class="inner" style="height:100%;">
                            <div class="ud-single-blog">
                                <div class="ud-blog-image" style="height:300px;" onclick="openModal('5-myModal')">
                                    <img src="assets/images/blog/5.jpg" alt="blog" style="height:100%;object-fit: cover;" />
                                </div>
                                <div class="ud-blog-content">
                                    <h5 style="color:#000;">
                                        How to earn more money as a wellness coach
                                    </h5>
                                    <p class="ud-blog-desc">
                                        Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry.
                                    </p>
                                </div>
                                <div id="5-myModal" class="modal">
                                    <span class="close" onclick="closeModal('5-myModal')">&times;</span>
                                    <div  class="centerSc">
                                    <img class="modal-content" src="assets/images/blog/5.jpg" id="img01"></div>
                                </div>
                            </div>
                            </div>
                    </div>
                    <div class="item" data-id="Video">
                        <div class="inner" style="height:100%;">
                            <div class="ud-single-blog">
                                <div class="ud-blog-image" style="height:300px;" onclick="openModal('6-myModal')">
                                    <img src="assets/images/blog/6.jpeg" alt="blog" style="height:100%;object-fit: cover;" />
                                </div>
                                <div class="ud-blog-content">
                                    <h5 style="color:#000;">
                                        How to earn more money as a wellness coach
                                    </h5>
                                    <p class="ud-blog-desc">
                                        Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry.
                                    </p>
                                </div>
                                <div id="6-myModal" class="modal">
                                    <span class="close" onclick="closeModal('6-myModal')">&times;</span>
                                    <div  class="centerSc">
                                    <iframe class="responsive-iframe" width="560" height="315" src="https://www.youtube.com/embed/qzsidFlfhMQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ====== Footer Start ====== -->
    <footer class="ud-footer wow fadeInUp" data-wow-delay=".15s">
        <div class="shape shape-1" style="display:none;">
            <img src="assets/images/footer/shape-1.svg" alt="shape" />
        </div>
        <div class="shape shape-2">
            <img src="assets/images/footer/shape-2.svg" alt="shape" />
        </div>
        <div class="shape shape-3">
            <img src="assets/images/footer/shape-3.svg" alt="shape" />
        </div>
        <div class="ud-footer-bottom" style="padding: 0px !important;">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <ul class="ud-footer-bottom-left">
                            <li>
                                <a class="navbar-brand" href="index.php" style="margin:10px;">
                                    <img src="assets/images/logo/logo.png" alt="Logo" />
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-md-10" style="margin-top: 3%;">
                        <p class="ud-footer-bottom-center" style="font-weight:bold;color:#fff;text-align:center;">
                            Royal College of Physician/London-Iraq Members and fellows network

                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="ud-footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <ul class="ud-footer-bottom-left">
                            <li>
                                <a href="javascript:void(0)">Privacy policy</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Terms of service</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <p class="ud-footer-bottom-right">
                            Designed and Developed by
                            <a href="https://optimusmarketing.in/" target="_blank" rel="nofollow">Optimus Marketing Solutions</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ====== Footer End ====== -->

    <!-- ====== Back To Top Start ====== -->
    <a href="javascript:void(0)" class="back-to-top">
        <i class="lni lni-chevron-up"> </i>
    </a>
    <!-- ====== Back To Top End ====== -->

    <!-- ====== All Javascript Files ====== -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/p_script.js"></script>
    <script>
        // Get the modal

        function openModal(id){
            var modal = document.getElementById(id);
            modal.style.display = "block";
        }

        function closeModal(id){
            var modal = document.getElementById(id);
            modal.style.display = "none";
        }
    </script>

</body>

</html>