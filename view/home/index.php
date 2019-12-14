<div id="home-slider">
    <div class="owl-carousel" data-nav="true">
        <?php foreach($view_data['slides'] as $item) { ?>
            <figure class="photo">
                <img src="<?= base_url ?>/images/slides/<?= $item['Image'] ?>" alt="">
            </figure>
            <?php } ?>
    </div>
</div>
<section id="search" class="overlay pb-0">

</section>
<section class="container"  id="quangcao">

    <!-- .section-bg -->
    <div class="section-content relative" >

        <div class="row" >
            <div class="col-sm-4 text-center" data-animate="fadeInLeft" data-animated="true">
                <div class="col-inner">

                     <div class="icon-box-img" style="width: 128px">
                         <div class="icon">
                             <div class="icon-inner">
                                 <img width="128" height="128" src="<?= base_url ?>/images/time.png" class="attachment-medium size-medium" alt=""   > </div>
                         </div>
                     </div>
                     <div class="last-reset">
                         <h4>Tiết kiệm thời gian</h4>
                         <p>Hỗ trợ tư vấn và cung cấp thông tin dự án,căn hộ bán, căn hộ cho thuê phù hợp với nhu cầu của khách hàng trong thời gian ngắn nhất</p>
                     </div>
                    <!-- .icon-box -->
                </div>
            </div>
            <div class="col-sm-4 text-center" data-animate="fadeInLeft" data-animated="true">
                <div class="col-inner">

                     <div class="icon-box-img" style="width: 128px">
                         <div class="icon">
                             <div class="icon-inner">
                                 <img width="128" height="128" src="<?= base_url ?>/images/coin.png" class="attachment-medium size-medium" alt=""  > </div>
                         </div>
                     </div>
                     <div class="last-reset">
                         <h4>Đúng giá thị trường</h4>
                         <p>Chúng tôi có bộ phận chuyên định giá các căn hộ bán, căn hô cho thuê chuyên nghiệp nhằm mang lại lợi nhuận cao nhất cho khách hàng.
                         </p>
                     </div>
                    <!-- .icon-box -->

                </div>
            </div>
            <div class="col-sm-4 text-center" data-animate="fadeInLeft" data-animated="true">
                <div class="col-inner">

                     <div class="icon-box-img" style="width: 128px">
                         <div class="icon">
                             <div class="icon-inner">
                                 <img width="128" height="128" src="<?= base_url ?>/images/customer-service.png" class="attachment-medium size-medium" alt="" > </div>
                         </div>
                     </div>
                     <div class="last-reset">

                         <h4>Hậu mãi chu đáo</h4>
                         <p>Sau khi hoàn tất mọi thủ tục cần thiết cho 1 giao dịch,quý khách hàng sẽ được chúng tôi đồng hành xuyên suốt và hỗ trợ trọn đời.</p>
                     </div>
                    <!-- .icon-box -->

                </div>
            </div>
        </div>
    </div>
    <!-- .section-content -->

</section>   
<section class="container">
   <div class="row">
      <div class="col-md-8  col-md-offset-2 text-center" style="margin:0 auto">
         <h3>Các dự án HOT Thủ Thiêm</h3>
         <p>
            Chúng tôi sở hữu cổng thông tin bất động sản chất lượng và được thẩm định đầy đủ, cung cấp cho khách hàng đa dạng sản phẩm để lựa chọn tại các khu vực đang “hot” trên thị trường
         </p>
      </div>   
   </div>   
   <div class="row">
      <div class="col-md-6">
         <a href="#">
            <div class="banner-bg" style="background-image: url(https://canho247.vn/wp-content/uploads/2019/10/bannerdaokimcuong-1024x489.jpg) ">
               <a href="#" data-toggle="tooltip" title="DIAMOND ISLAND">
                  DIAMOND ISLAND
               </a>
            </div>
         </a>
      </div>
      <div class="col-md-3">
         <a href="#">
            <div class="banner-bg" style="background-image: url(https://canho247.vn/wp-content/uploads/2019/10/lexington-residence.jpg)">
               <a href="#" data-toggle="tooltip" title="lexington">
                  lexington
               </a>
            </div>
         </a>
      </div>
      <div class="col-md-3">
         <a href="#"  >
            <div class="banner-bg" style="background-image: url(https://canho247.vn/wp-content/uploads/2019/10/palmheights_view_toan_canh-1024x1024.jpg)">
               <a href="#" data-toggle="tooltip" title="PALM HEIGHTS">
                  PALM HEIGHTS
               </a>
            </div>
         </a>
      </div>
   </div>
   <div class="row">
      <div class="col-md-3">
         <a href="#">
            <div class="banner-bg" style="background-image: url(https://canho247.vn/wp-content/uploads/2019/10/lexington-residence.jpg)">
               <a href="#" data-toggle="tooltip" title="lexington">
                  lexington
               </a>
            </div>
         </a>
      </div>
      <div class="col-md-3">
         <a href="#"  >
            <div class="banner-bg" style="background-image: url(https://canho247.vn/wp-content/uploads/2019/10/palmheights_view_toan_canh-1024x1024.jpg)">
               <a href="#" data-toggle="tooltip" title="PALM HEIGHTS">
                  PALM HEIGHTS
               </a>
            </div>
         </a>
      </div>
      <div class="col-md-6">
         <a href="#">
            <div class="banner-bg" style="background-image: url(https://canho247.vn/wp-content/uploads/2019/10/bannerdaokimcuong-1024x489.jpg) ">
               <a href="#" data-toggle="tooltip" title="DIAMOND ISLAND">
                  DIAMOND ISLAND
               </a>
            </div>
         </a>
      </div>
      
   </div>
</section>
<main>
    <div class="top-offices py-5 bg-home">
        <div class="container">
            <h3 class="heading pb-2">Các dự án                 
            <strong class="text-green">vị trí tốt nhất</strong>
         </h3>
            <div class="row">
               <?php foreach($view_data['products'] as $item) { ?>
                    <div class="col-lg-4 col-md-6 office mb-4">
                        <div class="card stacked">
                            <div class="image-tools top right show-on-hover">
                                <div class="div_khu_vuc_small"><a title="Bất động sản <?= $item['DistrictName'] ?>" href="<?= base_url ?>/can-ho/<?= strtolower(vn_to_str($item['DistrictName'])) ?>">TP.HCM <i class="fa fa-angle-right" aria-hidden="true"></i> <?= $item['DistrictName'] ?></a></div>
                            </div>
                            <div class="card-header p-0 lift">
                                <figure class="figure mb-0">
                                    <a class="figure-img img-fluid" href="<?= base_url ?>/<?= $item['CategoryAlias'] ?>/<?= $item['Alias'] ?>.html"><img class="rounded-top" src="<?= base_url ?>/images/products/<?= $item['Image'] ?>" alt="<?= $item['Name'] ?>"></a>
                                    <figcaption class="figure-caption">
                                        <?= $item['Price'] ?>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="card-body p-1 pt-3">
                                <h5 class="card-title mb-0"><a href="<?= base_url ?>/<?= $item['CategoryAlias'] ?>/<?= $item['Alias'] ?>.html"><?= $item['Name'] ?></a></h5>
                                <p class="address text-muted small">
                                    <?= $item['Street'] ?>,
                                        <?= $item['WardName'] ?>,
                                            <?= $item['DistrictName'] ?>
                                </p>
                                <ul class="list-group list-group-minimal small">
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="fas fa-th mr-2 text-success fa-lg"></i>
                                        <?= $item['Area'] ?>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="fas fa-compass mr-2 text-success fa-lg"></i>
                                        <?= $item['DirectionName'] ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer p-1 small">

                                <a href="<?= base_url ?>/product/select/<?= $item['Id'] ?>" data-toggle="modal" data-target="#global"><i class="fa fa-check"></i> Chọn đi xem</a></a>
                            </div>
                        </div>
                    </div>
               <?php } ?>
            </div>
        </div>
    </div>

    

    <div class="latest-news py-5 bg-home">
        <div class="container">
            <h3 class="heading pb-2">Tin tức
            <strong class="text-green">mới nhất</strong>
         </h3>
            <div class="posts owl-carousel" data-margin="30" data-nav="true">
                <?php foreach($view_data['news'] as $item) { ?>
                    <div class="post">
                        <div class="card stacked">
                            <div class="card-header p-0 lift">
                                <figure class="figure mb-0">
                                    <a class="figure-img img-fluid" href="<?= base_url ?>/tin-tuc/<?= $item['Alias'] ?>.html"><img class="rounded-top" alt=""></a>
                                </figure>
                            </div>
                            <div class="card-body p-2">
                                <h5 class="card-title"><a href="<?= base_url ?>/tin-tuc/<?= $item['Alias'] ?>.html"><?= $item['Title'] ?></a></h5>
                                <div class="intro">
                                    <?= $item['Description'] ?>. </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
            </div>
        </div>
    </div>
</main>