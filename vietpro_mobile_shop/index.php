<?php
include_once('admin/config/connect.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/category.css">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/success.css">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
</head>

<body>

    <!--	Header	-->
    <div id="header">
        <div class="container">
            <div class="row">
                <?php include_once('modules/logo/logo.php'); ?>
                <?php include_once('modules/search/search_box.php'); ?>
                <?php include_once('modules/cart/cart_info.php'); ?>
                
                
                
            </div>
        </div>
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <!--	End Header	-->

    <!--	Body	-->
    <div id="body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                   <?php include_once('modules/menu/menu.php'); ?>
                </div>
            </div>
            <div class="row">
                <div id="main" class="col-lg-8 col-md-12 col-sm-12">
                    <!--	Slider	-->
                    <div id="slide" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#slide" data-slide-to="0" class="active"></li>
                            <li data-target="#slide" data-slide-to="1"></li>
                            <li data-target="#slide" data-slide-to="2"></li>
                            <li data-target="#slide" data-slide-to="3"></li>
                            <li data-target="#slide" data-slide-to="4"></li>
                            <li data-target="#slide" data-slide-to="5"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/slide-1.png" alt="Vietpro Academy">
                            </div>
                            <div class="carousel-item">
                                <img src="images/slide-2.png" alt="Vietpro Academy">
                            </div>
                            <div class="carousel-item">
                                <img src="images/slide-3.png" alt="Vietpro Academy">
                            </div>
                            <div class="carousel-item">
                                <img src="images/slide-4.png" alt="Vietpro Academy">
                            </div>
                            <div class="carousel-item">
                                <img src="images/slide-5.png" alt="Vietpro Academy">
                            </div>
                            <div class="carousel-item">
                                <img src="images/slide-6.png" alt="Vietpro Academy">
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#slide" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#slide" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>

                    </div>
                    <!--	End Slider	-->

                    <?php   
                // master page
                if(isset($_GET['page_layout'])){
                    switch($_GET['page_layout']){
                        case 'cart': include_once('modules/cart/cart.php');
                        break;
                        case 'category': include_once('modules/menu/category.php');
                        break;
                        case 'product': include_once('modules/products/product.php');
                        break;
                        case 'search': include_once('modules/search/search.php');
                        break;
                        case 'success': include_once('modules/cart/success.php');
                        break;
                    }
                }
                else{
                    include_once('modules/products/featured.php');
                    include_once('modules/products/lastest.php');
                }
                ?>
                </div>

                <div id="sidebar" class="col-lg-4 col-md-12 col-sm-12">
                    <div id="banner">
                        <div class="banner-item">
                            <a href="#"><img class="img-fluid" src="images/banner-1.png"></a>
                        </div>
                        <div class="banner-item">
                            <a href="#"><img class="img-fluid" src="images/banner-2.png"></a>
                        </div>
                        <div class="banner-item">
                            <a href="#"><img class="img-fluid" src="images/banner-3.png"></a>
                        </div>
                        <div class="banner-item">
                            <a href="#"><img class="img-fluid" src="images/banner-4.png"></a>
                        </div>
                        <div class="banner-item">
                            <a href="#"><img class="img-fluid" src="images/banner-5.png"></a>
                        </div>
                        <div class="banner-item">
                            <a href="#"><img class="img-fluid" src="images/banner-6.png"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--	End Body	-->

    <div id="footer-top">
        <div class="container">
            <div class="row">
            <?php include_once('modules/logo/logo_footer.php'); ?>
                    
                
                <div id="address" class="col-lg-3 col-md-6 col-sm-12">
                    <h3>Địa chỉ</h3>
                    <p>B8A Võ Văn Dũng - Hoàng Cầu Đống Đa - Hà Nội</p>
                    <p>Số 25 Ngõ 178/71 - Tây Sơn Đống Đa - Hà Nội</p>
                </div>
                <div id="service" class="col-lg-3 col-md-6 col-sm-12">
                    <h3>Dịch vụ</h3>
                    <p>Bảo hành rơi vỡ, ngấm nước Care Diamond</p>
                    <p>Bảo hành Care X60 rơi vỡ ngấm nước vẫn Đổi mới</p>
                </div>
                <div id="hotline" class="col-lg-3 col-md-6 col-sm-12">
                    <h3>Hotline</h3>
                    <p>Phone Sale: (+84) 0988 550 553</p>
                    <p>Email: vietpro.edu.vn@gmail.com</p>
                </div>
            </div>
        </div>
    </div>

    <!--	Footer	-->
    <div id="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p>
                        2018 © Vietpro Academy. All rights reserved. Developed by Vietpro Software.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!--	End Footer	-->













</body>

</html>