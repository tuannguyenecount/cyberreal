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
         <li class='breadcrumb-item'><a href="<?= base_url ?>">Trang chủ</a></li>
         <li class='breadcrumb-item'><a href="<?= base_url ?>/tin-tuc.html">Tin tức</a></li>
         <li class='breadcrumb-item active'>​​​​​​​<?= $view_data['model']['Title'] ?></li>
      </ol>
   </div>
</nav>

<div class="container my-3">
   <section class="single-post">
      <div class="row my-4">
         <div class="col-md-9">
            <section class="bordered stacked p-3 office-detail">
               <h1 class="h3 heading mb-2"><strong>​​​​​​​<?= $view_data['model']['Title'] ?></strong></h1>
               <div class="content">
                  <?= $view_data['model']['Content'] ?>
               </div>
            </section>
            <!-- <div class="latest-video py-5">
               <h3 class="heading pb-2">Tin tức
                  <strong class="text-blue">liên quan</strong>
               </h3>
               <div class="card stacked mb-4">
                  <div class="card-body p-2">
                     <div class="row post no-gutters">
                        <div class="col">
                           <h5 class="card-title"><a href="/tin-tuc/top-van-phong-ua-thich-tren-duong-pham-ngoc-thach-tai-quan-3.html">Top văn phòng ưa thích trên đường Phạm Ngọc Thạch tại quận 3</a></h5>
                           <div class="intro mb-2">Phạm Ngọc Thạch là tuyến đường huyết mạch, nơi tập trung rất nhiều tòa cao ốc văn phòng lớn, hiện đại, được rất nhiều nhà quản lý lựa chọn để đặt văn phòng công ty. </div>
                           <a class="action" href="/tin-tuc/top-van-phong-ua-thich-tren-duong-pham-ngoc-thach-tai-quan-3.html">Chi tiết</a>                                        
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card stacked mb-4">
                  <div class="card-body p-2">
                     <div class="row post no-gutters">
                        <div class="col">
                           <h5 class="card-title"><a href="/tin-tuc/mot-so-van-phong-cho-thue-nhieu-nhat-quan-tan-binh.html">Một số văn phòng cho thuê nhiều nhất quận Tân Bình</a></h5>
                           <div class="intro mb-2">Nhu cầu tìm kiếm và chọn thuê văn phòng tại quận Tân Bình đang tăng lên nhanh chóng.</div>
                           <a class="action" href="/tin-tuc/mot-so-van-phong-cho-thue-nhieu-nhat-quan-tan-binh.html">Chi tiết</a>                                        
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card stacked mb-4">
                  <div class="card-body p-2">
                     <div class="row post no-gutters">
                        <div class="col">
                           <h5 class="card-title"><a href="/tin-tuc/van-phong-gia-re-dang-chu-y-cho-thue-tai-quan-3-nam-2019.html">Văn Phòng giá rẻ đáng chú ý cho thuê tại quận 3 năm 2019</a></h5>
                           <div class="intro mb-2">Quận 3 là một trong những khu vực quận trung tâm của TPHCM. Chính vì thế nơi đây tập trung rất nhiều tòa nhà lớn cho thuê để làm văn phòng</div>
                           <a class="action" href="/tin-tuc/van-phong-gia-re-dang-chu-y-cho-thue-tai-quan-3-nam-2019.html">Chi tiết</a>                                        
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card stacked mb-4">
                  <div class="card-body p-2">
                     <div class="row post no-gutters">
                        <div class="col">
                           <h5 class="card-title"><a href="/tin-tuc/top-van-phong-cho-thue-dang-lua-chon-tren-truc-duong-nam-ky-khoi-nghia.html">Top Văn Phòng cho thuê đáng lựa chọn trên trục đường Nam Kỳ Khởi Nghĩa</a></h5>
                           <div class="intro mb-2">Đường Nam Kỳ Khởi nghĩa là một trong những tuyến đường nổi tiếng tại Hồ Chí Minh.</div>
                           <a class="action" href="/tin-tuc/top-van-phong-cho-thue-dang-lua-chon-tren-truc-duong-nam-ky-khoi-nghia.html">Chi tiết</a>                                        
                        </div>
                     </div>
                  </div>
               </div>
            </div> -->
         </div>
         <div class="col-md-3">
             <?php include 'partial/filters.php'; ?>
         </div>
      </div>
   </section>
</div>