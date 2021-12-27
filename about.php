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
       // header('Location: login.php');
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
                            Who we are
                        </h4>
                    </div>
                    <div class="ud-hero-brands-wrapper wow fadeInUp"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Banner End ====== -->

    <!-- ====== About Start ====== -->
    <section id="about" class="ud-about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="assets/images/about/about1.jpg" alt="about-image" style="border-radius:10px;" />
                </div>
                <div class="col-md-6">
                    <div class="ud-about-content">
                        <!-- <span class="tag">About Us</span> -->
                        <!-- <h4>Header</h4> -->
                        <p>
                            The main ‘thrust’ is to focus on educating attendees on how to best protect highly vulnerable business applications with interactive panel discussions and roundtables led by subject matter experts.
                        </p>

                        <p>
                            The main ‘thrust’ is to focus on educating attendees on how to best protect highly vulnerable business applications with interactive panel.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== About End ====== -->

    <!-- ====== Extra start ====== -->

    <section id="testimonials" class="ud-testimonials">
        <div class="container">
            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="ud-section-title mx-auto text-center">
                        <span>Testimonials</span>
                        <h2>What our Customers Says</h2>
                        <p>
                            There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form.
                        </p>
                    </div>
                </div>
            </div> -->
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="ud-single-testimonial wow fadeInUp" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;background: #2F56D3;border-radius:10px;">
                        <div class="ud-testimonial-ratings">
                            <h4 style="color: #fff;">Header 1</h4>
                        </div>
                        <div class="ud-testimonial-content">
                            <p style="color: #fff;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
                                a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="ud-single-testimonial wow fadeInUp" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;border: 1px solid #2F56D3;border-radius:10px;">
                        <div class="ud-testimonial-ratings">
                            <h4>Header 2</h4>
                        </div>
                        <div class="ud-testimonial-content">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
                                a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ====== Extra end ====== -->

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
</body>

</html>