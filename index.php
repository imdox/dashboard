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
        header('Location: login.php');
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

    <!-- ====== Hero Start ====== -->
    <section class="ud-hero" id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ud-hero-content wow fadeInUp" data-wow-delay=".2s">
                        <h4 class="ud-hero-title">
                            Royal College of Physician/London-Iraq <br> Members and fellows network
                            <?php print_r($userData[0]['f_name']); ?>
                        </h4>
                    </div>
                    <div class="ud-hero-brands-wrapper wow fadeInUp"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Hero End ====== style="margin-top: 50px;"-->

    <section id="features" class="ud-features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h5 style="text-align: left !important;color: #000;">The RCP's core mission is to drive improvements in health and healthcare through advocacy, education and research.</h5><br/>
                    <div class="ud-hero-brands-wrapper wow fadeInUp">
                        <p style="color: #000;text-align:left !important;">The RCP has a truly global network, with nearly one-fifth of its members based in over 80 countries worldwide. In line with this vision, RCP-Iraq network project was proposed by Hilal Al Saffar, international advisor for Iraq,
                            approved by vice president RCP global, Mumtaz Patel on November 2020. The project was announced though social media, supported by massage sent by RCP global department, data base was established and started its activities since
                            May 2021. The project focused on education, health service provision, research and addressing many levels, starting from undergraduate students, newly graduated doctors, postgraduate trainees to consultants. Also inclusion
                            of other partners such as nongovernmental organizations and private sectors to ensure sustainability.</p>
                    </div>
                    <div class="ud-hero-brands-wrapper wow fadeInUp">
                        <h5 style="text-align: left !important;color: #000;">Many activities were delivered May to October 2021 including:</h5><br/>
                        <ul style="text-align: left !important;margin-left: 40px;color: #000;list-style-type: circle  !important;">
                            <li>Basic course in medical education (six modules)</li>
                            <li> Capacity building in scientific research (five modules)</li>
                            <li> Research advisory spot (provide research support and advice) </li>
                            <li> Facilitate medical training initiative in iraq (training program in UK) </li>
                            <li> Facilitating elective training program for undergraduate students in UK </li>
                        </ul>
                    </div>
                    <div>
                        <div style="text-align: left !important;color: #000;">
                            <p style="color: #000;">
                                The steering committee of this project includes consultants, newly graduate doctors and undergraduate students.
                            </p>
                            <p style="color: #000;">Hilal Al Saffar</p>
                            <p style="color: #000;">International advisor RCP London for Iraq</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr style="background: #3056d3;height: 10px;opacity: 1;">

    <!-- ====== Features Start ====== -->
    <section id="features" class="ud-features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ud-section-title">
                        <h2>Social Media Connect</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-sm-6">
                    <div class="ud-single-feature wow fadeInUp" data-wow-delay=".1s">
                        <div class="ud-feature-icon">
                            <i class="lni lni-facebook"></i>
                        </div>
                        <div class="ud-feature-content">
                            <h3 class="ud-feature-title">Facebook Page</h3>
                            <a href="https://m.facebook.com/RCPiraq/" target="_blank">
                                  Connect & Follow us
                              </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-6">
                    <div class="ud-single-feature wow fadeInUp" data-wow-delay=".15s">
                        <div class="ud-feature-icon" style="background: red;">
                            <i class="lni lni-youtube"></i>
                        </div>
                        <div class="ud-feature-content">
                            <h3 class="ud-feature-title">Youtube Channel</h3>
                            <a href="https://youtube.com/channel/UCP2wNubK4hU0MNdLvOIMyFg" target="_blank">
                                  Connect & Follow us
                              </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Features End ====== -->

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