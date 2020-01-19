<!-- <section class="hero banner-w-search">
    <div class="image image-overlay" style="background-image:url('<?=base_url?>/images/banner.jpg')"></div>
    <div class="container">
        <div class="row">
            <div class="col text-white">
                <h1 class="mb-2">Bạn Đang Muốn Tìm Kiếm Dự Án Như Thế Nào?</h1>
            </div>
        </div>
    </div>
</section>
 -->
<!-- <section id="search" class="overlay pb-0">
    
</section> -->

<nav aria-label="breadcrumb" class="pt-2">
    <div class="container">
        <a class="breadcrumb-back" href="<?= base_url ?>"></a>					
        <ol class="breadcrumb">
            <li class='breadcrumb-item'><a href="<?= base_url ?>">Trang chủ</a></li>
            <li class='breadcrumb-item'><a href="<?= base_url ?>/<?= $view_data['category']['Alias'] ?>.html"><?= $view_data['category']['Name'] ?></a></li>
            <li class='breadcrumb-item active'><?= $view_data['model']['Name'] ?></li>
        </ol>                
    </div>
</nav>

<div class="container my-3">
   <section class="single-office">
      <section class="bordered stacked p-3 office-detail">
         <h1 class="h3 heading mb-2"><strong><?= $view_data['model']['Name'] ?></strong></h1>
         <div class="row">
            <div class="col-lg-6">
               <div class="gallery mb-sm-2">
                  <div class="slider slider-for">
                     <a href="<?= base_url ?>/images/products/<?= $view_data['model']['Image'] ?>">
                          <img src="<?= base_url ?>/images/products/<?= $view_data['model']['Image'] ?>" alt="" /> </a>
                    <?php foreach($view_data['imagesProduct'] as $item) { ?>
                      <figure class="photo">
                        <a href="<?= base_url ?>/images/products/slides/<?= $item['Image'] ?>">
                          <img src="<?= base_url ?>/images/products/slides/<?= $item['Image'] ?>" alt=""> </a>
                      </figure>
                    <?php } ?>
                  </div>
                  <div class="slider slider-nav">
                     <div class="slide-thumbnail">
                          <img src="<?= base_url ?>/images/products/<?= $view_data['model']['Image'] ?>" alt="">
                      </div>
                    <?php foreach($view_data['imagesProduct'] as $item) { ?>
                      <div class="slide-thumbnail">
                          <img src="<?= base_url ?>/images/products/slides/<?= $item['Image'] ?>" alt="">
                      </div>
                    <?php } ?>
                  </div>
               </div>
            </div>
            <div class="col-lg-6 description">
               <ul class="list-group list-group-minimal">
                  <li class="list-group-item d-flex align-items-center fs-20 font-weight-bold text-danger">
                     <i class="icon-dollar bg-danger text-white icon-boxed mr-1"></i><strong class="text-nowrap">Giá tổng cộng</strong>: <?= $view_data['model']['Price'] / 1000000000 >= 1 ? number_format($view_data['model']['Price'] / 1000000000)." tỷ " : number_format($view_data['model']['Price'] / 1000000 )  . " triệu"  ?>                            
                  </li>
                  <li class="list-group-item d-flex align-items-center">
                     <i class="icon-map-marker bg-success text-white icon-boxed mr-1"></i><strong class="text-nowrap">Vị trí</strong>: Đường <?= $view_data['model']['Street'] ?>, <?= $view_data['model']['WardName'] ?>,  <?= $view_data['model']['DistrictName'] ?>
                  </li>
                  <li class="list-group-item d-flex align-items-center">
                     <i class="icon-square bg-success text-white icon-boxed mr-1"></i><strong class="text-nowrap">Diện tích</strong>: <?= $view_data['model']['Area'] ?>
                  </li>
                  <li class="list-group-item d-flex align-items-center">
                     <i class="icon-windows bg-success text-white icon-boxed mr-1"></i><strong class="text-nowrap">Số phòng</strong>: <?= $view_data['model']['Room'] ?> phòng
                  </li>
                  <li class="list-group-item d-flex align-items-center">
                     <i class="icon-compass bg-success text-white icon-boxed mr-1"></i><strong class="text-nowrap">Hướng</strong>:  <?= $view_data['model']['DirectionName'] ?>
                  </li>
                  <li class="list-group-item d-flex align-items-center">
                     <i class="icon-star bg-success text-white icon-boxed mr-1"></i><strong class="text-nowrap">Xếp Hạng</strong>: <?= $view_data['model']['Rank'] ?>                                
                  </li>
                  <li class="list-group-item d-flex align-items-center">
                     <i class="icon-calendar bg-success text-white icon-boxed mr-1"></i><strong class="text-nowrap">Ngày bàn giao</strong>: <?= $view_data['model']['HandoverTime'] ?>                                
                  </li>
               <!--    <li class="list-group-item d-flex align-items-center">
                     <i class="icon-toggle-on bg-primary text-white icon-boxed mr-1"></i><strong class="text-nowrap">Tình trạng</strong>: Đang cho thuê                                
                  </li> -->
               </ul>
               <hr>
               <?php $hasFee = false; foreach($view_data['fees'] as $item) {
                      if($item['Value'] != "")
                        {
                            $hasFee = true;
                            break;
                        }
                    }
                ?>
              <?php if($hasFee == true) { ?>
                <div class="fee">
                  <h5 class="title text-uppercase font-weight-bold">Các loại phí</h5>
                  <div class="fees">
                     <ul>
                      <?php foreach($view_data['fees'] as $item) {
                        if($item['Value'] == "")
                          continue;
                      ?>
                        <li><?= $item['Name'] ?>: <?= $item['Value'] ?></li>
                      <?php } ?>
                     </ul>
                  </div>
                </div>
              <?php } ?>
               <div class="controls my-3">
                  <a class="btn btn-primary btn-lg d-block d-lg-inline-block" href="<?= base_url ?>/product/select/<?= $view_data['model']['Id'] ?>" data-toggle="modal" data-target="#global"><i class="fas fa-business-time"></i> Chọn đi xem</a></a>                        
               </div>
            </div>
         </div>
      </section>
      <div class="position-relative">
         <section class="detail-tabs my-2">
            <ul class="nav nav-pills d-flex" id="pills-tab" role="tablist">
               <li class="nav-item">
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Thông tin chung</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="pills-vi_tri-tab" data-toggle="pill" href="#pills-vi_tri" role="tab" aria-controls="pills-vi_tri" aria-selected="false">Vị trí</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="pills-ket_cau-tab" data-toggle="pill" href="#pills-ket_cau" role="tab" aria-controls="pills-ket_cau" aria-selected="false">Kết cấu</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="pills-phi_dich_vu-tab" data-toggle="pill" href="#pills-phi_dich_vu" role="tab" aria-controls="pills-phi_dich_vu" aria-selected="false">Phí dịch vụ</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="pills-uu_diem-tab" data-toggle="pill" href="#pills-uu_diem" role="tab" aria-controls="pills-uu_diem" aria-selected="false">Ưu điểm</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" data-toggle="pill" href="#reviews">Đánh giá</a>
               </li>
            </ul>
         </section>
         <div class="row mb-4">
            <div class="col-md-8">
               <section class="bordered stacked p-3 office-detail">
                  <div class="tab-content" id="pills-tabContent">
                     <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <?= $view_data['model']['GeneralInformation'] ?>
                     </div>
                     <div class="tab-pane fade" id="pills-vi_tri" role="tabpanel" aria-labelledby="pills-home-tab">
                        <?= $view_data['model']['Location'] ?>
                     </div>
                     <div class="tab-pane fade" id="pills-ket_cau" role="tabpanel" aria-labelledby="pills-home-tab">
                        <?= $view_data['model']['Structure'] ?>
                     </div>
                     <div class="tab-pane fade" id="pills-phi_dich_vu" role="tabpanel" aria-labelledby="pills-home-tab">
                        <?= $view_data['model']['ServiceCharge'] ?>
                     </div>
                     <div class="tab-pane fade" id="pills-uu_diem" role="tabpanel" aria-labelledby="pills-home-tab">
                        <?= $view_data['model']['Advantages'] ?>
                     </div>
                  </div>
               </section>
               <section class="bordered stacked p-3 mb-4 my-4 office-reviews overflow-hidden" id="reviews">
                  <i class="icon-star-half-o icon-background text-blue"></i>
                  <h4 class="title text-uppercase">Khách hàng đánh giá</h4>
                  <div class="comments">
                    <div id="fb-root"></div>
                      <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0&appId=1444659255736273&autoLogAppEvents=1"></script>
                     <div class="fb-comments" data-href="<?= base_url ?>/<?= $view_data['model']['CategoryAlias'] ?>/<?= $view_data['model']['Alias'] ?>.html" data-numposts="10" data-width="100%"></div>
                  </div>
               </section>
            </div>
           <!--  <div class="col-lg-3" id="filter-container">
               
            </div> -->
            <div class="col-md-4" id="formHoTroContainer">
              <div  id="formhotro">
                <div class="well" >
                  <h5><?= $_SESSION['InfoWeb']['Representative'] ?></h5>
                  <p><?= $_SESSION['InfoWeb']['Department'] ?></p>
                </div>
                <div>
                  <p>Chúng tôi luôn sẵn sàng giải đáp cho bạn vì chúng tôi hoạt động 24/7.</p>
                </div>
                <p class="margin-top-10">
                  <a class="buttonLienHe steelblue expand"><i class="icon-phone"></i>  <span><?= $_SESSION['InfoWeb']['Phone'] ?></span></a>
                  <p class="text-center">Hoặc</p>
                  <p>
                    <a href="<?= base_url ?>/home/dangkyxemnhamau/<?= $view_data['model']['Id'] ?>" data-toggle="modal" data-target="#global" class="btn btn-blue expand border-radius-none">Đăng ký xem nhà mẫu</a>
                  </p>
                  <p>
                    <a href="<?= base_url ?>/home/dangkynhanbanggia/<?= $view_data['model']['Id'] ?>" data-toggle="modal" data-target="#global" class="btn btn-blue expand border-radius-none">Đăng ký nhận bảng giá</a>
                  </p>
                  <p>
                    <a href="<?= base_url ?>/home/hoithemthongtin/<?= $view_data['model']['Id'] ?>" data-toggle="modal" data-target="#global" class="btn btn-blue expand border-radius-none">Hỏi thêm thông tin</a>
                  </p>
                  
                </p>
              </div>  
              <div>&nbsp;</div>        
              <!-- <div id="filter-container"></div>     -->
            </div>
         </div>
      </div>
   </section>
</div>
<div class="container my-3">
  <section class="office-listing">
        <div class="row">
            <div class="col-md-12">
              <h2 class="section-title section-title-center">
                <b></b>
                <span class="section-title-main">CÁC CĂN HỘ CÙNG QUẬN</span>
                <b></b>
              </h2>
                <div class="row" >
                <?php foreach($view_data['relatedProducts'] as $item) { ?>
                    <div class="col-md-4 col-sm-6 office mb-4 project-box" >
                        <div class="card stacked">
                            <div class="image-tools top right show-on-hover ">
                                <div class="div_khu_vuc_small"><a title="Bất động sản <?= $item['DistrictName'] ?>" href="<?= base_url ?>/can-ho/<?= strtolower(vn_to_str($item['DistrictName'])) ?>"> <?= $item['DistrictName'] ?></a>
                                </div>
                            </div>
                            <div class="card-header p-0 lift img-project-box">
                                <figure class="figure mb-0">
                                    <a class="figure-img img-fluid" href="<?= base_url ?>/<?= $item['CategoryAlias'] ?>/<?= $item['Alias'] ?>.html">
                                    <img class="rounded-top" src="<?= base_url ?>/images/products/<?= $item['Image'] ?>" alt="" /></a>            
                                  
                                    <a href="<?= base_url ?>/<?= $item['CategoryAlias'] ?>/<?= $item['Alias'] ?>.html" class="storylink">
                                        <div class="hover-div">
                                          <div>
                                            <h2><?= $item['Name'] ?></h2>
                                              <div class="contnt">
                                                  <ul>
                                                    <li>Đường
                                            <?= $item['Street'] ?>,
                                                <?= $item['WardName'] ?>,
                                                    <?= $item['DistrictName'] ?></li>
                                                    <li>Chủ đầu tư Khang Điền</li>
                                                    <li>Giá từ <?= $item['Price'] / 1000000000 >= 1 ? number_format($item['Price'] / 1000000000)." tỷ " : number_format($item['Price'] / 1000000 )  . " triệu"  ?>/căn</li>
                                                    <li>Ngày bàn giao: <?= $item['HandoverTime'] ?></li>
                                                  </ul>                             
                                              </div>
                                              <span class="readmore-story">XEM THÊM <img src="https://nhatpham.net/wp-content/plugins/skycodec-elementor/assets/images/b-arrow.png" alt=""></span>
                                          </div>
                                        </div>
                                  </a>  
                                </figure>
                            </div>
                            <div class="card-body p-1 pt-3">
                                <h5 class="card-title mb-0"><a href="<?= base_url ?>/<?= $item['CategoryAlias'] ?>/<?= $item['Alias'] ?>.html"><?= $item['Name'] ?></a></h5>
                                <p>
                                    <i class="fa fa-map-marker"></i>
                                Đường
                                  <?= $item['Street'] ?>,
                                      <?= $item['WardName'] ?>,
                                          <?= $item['DistrictName'] ?>
                                <br/>
                                    <b>Giá: <?= $item['PriceOn1m2'] ?> / m<sup>2</sup></b>
                                </p>

                            </div>
                            <div class="card-footer p-1">
                                
                                <a href="<?= base_url ?>/product/select/<?= $item['Id'] ?>" data-toggle="modal" data-target="#global"><i class="fa fa-check"></i> Chọn đi xem</a></a>  
                            </div>
                        </div>                            
                    </div>
                <?php } ?>
                </div>
            </div>

            <!-- <div class="col-md-3" id="filter-container">
                
            </div> -->
        </div>
  </section>
</div>

