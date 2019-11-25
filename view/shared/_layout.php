<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?= base_url ?>/favicon.png" type="image/png"/>
        <title><?= $view_data['title'] ?></title>
        <meta name="description" content="Văn phòng cho thuê quận Gò Vấp với gần 5 năm kinh nghiệm : ✅ Giá Rẻ nhất ✅ Báo Giá Nhanh ✅ Nhiều Diện Tích. Cyber Real - Chuyên văn phòng Quận Gò Vấp">
        <link href="<?= base_url ?>/css/style.css?v=1" rel="stylesheet">
        <link href="<?= base_url ?>/assets/22c734a/css/select2.min.css" rel="stylesheet">
        <link href="<?= base_url ?>/assets/22c734a/css/select2-addl.min.css" rel="stylesheet">
        <link href="<?= base_url ?>/assets/22c734a/css/select2-krajee-bs4.min.css" rel="stylesheet">
        <link href="<?= base_url ?>/assets/fc340a4a/css/kv-widgets.min.css" rel="stylesheet">
        <link href="<?= base_url ?>/assets/a1ef791c/css/dependent-dropdown.min.css" rel="stylesheet">
        <?php
        if (isset($view_data['section_styles'])) {
            include 'view/' . $view_data['section_styles'];
        }
        ?>
    </head>
    <body>
        <main id="panel">
            <div class="close-mobile-menu"><i class="fas fa-times"></i> ĐÓNG</div>
            <!-- header -->
            <header id="main">
                <div class="top py-2">
                    <div class="container">
                        <div class="row no-gutters">
                            <div class="col-lg-3">
                                <a class="logo" href="<?= base_url ?>"><img src="<?= base_url ?>/images/logo.png" alt=""></a>                    </div>
                            <div class="col-lg-auto ml-lg-auto information d-none d-md-flex mt-md-2 mt-lg-0">
                                <div class="row">
                                    <div class="col-md">
                                        <div class="media align-items-center">
                                            <i class="fs-24 icon-clock bg-secondary text-white icon-boxed mr-2"></i>
                                            <div class="media-body">
                                                <span class="title text-nowrap">Thời gian làm việc</span>
                                                <h6 class="my-0 text-nowrap">8:30 - 17:30</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="media align-items-center">
                                            <i class="fs-24 icon-phone bg-secondary text-white icon-boxed mr-2"></i>
                                            <div class="media-body">
                                                <span class="title text-nowrap">Hotline</span>
                                                <h6 class="my-0 text-nowrap">0932.020.099</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="media align-items-center">
                                            <i class="fs-24 icon-envelope bg-secondary text-white icon-boxed mr-2"></i>
                                            <div class="media-body">
                                                <span class="title text-nowrap">Email tư vấn</span>
                                                <h6 class="my-0 text-nowrap"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5f363139301f3c263d3a2d2d3a3e33712931">[email&#160;protected]</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <nav class="navbar navbar-expand-lg">
                    <div class="container">
                        <button class="navbar-toggler" type="button" aria-label="Toggle navigation" id="mobile-menu-icon">
                            <i class="fas fa-bars"></i> MENU
                        </button>
                        <div id="main-menu">
                            <ul id="w0" class="navbar-nav mr-auto nav"><li class="nav-item"><a class="nav-link" href="<?= base_url ?>"><i class="fas fa-home"></i></a></li>
                                <li class="dropdown nav-item"><a class="dropdown-toggle nav-link" href="/van-phong-cho-thue" data-toggle="dropdown">Văn phòng theo quận<span class="fas fa-angle-down"></span></a><div id="w1" class="dropdown-menu"><a class="dropdown-item" href="/van-phong-cho-thue/quan-1">Quận 1</a>
                                        <a class="dropdown-item" href="/van-phong-cho-thue/quan-2">Quận 2</a>
                                        <a class="dropdown-item" href="/van-phong-cho-thue/quan-3">Quận 3</a>
                                        <a class="dropdown-item" href="/van-phong-cho-thue/quan-4">Quận 4</a>
                                        <a class="dropdown-item" href="/van-phong-cho-thue/quan-5">Quận 5</a>
                                        <a class="dropdown-item" href="/van-phong-cho-thue/quan-6">Quận 6</a>
                                        <a class="dropdown-item" href="/van-phong-cho-thue/quan-7">Quận 7</a>
                                        <a class="dropdown-item" href="/van-phong-cho-thue/quan-8">Quận 8</a>
                                        <a class="dropdown-item" href="/van-phong-cho-thue/quan-9">Quận 9</a>
                                        <a class="dropdown-item" href="/van-phong-cho-thue/quan-10">Quận 10</a>
                                        <a class="dropdown-item" href="/van-phong-cho-thue/quan-11">Quận 11</a>
                                        <a class="dropdown-item" href="/van-phong-cho-thue/quan-12">Quận 12</a>
                                        <a class="dropdown-item" href="/van-phong-cho-thue/quan-binh-thanh">Quận Bình Thạnh</a>
                                        <a class="dropdown-item" href="/van-phong-cho-thue/quan-phu-nhuan">Quận Phú Nhuận</a>
                                        <a class="dropdown-item" href="/van-phong-cho-thue/quan-tan-binh">Quận Tân Bình</a>
                                        <a class="dropdown-item" href="/van-phong-cho-thue/quan-go-vap">Quận Gò Vấp</a>
                                        <a class="dropdown-item" href="/van-phong-cho-thue/quan-thu-duc">Quận Thủ Đức</a>
                                        <a class="dropdown-item" href="/van-phong-cho-thue/quan-binh-tan">Quận Bình Tân</a>
                                        <a class="dropdown-item" href="/van-phong-cho-thue/quan-tan-phu">Quận Tân Phú</a>
                                        <a class="dropdown-item" href="/van-phong-cho-thue/huyen-cu-chi">Huyện Củ Chi</a>
                                        <a class="dropdown-item" href="/van-phong-cho-thue/huyen-can-gio">Huyện Cần Giờ</a>
                                        <a class="dropdown-item" href="/van-phong-cho-thue/huyen-nha-be">Huyện Nhà Bè</a></div></li>
                                <li class="dropdown nav-item"><a class="dropdown-toggle nav-link" href="/van-phong-tron-goi" data-toggle="dropdown">Văn Phòng Trọn Gói<span class="fas fa-angle-down"></span></a><div id="w2" class="dropdown-menu"><a class="dropdown-item" href="/van-phong-tron-goi/quan-1-1">Văn Phòng Trọn Gói Quận 1</a>
                                        <a class="dropdown-item" href="/van-phong-tron-goi/quan-2-1">Văn Phòng Trọn Gói Quận 2</a>
                                        <a class="dropdown-item" href="/van-phong-tron-goi/quan-3-1">Văn Phòng Trọn Gói Quận 3</a>
                                        <a class="dropdown-item" href="/van-phong-tron-goi/quan-4-1">Văn Phòng Trọn Gói Quận 4</a>
                                        <a class="dropdown-item" href="/van-phong-tron-goi/quan-10-1">Văn Phòng Trọn Gói Quận 10</a>
                                        <a class="dropdown-item" href="/van-phong-tron-goi/phu-nhuan">Văn Phòng Trọn Gói Phú Nhuận</a>
                                        <a class="dropdown-item" href="/van-phong-tron-goi/binh-thanh">Văn Phòng Trọn Gói Bình Thạnh</a>
                                        <a class="dropdown-item" href="/van-phong-tron-goi/tan-binh">Văn Phòng Trọn Gói Tân Bình</a></div></li>
                                <li class="nav-item"><a class="nav-link" href="/tin-tuc">Tin tức</a></li>
                                <li class="nav-item"><a class="nav-link" href="/video">Video</a></li>
                            </ul>                
                        </div>
                        <ul class="navbar-nav navbar-right">
                            <li class="nav-item">
                                <a class="nav-link" href="/ki-gui">
                                    <span class="btn btn-warning btn-sm btn-with-ico text-white font-weight-bold"><i class="icon-star"></i> Kí gửi</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/lien-he">Liên hệ</a>                    
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- / header -->

            <main id="primary">
                <?php include 'view/'.$view_data['view_name']; ?>   
            </main>

            <!-- footer -->
            <div class="half">
                <span class="half-bg bg-dark"></span>
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <div class="btn-frame">
                                <a data-scroll href="#top" class="btn btn-primary btn-ico btn-lg btn-rounded"><i class="icon-arrow-up2 fs-22"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-dark py-3">

                <div class="container">
                    <div class="row gutter-3 text-white mb-0 top">
                        <div class="col-md districts">
                            <div class="card border-0 bordered">
                                <div class="card-body p-0">
                                    <h3 class="title text-light">Văn Phòng Cho Thuê Theo Quận</h3>
                                    <div class="text-widget pt-1">
                                        <ul>
                                            <li><a href="/van-phong-cho-thue/quan-1">Quận 1</a></li>
                                            <li><a href="/van-phong-cho-thue/quan-2">Quận 2</a></li>
                                            <li><a href="/van-phong-cho-thue/quan-3">Quận 3</a></li>
                                            <li><a href="/van-phong-cho-thue/quan-4">Quận 4</a></li>
                                            <li><a href="/van-phong-cho-thue/quan-5">Quận 5</a></li>
                                            <li><a href="/van-phong-cho-thue/quan-6">Quận 6</a></li>
                                            <li><a href="/van-phong-cho-thue/quan-7">Quận 7</a></li>
                                            <li><a href="/van-phong-cho-thue/quan-8">Quận 8</a></li>
                                            <li><a href="/van-phong-cho-thue/quan-9">Quận 9</a></li>
                                            <li><a href="/van-phong-cho-thue/quan-10">Quận 10</a></li>
                                            <li><a href="/van-phong-cho-thue/quan-11">Quận 11</a></li>
                                            <li><a href="/van-phong-cho-thue/quan-12">Quận 12</a></li>
                                            <li><a href="/van-phong-cho-thue/quan-tan-binh">Quận T&acirc;n B&igrave;nh</a></li>
                                            <li><a href="/van-phong-cho-thue/quan-binh-thanh">Quận B&igrave;nh Thạnh</a></li>
                                            <li><a href="/van-phong-cho-thue/quan-phu-nhuan">Quận Ph&uacute; Nhuận</a></li>
                                            <li><a href="/van-phong-cho-thue/quan-go-vap">Quận G&ograve; Vấp</a></li>
                                            <li><a href="/van-phong-cho-thue/quan-thu-duc">Quận Thủ Đức</a></li>
                                            <li><a href="/van-phong-cho-thue/quan-tan-phu">Quận T&acirc;n Ph&uacute;</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md col-md-3">
                            <div class="card border-0 bordered">
                                <div class="card-body p-0">
                                    <h3 class="title text-light">Loại Văn Phòng</h3>
                                    <div class="text-widget pt-1">
                                        <ul>
                                            <li><a href="/van-phong-cho-thue/van-phong-hang-a">Văn Ph&ograve;ng Hạng A</a></li>
                                            <li><a href="/van-phong-cho-thue/van-phong-hang-b">Văn Ph&ograve;ng Hạng B</a></li>
                                            <li><a href="/van-phong-cho-thue/van-phong-hang-c">Văn Ph&ograve;ng Hạng C</a></li>
                                            <li><a href="/van-phong-cho-thue/van-phong-gia-re">Văn Ph&ograve;ng Gi&aacute; Rẻ</a></li>
                                            <li>Văn Ph&ograve;ng Trọn G&oacute;i</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>      
                <div class="container">
                    <div class="row gutter-3 text-white mb-0">
                        <div class="col-12 col-md-6 ">
                            <div class="card border-0 bordered">
                                <div class="card-body p-0">
                                    <h3 class="title text-light">Công Ty Cổ Phần Bất Động Sản Cyber Real</h3>
                                    <div class="text-widget pt-1">
                                        <p>M&atilde; Số Thuế :&nbsp;0315314835<br />
                                            Địa chỉ: L18-11-13, Tầng 18, Vincom&nbsp;Center Đồng Khởi, 72 L&ecirc;, Phường Bến Ngh&eacute;, Quận 1, Tp HCM<br />
                                            Điện thoại: 0932020099<br />
                                            Email:&nbsp;<a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bad3d4dcd5fad9c3d8dfc8c8dfdbd694ccd4">[email&#160;protected]</a><br />
                                            Website:&nbsp;https://cyberreal.vn</p>

                                        <p>&nbsp;</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 socials col-lg-4 ml-lg-auto">
                            <div class="card border-0 bordered">
                                <div class="card-body p-0">
                                    <h3 class="title text-light">Kết nối với chúng tôi</h3>
                                    <div class="text-widget pt-1">
                                        <ul>
                                            <li><a href="https://www.facebook.com/Vanphongchothue.cyberreal/"><i class="fab fa-2x fa-facebook-square"></i></a></li>
                                            <li><a href="https://twitter.com/cyberreal_vn"><i class="fab fa-2x fa-twitter-square"></i></a></li>
                                            <li><a href="https://www.linkedin.com/company/cyberreal/"><i class="fab fa-2x fa-linkedin"></i></a></li>
                                            <li><a href="https://www.instagram.com/vanphongchothuecyberreal/"><i class="fab fa-2x fa-instagram"></i></a></li>
                                            <li><a href="https://www.youtube.com/channel/UCAJppTy3MdsO3fL9Ar1mHdw"><i class="fab fa-2x fa-youtube-square"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>        <div class="copyright container">
                    <p class="m-0">&copy 2019 - Cyber Real - Đơn Vị Cho Thuê Văn Phòng Hàng Đầu Tp HCM</p>
                </div>
            </footer>
            <!-- / footer -->

            <aside id="phone-button" class="d-block d-md-none">
                <a href="tel:0932.020.099">
                    <div class="media align-items-center">
                        <i class="fs-20 icon-phone bg-primary text-white icon-boxed mr-2"></i>
                        <div class="media-body">
                            <h6 class="my-0 text-nowrap text-white">0932.020.099</h6>
                        </div>
                    </div>
                </a>
            </aside>
        </main>


        <div id="global" class="fade modal" role="dialog" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">

                    <div class="modal-body">


                    </div>

                </div>
            </div>
        </div>
        <script
          src="https://code.jquery.com/jquery-3.4.1.min.js"
          integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
          crossorigin="anonymous"></script>
        <script src="<?= base_url ?>/js/vendor.min.js"></script>
        <script src="<?= base_url ?>/assets/a98fcf71/yii.js"></script>
        <script src="<?= base_url ?>/js/slideout.min.js"></script>
        <script src="<?= base_url ?>/js/app.min.js"></script>
        <script src="<?= base_url ?>/assets/22c734a/js/select2.full.min.js"></script>
        <script src="<?= base_url ?>/assets/22c734a/js/select2-krajee.min.js"></script>
        <script src="<?= base_url ?>/assets/22c734a/js/i18n/vi.js"></script>
        <script src="<?= base_url ?>/assets/fc340a4a/js/kv-widgets.min.js"></script>
        <script src="<?= base_url ?>/assets/a1ef791c/js/dependent-dropdown.min.js"></script>
        <script src="<?= base_url ?>/assets/eaef8c08/js/depdrop.min.js"></script>
      
        </body>
    <?php
    if (isset($view_data['section_scripts'])) {
        include 'view/' . $view_data['section_scripts'];
    }
    ?>
</html>

