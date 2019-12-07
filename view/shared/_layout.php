<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?= base_url ?>/favicon.png" type="image/png"/>
        <title><?= $view_data['title'] ?></title>
        <?php if(isset($view_data['section_meta'])) { 
            include 'view/' . $view_data['section_meta'];
        } ?>
        <link href="<?= base_url ?>/css/style.css?v=1" rel="stylesheet">
        <link href="<?= base_url ?>/css/custom.css?v=1" rel="stylesheet">
        <link href="<?= base_url ?>/css/icon.css?v=1" rel="stylesheet">
        <link href="<?= base_url ?>/assets/fc340a4a/css/kv-widgets.min.css" rel="stylesheet">
        <link href="<?= base_url ?>/assets/a1ef791c/css/dependent-dropdown.min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?= base_url ?>/css/select2.css?v=1" rel="stylesheet">
        <link href="<?=base_url?>/assets/css/jquery.niftymodals.css" rel="stylesheet" />
        <?php
        if (isset($view_data['section_styles'])) {
            include 'view/' . $view_data['section_styles'];
        }
        ?>
        <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
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
                                <a class="logo" href="<?= base_url ?>"><img src="<?= base_url ?>/images/logonew.png" alt=""></a>                    </div>
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
                                                <h6 class="my-0 text-nowrap"><?= $_SESSION['InfoWeb']['Phone'] ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="media align-items-center">
                                            <i class="fs-24 icon-envelope bg-secondary text-white icon-boxed mr-2"></i>
                                            <div class="media-body">
                                                <span class="title text-nowrap">Email tư vấn</span>
                                                <h6 class="my-0 text-nowrap"><a href="mailto:<?= $_SESSION['InfoWeb']['Email'] ?>"><?= $_SESSION['InfoWeb']['Email'] ?></a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="nav-container">
                    
                </div>
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
                                <a data-scroll href="#top" class="btn btn-success btn-ico btn-lg btn-rounded"><i class="fa fa-arrow-up"></i></a>
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
                                    <h3 class="title text-light">Căn Hộ Cho Thuê Theo Quận</h3>
                                    <div class="text-widget pt-1">
                                        <ul>
                                            <li><a href="<?=base_url?>/can-ho/quan-1">Quận 1</a></li>
                                            <li><a href="<?=base_url?>/can-ho/quan-2">Quận 2</a></li>
                                            <li><a href="<?=base_url?>/can-ho/quan-3">Quận 3</a></li>
                                            <li><a href="<?=base_url?>/can-ho/quan-4">Quận 4</a></li>
                                            <li><a href="<?=base_url?>/can-ho/quan-5">Quận 5</a></li>
                                            <li><a href="<?=base_url?>/can-ho/quan-6">Quận 6</a></li>
                                            <li><a href="<?=base_url?>/can-ho/quan-7">Quận 7</a></li>
                                            <li><a href="<?=base_url?>/can-ho/quan-8">Quận 8</a></li>
                                            <li><a href="<?=base_url?>/can-ho/quan-9">Quận 9</a></li>
                                            <li><a href="<?=base_url?>/can-ho/quan-10">Quận 10</a></li>
                                            <li><a href="<?=base_url?>/can-ho/quan-11">Quận 11</a></li>
                                            <li><a href="<?=base_url?>/can-ho/quan-12">Quận 12</a></li>
                                            <li><a href="<?=base_url?>/can-ho/quan-tan-binh">Quận T&acirc;n B&igrave;nh</a></li>
                                            <li><a href="<?=base_url?>/can-ho/quan-binh-thanh">Quận B&igrave;nh Thạnh</a></li>
                                            <li><a href="<?=base_url?>/can-ho/quan-phu-nhuan">Quận Ph&uacute; Nhuận</a></li>
                                            <li><a href="<?=base_url?>/can-ho/quan-go-vap">Quận G&ograve; Vấp</a></li>
                                            <li><a href="<?=base_url?>/can-ho/quan-thu-duc">Quận Thủ Đức</a></li>
                                            <li><a href="<?=base_url?>/can-ho/quan-tan-phu">Quận T&acirc;n Ph&uacute;</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <!--  <div class="col-md col-md-3">
                            <div class="card border-0 bordered">
                                <div class="card-body p-0">
                                    <h3 class="title text-light">Loại Văn Phòng</h3>
                                    <div class="text-widget pt-1">
                                        <ul>
                                            <li><a href="/can-ho/van-phong-hang-a">Văn Ph&ograve;ng Hạng A</a></li>
                                            <li><a href="/can-ho/van-phong-hang-b">Văn Ph&ograve;ng Hạng B</a></li>
                                            <li><a href="/can-ho/van-phong-hang-c">Văn Ph&ograve;ng Hạng C</a></li>
                                            <li><a href="/can-ho/van-phong-gia-re">Văn Ph&ograve;ng Gi&aacute; Rẻ</a></li>
                                            <li>Văn Ph&ograve;ng Trọn G&oacute;i</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <hr>
                </div>      
                <div class="container">
                    <div class="row gutter-3 text-white mb-0">
                        <div class="col-12 col-md-6 ">
                            <div class="card border-0 bordered">
                                <div class="card-body p-0">
                                    <h3 class="title text-light"><?= $_SESSION['InfoWeb']['WebName'] ?></h3>
                                    <div class="text-widget pt-1">
                                        <p> 
                                            Địa chỉ: <?= $_SESSION['InfoWeb']['Address'] ?><br />
                                            Điện thoại: <?= $_SESSION['InfoWeb']['Phone'] ?><br />
                                            Email:&nbsp;<a href="mailto:<?= $_SESSION['InfoWeb']['Email'] ?>" ><?= $_SESSION['InfoWeb']['Email'] ?></a><br />
                                            Website:&nbsp;<?= base_url ?></p>

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
                                            <li><a href="<?= $_SESSION['InfoWeb']['Fanpage'] ?>"><i class="fab fa-2x fa-facebook-square"></i></a></li>
                                            <li><a href="#"><i class="fab fa-2x fa-twitter-square"></i></a></li>
                                            <li><a href="#"><i class="fab fa-2x fa-linkedin"></i></a></li>
                                            <li><a href="#"><i class="fab fa-2x fa-instagram"></i></a></li>
            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>        
                <div class="copyright container">
                    <p class="m-0"><?= $_SESSION['InfoWeb']['CopyRight'] ?></p>
                </div>
            </footer>
            <!-- / footer -->

            <aside id="phone-button" class="d-block d-md-none">
                <a href="tel:0932.020.099">
                    <div class="media align-items-center">
                        <i class="fs-20 icon-phone bg-primary text-white icon-boxed mr-2"></i>
                        <div class="media-body">
                            <h6 class="my-0 text-nowrap text-white"><?= $_SESSION['InfoWeb']['Phone'] ?></h6>
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
        <div id="bangtin"></div> 

        <script src="<?= base_url ?>/js/vendor.min.js"></script>
        <script src="<?= base_url ?>/assets/a98fcf71/yii.js"></script>
        <script src="<?= base_url ?>/js/slideout.min.js"></script>
        <script src="<?= base_url ?>/js/app.min.js"></script>
        <script src="<?= base_url ?>/assets/fc340a4a/js/kv-widgets.min.js"></script>
        <script src="<?= base_url ?>/assets/a1ef791c/js/dependent-dropdown.min.js"></script>
        <script src="<?= base_url ?>/assets/eaef8c08/js/depdrop.min.js"></script>
        <script src="<?= base_url ?>/js/common.js"></script>
        </body>
        <script>
            $(function () {
                $('#Street').select2({
                    theme: "flat",
                });
                if($("#search") != undefined)
                {
                    $.ajax({
                        url : "<?= base_url ?>/shared/_searchPartial",
                        method: "Post",
                        success: function(result){
                            $("#search").html(result);
                        }
                    });
                }

                $.ajax({
                    url : "<?= base_url ?>/shared/navbar",
                    method: "Post",
                    success: function(result){
                        $("#nav-container").html(result);
                    }
                });

                if($("#filter-container") != undefined)
                {
                    $.ajax({
                        url : "<?= base_url ?>/shared/filters",
                        method: "Post",
                        success: function(result){
                            $("#filter-container").html(result);
                        }
                    });
                }

                $("#global").on("show.bs.modal", function(e) {
                    var link = $(e.relatedTarget);
                    $(this).find(".modal-body").load(link.attr("href"));
                });

                $(document).on("change","#Province", function(e){
                    e.preventDefault();
                    $.ajax({
                        cache: true,
                        url: "<?= base_url ?>/location/GetDistrictsByProvince",
                        method: "Post",
                        data: { Province : $(this).val(), dataSelected : $("#District").attr("data-selected"), showValueAll: 1 },
                        success: function(result){
                            $("#District").html(result);
                            $("#District").change().bind();
                        }
                    })
                });

                $(document).on("change","#District", function(e){
                    e.preventDefault();
                    $.ajax({
                        cache: true,
                        url: "<?= base_url ?>/location/GetWardsByDistrict",
                        method: "Post",
                        data: { District : $(this).val(), dataSelected : $("#Ward").attr("data-selected"), showValueAll: 1 },
                        success: function(result){
                            $("#Ward").html(result);
                            $("#Ward").change().bind();
                        }
                    });

                    $.ajax({
                        cache: true,
                        url: "<?= base_url ?>/location/GetStreetsByDistrict",
                        method: "Post",
                        data: { District : $(this).val(), dataSelected : $("#Street").attr("data-selected"), showValueAll: 1 },
                        success: function(result){
                            $("#Street").html(result);
                        }
                    });
                });

            });
        </script> 
        <script>
            $(document).ready(function () {
                if (sessionStorage.getItem('ShowPopUp') === null) {
                    sessionStorage.setItem('ShowPopUp', "yes");
                }
                if (sessionStorage.getItem('ShowPopUp') == "yes") {
                    $.post('<?=base_url?>/home/showpopup', function (result) { $("#bangtin").html(result); });
                } 
            });
        </script>
        <?php
        if (isset($view_data['section_scripts'])) {
            include 'view/' . $view_data['section_scripts'];
        }
        ?>
</html>

