<section class="hero banner-w-search">
    <div class="image image-overlay" style="background-image:url('<?=base_url?>/images/banner.jpg')"></div>
    <div class="container">
        <div class="row">
            <div class="col text-white">
                <h1 class="mb-2">Bạn Đang Muốn Tìm Kiếm Dự Án Như Thế Nào?</h1>
            </div>
        </div>
    </div>
</section>

<section id="search" class="overlay pb-0">
    
</section>

<nav aria-label="breadcrumb" class="pt-2">
    <div class="container">
        <a class="breadcrumb-back" href="/"></a>					
        <ol class="breadcrumb">
            <li class='breadcrumb-item'><a href="/">Trang chủ</a></li>
            <li class='breadcrumb-item'><a href="/can-ho">Căn hộ cho thuê</a></li>
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
                     <figure class="photo">
                        <a href="https://data.cyberreal.vn/office/win-home-nguyen-kiem/van-phong-cho-thue-win-home-nguyen-kiem-go-vap.jpg">
                        <img src="https://data.cyberreal.vn/office/win-home-nguyen-kiem/van-phong-cho-thue-win-home-nguyen-kiem-go-vap.jpg" alt="">                                            </a>
                     </figure>
                  </div>
                  <div class="slider slider-nav">
                     <div class="slide-thumbnail">
                        <img src="https://data.cyberreal.vn/office/win-home-nguyen-kiem/van-phong-cho-thue-win-home-nguyen-kiem-go-vap.jpg" alt="">										                                    
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-6 description">
               <ul class="list-group list-group-minimal">
                  <li class="list-group-item d-flex align-items-center fs-20 font-weight-bold text-danger">
                     <i class="icon-dollar bg-danger text-white icon-boxed mr-1"></i><strong class="text-nowrap">Giá thuê</strong>: <?= $view_data['model']['Price'] ?>                            
                  </li>
                  <li class="list-group-item d-flex align-items-center">
                     <i class="icon-map-marker bg-success text-white icon-boxed mr-1"></i><strong class="text-nowrap">Vị trí</strong>: Đường <?= $view_data['model']['Street'] ?>, <?= $view_data['model']['WardName'] ?>,  <?= $view_data['model']['DistrictName'] ?>
                  </li>
                  <li class="list-group-item d-flex align-items-center">
                     <i class="icon-square bg-success text-white icon-boxed mr-1"></i><strong class="text-nowrap">Diện tích</strong>: <?= $view_data['model']['Area'] ?>
                  </li>
                  <li class="list-group-item d-flex align-items-center">
                     <i class="icon-compass bg-success text-white icon-boxed mr-1"></i><strong class="text-nowrap">Hướng</strong>:  <?= $view_data['model']['DirectionName'] ?>
                  </li>
                  <li class="list-group-item d-flex align-items-center">
                     <i class="icon-star bg-success text-white icon-boxed mr-1"></i><strong class="text-nowrap">Xếp Hạng</strong>: <?= $view_data['model']['Rank'] ?>                                
                  </li>
               <!--    <li class="list-group-item d-flex align-items-center">
                     <i class="icon-toggle-on bg-primary text-white icon-boxed mr-1"></i><strong class="text-nowrap">Tình trạng</strong>: Đang cho thuê                                
                  </li> -->
               </ul>
               <hr>
               <div class="fee">
                  <h5 class="title text-uppercase font-weight-bold">Các loại phí</h5>
                  <div class="fees">
                     <ul>
                        <li>Ph&iacute; quản l&yacute;: 0 USD/m2/th&aacute;ng</li>
                        <li>Ph&iacute; xe m&aacute;y: 7 USD/th&aacute;ng</li>
                        <li>Ph&iacute; &ocirc; t&ocirc;: 45 USD/th&aacute;ng</li>
                        <li>Ph&iacute; ngo&agrave;i giờ: Miễn ph&iacute;</li>
                     </ul>
                     <ul>
                        <li>Tiền điện: 3.700 VNĐ/kwh</li>
                        <li>Tiền điện lạnh: Đ&atilde; bao gồm</li>
                        <li>Tiền đặt cọc: 3 th&aacute;ng</li>
                        <li>Thanh to&aacute;n: Th&aacute;ng/Qu&yacute;</li>
                     </ul>
                  </div>
               </div>
               <div class="controls my-3">
                  <a class="btn btn-success btn-lg d-block d-lg-inline-block" href="<?= base_url ?>/product/select/<?= $view_data['model']['Id'] ?>" data-toggle="modal" data-target="#global"><i class="fas fa-business-time"></i> Chọn đi xem</a></a>                        
               </div>
            </div>
         </div>
      </section>
      <div class="position-relative">
         <section class="detail-tabs sticky my-2">
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
            <div class="col-lg-9">
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
                     <div class="fb-comments" data-href="<?= base_url ?>/can-ho/<?= $view_data['model']['Alias'] ?>.html" data-numposts="10" data-width="100%"></div>
                  </div>
               </section>
            </div>
            <div class="col-lg-3">
               <aside id="filters">
                  <div class="bordered stacked mb-3 p-0">
                     <h3 class="title m-0">Căn hộ theo Quận</h3>
                     <div class="list-group">
                       <a class="list-group-item list-group-item-action" href="/van-phong-cho-thue/quan-1">Quận 1</a>               
                       <a class="list-group-item list-group-item-action" href="/van-phong-cho-thue/quan-2">Quận 2</a>              
                       <a class="list-group-item list-group-item-action" href="/van-phong-cho-thue/quan-3">Quận 3</a>              
                       <a class="list-group-item list-group-item-action" href="/van-phong-cho-thue/quan-4">Quận 4</a>              
                       <a class="list-group-item list-group-item-action" href="/van-phong-cho-thue/quan-5">Quận 5</a>              
                       <a class="list-group-item list-group-item-action" href="/van-phong-cho-thue/quan-6">Quận 6</a>              
                       <a class="list-group-item list-group-item-action" href="/van-phong-cho-thue/quan-7">Quận 7</a>              
                       <a class="list-group-item list-group-item-action" href="/van-phong-cho-thue/quan-8">Quận 8</a>             
                       <a class="list-group-item list-group-item-action" href="/van-phong-cho-thue/quan-9">Quận 9</a>              
                       <a class="list-group-item list-group-item-action" href="/van-phong-cho-thue/quan-10">Quận 10</a>               
                       <a class="list-group-item list-group-item-action" href="/van-phong-cho-thue/quan-11">Quận 11</a>               
                       <a class="list-group-item list-group-item-action" href="/van-phong-cho-thue/quan-12">Quận 12</a>               
                       <a class="list-group-item list-group-item-action" href="/van-phong-cho-thue/quan-binh-thanh">Quận Bình Thạnh</a>              
                       <a class="list-group-item list-group-item-action" href="/van-phong-cho-thue/quan-phu-nhuan">Quận Phú Nhuận</a>             
                       <a class="list-group-item list-group-item-action" href="/van-phong-cho-thue/quan-tan-binh">Quận Tân Bình</a>               
                       <a class="list-group-item list-group-item-action" href="/van-phong-cho-thue/quan-tan-phu">Quận Tân Phú</a>              
                       <a class="list-group-item list-group-item-action" href="/van-phong-cho-thue/quan-go-vap">Quận Gò Vấp</a>             
                       <a class="list-group-item list-group-item-action" href="/van-phong-cho-thue/quan-thu-duc">Quận Thủ Đức</a>              
                       <a class="list-group-item list-group-item-action" href="/van-phong-cho-thue/quan-binh-tan">Quận Bình Tân</a>               
                       <a class="list-group-item list-group-item-action" href="/van-phong-cho-thue/huyen-cu-chi">Huyện Củ Chi</a>              
                       <a class="list-group-item list-group-item-action" href="/van-phong-cho-thue/huyen-can-gio">Huyện Cần Giờ</a>               
                       <a class="list-group-item list-group-item-action" href="/van-phong-cho-thue/huyen-hoc-mon">Huyện Hóc Môn</a>               
                       <a class="list-group-item list-group-item-action" href="/van-phong-cho-thue/huyen-nha-be">Huyện Nhà Bè</a>              
                       <a class="list-group-item list-group-item-action" href="/van-phong-cho-thue/huyen-binh-chanh">Huyện Bình Chánh</a>    
                     </div>
                  </div>
                  <div class="bordered stacked mb-3 p-0">
                     <h3 class="title m-0">Căn hộ theo Đường</h3>
                     <div class="list-group">
                      <?php foreach($view_data['streets'] as $item) { ?>
                        <a class="list-group-item list-group-item-action" href="<?= base_url ?>/can-ho-theo-duong/<?= strtolower(vn_to_str($item['_name'])) ?>">Đường <?= $item['_name']?></a>			
                      <?php } ?>
                         
                     </div>
                  </div>
                  <div class="bordered stacked mb-3 p-0">
                     <h3 class="title m-0">Căn hộ theo Hướng</h3>
                     <div class="list-group">
                        <?php foreach($view_data['directions'] as $item) { ?>
                        <a class="list-group-item list-group-item-action" href="<?= base_url ?>/can-ho-theo-huong/<?= $item['Alias'] ?>"><?= $item['Name'] ?></a>	
                        <?php } ?>				
                     </div>
                  </div>
               </aside>
            </div>
         </div>
      </div>
   </section>
</div>