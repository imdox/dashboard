<?php 
session_start();
require_once 'core/config/config.php';
include("cal/cal_function.php");
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
    <link type="text/css" rel="stylesheet" href="cal/cal_style.css"/>

    <script src="cal/jquery.min.js"></script>
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

                                    <?php if ($isLogin) : ?>
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
                        Events and training
                        </h4>
                    </div>
                    <div class="ud-hero-brands-wrapper wow fadeInUp"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Banner End ====== -->
    <!-- ====== About Start ====== -->
    <section class="ud-features" style="margin-top:0px !important;">
        <div class="container" style="margin-top:0px !important;">
            <div class="row" style="margin-top:0px !important;">
                <div id="calendar_div">
                    <?php echo get_calender_full(); ?>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== About End ====== -->

    <hr style="background: #3056d3;height: 10px;opacity: 1;">

    <section  class="ud-features">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="ud-contact-form-wrapper wow fadeInUp" data-wow-delay=".2s">
                        <h3 class="ud-contact-form-title">Suggestion</h3>
                        <form class="ud-contact-form" method="POST" onsubmit="return false">
                            <div class="ud-form-group">
                                <label for="fullName">Full Name*</label>
                                <input type="text" id="fullName" name="fullName" placeholder="Full Name" />
                            </div>
                            <div class="ud-form-group">
                                <label for="email">Email*</label>
                                <input type="email" id="email_id" name="email_id" placeholder="Email" />
                            </div>
                            <div class="ud-form-group">
                                <label for="phone">Phone*</label>
                                <input type="number" id="phone" name="phone" placeholder="Mobile" />
                            </div>
                            <div class="ud-form-group">
                                <label for="message">Message*</label>
                                <textarea name="message" id="message" rows="4" placeholder="type your message here"></textarea>
                            </div>
                            <div class="ud-form-group mb-0">
                                <button class="ud-main-btn" onclick="saveS()">
                                    Send Message
                                </button>
                            </div>
                        </form>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    $(document).ready(
        function() {
        });

    function saveS() {
        var fullName = $("#fullName").val();
        var email = $("#email_id").val();
        var mobile = $("#phone").val();
        var message = $("#message").val();
        if(!fullName || fullName.length === 0 ){
            swal("Name Required", "Please Enter Name", "error");
        }else if(!email || email.length === 0 ){
            swal("Email Required", "Please Enter Email", "error");
        }else if(!mobile || mobile.length === 0 ){
            swal("Mobile Required", "Please Enter Mobile", "error");
        }else if(!message || message.length === 0 ){
            swal("Message Required", "Please Enter Message", "error");
        }
        $.post("add_suggestion.php", {
            names: fullName,
            email: email,
            mobile: mobile,
            message: message,
        }, function(data) {
            var txt = data.toString();
            var obj = JSON.parse(txt);
            if(obj.res=='success'){
                swal("Success", obj.msg, "success").then((value) => {
                    location.reload()
                });
            }else{
                swal("Error", obj.msg, "error");
            }
        });
    }
</script>    
</body>

</html>