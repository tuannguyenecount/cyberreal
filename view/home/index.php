 <div id="home-slider">
    <div class="owl-carousel" data-nav="true">
        <figure class="photo">
            <a href="/"><img src="https://data.cyberreal.vn/banner/03.jpg" alt=""></a>                
        </figure>
        <figure class="photo">
            <a href="/"><img src="https://data.cyberreal.vn/banner/02.jpg" alt=""></a>                
        </figure>
        <figure class="photo">
            <a href="/"><img src="https://data.cyberreal.vn/banner/01.jpg" alt=""></a>                
        </figure>
    </div>
</div>
<section id="search" class="overlay pb-0">
    
</section>
<?php //include 'partial/search.php'; ?>
<main>
   <div class="top-offices py-5 bg-home">
      <div class="container">
         <h3 class="heading pb-2">Văn phòng cho thuê                   
            <strong class="text-green">vị trí tốt nhất</strong>
         </h3>
         <div class="row">
         <?php foreach($view_data['products'] as $item) { ?>
            <div class="col-md-4  office mb-4">
               <div class="card stacked">
                  <div class="card-header p-0 lift">
                     <figure class="figure mb-0">
                        <a class="figure-img img-fluid" href="<?= base_url ?>/can-ho/<?= $item['Alias'] ?>.html"><img class="rounded-top" src="<?= base_url ?>/images/products/<?= $item['Image'] ?>" alt="<?= $item['Name'] ?>"></a>            
                        <figcaption class="figure-caption"><?= $item['Price'] ?></figcaption>
                     </figure>
                  </div>
                  <div class="card-body p-1 pt-3">
                     <h5 class="card-title mb-0"><a href="/van-phong-cho-thue/toa-nha-dqd-building.html">Tòa Nhà DQD Building</a></h5>
                     <p class="address text-muted small"><?= $item['StreetName'] ?>, <?= $item['WardName'] ?>, <?= $item['DistrictName'] ?></p>
                     <ul class="list-group list-group-minimal fs-14">
                        <li class="list-group-item d-flex align-items-center">
                           <i class="fas fa-box mr-2 text-success fa-lg"></i>
                           <?= $item['Area'] ?>           
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                           <i class="fas fa-compass mr-2 text-success fa-lg"></i>
                           <?= $item['DirectionName'] ?>           
                        </li>
                     </ul>
                  </div>
                  <div class="card-footer p-1">
                     
                     <a href="#" data-toggle="modal" data-target="#global"><i class="fa fa-check"></i> Chọn đi xem</a></a>    
                  </div>
               </div>
            </div>
         <?php } ?>
         </div>
      </div>
   </div>

   <div class="top-offices py-5 bg-home">
      <div class="container">
         <h3 class="heading pb-2">Văn phòng giá rẻ                    <strong class="text-green">vị trí tốt nhất</strong></h3>
         <div class="row">
         <?php foreach($view_data['products'] as $item) { ?>
            <div class="col-md-4  office mb-4">
               <div class="card stacked">
                  <div class="card-header p-0 lift">
                     <figure class="figure mb-0">
                        <a class="figure-img img-fluid" href="<?= base_url ?>/can-ho/<?= $item['Alias'] ?>.html"><img class="rounded-top" src="<?= base_url ?>/images/products/<?= $item['Image'] ?>" alt="<?= $item['Name'] ?>"></a>            
                        <figcaption class="figure-caption"><?= $item['Price'] ?></figcaption>
                     </figure>
                  </div>
                  <div class="card-body p-1 pt-3">
                     <h5 class="card-title mb-0"><a href="/van-phong-cho-thue/toa-nha-dqd-building.html">Tòa Nhà DQD Building</a></h5>
                     <p class="address text-muted small"><?= $item['StreetName'] ?>, <?= $item['WardName'] ?>, <?= $item['DistrictName'] ?></p>
                     <ul class="list-group list-group-minimal fs-14">
                        <li class="list-group-item d-flex align-items-center">
                           <i class="fas fa-box mr-2 text-success fa-lg"></i>
                           <?= $item['Area'] ?>           
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                           <i class="fas fa-compass mr-2 text-success fa-lg"></i>
                           <?= $item['DirectionName'] ?>           
                        </li>
                     </ul>
                  </div>
                  <div class="card-footer p-1">
                     
                     <a href="#" data-toggle="modal" data-target="#global"><i class="fa fa-check"></i> Chọn đi xem</a></a>    
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
         <div class="posts owl-carousel" data-margin="30" data-nav="true" data-items="[3,2,1]">
            <div class="post">
               <div class="card stacked">
                  <div class="card-header p-0 lift">
                     <figure class="figure mb-0">
                        <a class="figure-img img-fluid" href="/tin-tuc/top-van-phong-ua-thich-tren-duong-pham-ngoc-thach-tai-quan-3.html"><img class="rounded-top" alt=""></a>        
                     </figure>
                  </div>
                  <div class="card-body p-2">
                     <h5 class="card-title"><a href="/tin-tuc/top-van-phong-ua-thich-tren-duong-pham-ngoc-thach-tai-quan-3.html">Top văn phòng ưa thích trên đường Phạm Ngọc Thạch tại quận 3</a></h5>
                     <div class="intro">Phạm Ngọc Thạch là tuyến đường huyết mạch, nơi tập trung rất nhiều tòa cao ốc văn phòng lớn, hiện đại, được rất nhiều nhà quản lý lựa chọn để đặt văn phòng công ty. </div>
                  </div>
               </div>
            </div>
            <div class="post">
               <div class="card stacked">
                  <div class="card-header p-0 lift">
                     <figure class="figure mb-0">
                        <a class="figure-img img-fluid" href="/tin-tuc/mot-so-van-phong-cho-thue-nhieu-nhat-quan-tan-binh.html"><img class="rounded-top" alt=""></a>        
                     </figure>
                  </div>
                  <div class="card-body p-2">
                     <h5 class="card-title"><a href="/tin-tuc/mot-so-van-phong-cho-thue-nhieu-nhat-quan-tan-binh.html">Một số văn phòng cho thuê nhiều nhất quận Tân Bình</a></h5>
                     <div class="intro">Nhu cầu tìm kiếm và chọn thuê văn phòng tại quận Tân Bình đang tăng lên nhanh chóng.</div>
                  </div>
               </div>
            </div>
            <div class="post">
               <div class="card stacked">
                  <div class="card-header p-0 lift">
                     <figure class="figure mb-0">
                        <a class="figure-img img-fluid" href="/tin-tuc/van-phong-gia-re-dang-chu-y-cho-thue-tai-quan-3-nam-2019.html"><img class="rounded-top" alt=""></a>        
                     </figure>
                  </div>
                  <div class="card-body p-2">
                     <h5 class="card-title"><a href="/tin-tuc/van-phong-gia-re-dang-chu-y-cho-thue-tai-quan-3-nam-2019.html">Văn Phòng giá rẻ đáng chú ý cho thuê tại quận 3 năm 2019</a></h5>
                     <div class="intro">Quận 3 là một trong những khu vực quận trung tâm của TPHCM. Chính vì thế nơi đây tập trung rất nhiều tòa nhà lớn cho thuê để làm văn phòng</div>
                  </div>
               </div>
            </div>
            <div class="post">
               <div class="card stacked">
                  <div class="card-header p-0 lift">
                     <figure class="figure mb-0">
                        <a class="figure-img img-fluid" href="/tin-tuc/top-van-phong-cho-thue-dang-lua-chon-tren-truc-duong-nam-ky-khoi-nghia.html"><img class="rounded-top" alt=""></a>        
                     </figure>
                  </div>
                  <div class="card-body p-2">
                     <h5 class="card-title"><a href="/tin-tuc/top-van-phong-cho-thue-dang-lua-chon-tren-truc-duong-nam-ky-khoi-nghia.html">Top Văn Phòng cho thuê đáng lựa chọn trên trục đường Nam Kỳ Khởi Nghĩa</a></h5>
                     <div class="intro">Đường Nam Kỳ Khởi nghĩa là một trong những tuyến đường nổi tiếng tại Hồ Chí Minh.</div>
                  </div>
               </div>
            </div>
            <div class="post">
               <div class="card stacked">
                  <div class="card-header p-0 lift">
                     <figure class="figure mb-0">
                        <a class="figure-img img-fluid" href="/tin-tuc/top-van-phong-gia-re-tren-truc-duong-dien-bien-phu.html"><img class="rounded-top" alt=""></a>        
                     </figure>
                  </div>
                  <div class="card-body p-2">
                     <h5 class="card-title"><a href="/tin-tuc/top-van-phong-gia-re-tren-truc-duong-dien-bien-phu.html">Top văn phòng giá rẻ trên trục đường Điện Biên Phủ</a></h5>
                     <div class="intro"></div>
                  </div>
               </div>
            </div>
            <div class="post">
               <div class="card stacked">
                  <div class="card-header p-0 lift">
                     <figure class="figure mb-0">
                        <a class="figure-img img-fluid" href="/tin-tuc/mot-so-toa-nha-van-phong-cho-thue-tot-nhat-tren-duong-nguyen-thi-minh-khai.html"><img class="rounded-top" alt=""></a>        
                     </figure>
                  </div>
                  <div class="card-body p-2">
                     <h5 class="card-title"><a href="/tin-tuc/mot-so-toa-nha-van-phong-cho-thue-tot-nhat-tren-duong-nguyen-thi-minh-khai.html">Một Số tòa nhà văn phòng cho thuê tốt nhất trên đường Nguyễn Thị Minh Khai</a></h5>
                     <div class="intro">Trên đường Nguyễn Thị Minh Khai quận 1 có rất nhiều các tòa nhà văn phòng cho thuê tốt nhất.</div>
                  </div>
               </div>
            </div>
            <div class="post">
               <div class="card stacked">
                  <div class="card-header p-0 lift">
                     <figure class="figure mb-0">
                        <a class="figure-img img-fluid" href="/tin-tuc/top-van-phong-gia-re-duong-cong-hoa-quan-tan-binh.html"><img class="rounded-top" alt=""></a>        
                     </figure>
                  </div>
                  <div class="card-body p-2">
                     <h5 class="card-title"><a href="/tin-tuc/top-van-phong-gia-re-duong-cong-hoa-quan-tan-binh.html">Top Văn phòng giá rẻ đường Cộng Hòa Quận Tân Bình</a></h5>
                     <div class="intro">Quận Tân Bình – một trong những địa bàn phát triển tại TP. Hồ Chí Minh. Nơi đây có rất nhiều các công ty, các dịch vụ chính vì thế nhu cầu thuê văn phòng ngày một tăng mạnh.</div>
                  </div>
               </div>
            </div>
            <div class="post">
               <div class="card stacked">
                  <div class="card-header p-0 lift">
                     <figure class="figure mb-0">
                        <a class="figure-img img-fluid" href="/tin-tuc/top-toa-nha-van-phong-dang-thue-nhat-quan-phu-nhuan-nam-2018.html"><img class="rounded-top" alt=""></a>        
                     </figure>
                  </div>
                  <div class="card-body p-2">
                     <h5 class="card-title"><a href="/tin-tuc/top-toa-nha-van-phong-dang-thue-nhat-quan-phu-nhuan-nam-2018.html">Top Toà nhà Văn Phòng đáng thuê nhất quận Phú Nhuận năm 2018</a></h5>
                     <div class="intro">Tính riêng tại địa bàn quận Phú Nhuận bạn dễ dàng nhận thấy hàng chục tòa nhà văn phòng cho thuê.</div>
                  </div>
               </div>
            </div>
            <div class="post">
               <div class="card stacked">
                  <div class="card-header p-0 lift">
                     <figure class="figure mb-0">
                        <a class="figure-img img-fluid" href="/tin-tuc/top-10-toa-nha-cho-thue-gia-re-tot-quan-phu-nhuan-nam-2019.html"><img class="rounded-top" alt=""></a>        
                     </figure>
                  </div>
                  <div class="card-body p-2">
                     <h5 class="card-title"><a href="/tin-tuc/top-10-toa-nha-cho-thue-gia-re-tot-quan-phu-nhuan-nam-2019.html">Top 10 tòa nhà cho thuê giá rẻ tốt Quận Phú Nhuận năm 2019</a></h5>
                     <div class="intro">Nhu cầu thuê văn phòng làm việc tại khu vực Quận Phú Nhuận đang ngày càng gia tăng</div>
                  </div>
               </div>
            </div>
            <div class="post">
               <div class="card stacked">
                  <div class="card-header p-0 lift">
                     <figure class="figure mb-0">
                        <a class="figure-img img-fluid" href="/tin-tuc/nhung-van-phong-cho-thue-gia-re-quan-2-nam-2019.html"><img class="rounded-top" alt=""></a>        
                     </figure>
                  </div>
                  <div class="card-body p-2">
                     <h5 class="card-title"><a href="/tin-tuc/nhung-van-phong-cho-thue-gia-re-quan-2-nam-2019.html">Những Văn Phòng Cho Thuê Giá rẻ Quận 2 năm 2019</a></h5>
                     <div class="intro">Với các doanh nghiệp, công ty thì việc thuê được văn phòng phù hợp, giá rẻ là rất quan trọng.</div>
                  </div>
               </div>
            </div>
            <div class="post">
               <div class="card stacked">
                  <div class="card-header p-0 lift">
                     <figure class="figure mb-0">
                        <a class="figure-img img-fluid" href="/tin-tuc/diem-mat-mot-vai-van-phong-cho-thue-gia-re-tai-quan-10.html"><img class="rounded-top" alt=""></a>        
                     </figure>
                  </div>
                  <div class="card-body p-2">
                     <h5 class="card-title"><a href="/tin-tuc/diem-mat-mot-vai-van-phong-cho-thue-gia-re-tai-quan-10.html">Điểm mặt một vài văn phòng cho thuê giá rẻ tại Quận 10</a></h5>
                     <div class="intro">Bạn có biết Quận 10 là nơi tập trung rất nhiều ngành nghề kinh doanh và dịch vụ? Vì thế nơi đây tập trung rất nhiều tòa nhà xây dựng với mục đích cho thuê làm văn phòng</div>
                  </div>
               </div>
            </div>
            <div class="post">
               <div class="card stacked">
                  <div class="card-header p-0 lift">
                     <figure class="figure mb-0">
                        <a class="figure-img img-fluid" href="/tin-tuc/top-toa-nha-van-phong-cho-thue-gia-re-nhat-tai-quan-7.html"><img class="rounded-top" alt=""></a>        
                     </figure>
                  </div>
                  <div class="card-body p-2">
                     <h5 class="card-title"><a href="/tin-tuc/top-toa-nha-van-phong-cho-thue-gia-re-nhat-tai-quan-7.html">Top toà nhà văn phòng cho thuê giá rẻ nhất tại quận 7</a></h5>
                     <div class="intro">Quận 7 hiện là khu vực phát triển mạnh mẽ tại Thành phố Hồ Chí Minh.</div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</main>