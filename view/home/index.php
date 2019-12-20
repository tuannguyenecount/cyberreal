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
    <?php foreach($view_data['advertisements'] as $item) { ?>
      <div class="col-sm-4 text-center margin-top-10" data-animate="fadeInLeft" data-animated="true">
        <div class="col-inner">
             <div class="icon-box-img" style="width: 128px">
                 <div class="icon">
                     <div class="icon-inner">
                         <img width="128" height="128" src="<?= base_url ?>/images/advertisements/<?= $item['Image'] ?>" class="attachment-medium size-medium" alt=""   > </div>
                 </div>
             </div>
             <div class="last-reset">
                 <h4><?= $item['Name'] ?></h4>
                 <p><?= $item['Description'] ?></p>
             </div>
            <!-- .icon-box -->
        </div>
      </div>
    <?php } ?>
    </div>
  </div>
  <!-- .section-content -->
</section>   
<section class="container">
   <div class="row">
      <div class="col-md-8  col-md-offset-2 text-center" style="margin:0 auto">
         <h3>Các dự án HOT <?= $_SESSION['InfoWeb']['ViTriDangHot'] ?></h3>
        <!--  <h2 class="section-title section-title-center">
          <b></b>
          <span class="section-title-main">Các dự án HOT <?= $_SESSION['InfoWeb']['ViTriDangHot'] ?></span>
          <b></b>
         </h2> -->
         <p>
            Chúng tôi sở hữu cổng thông tin bất động sản chất lượng và được thẩm định đầy đủ, cung cấp cho khách hàng đa dạng sản phẩm để lựa chọn tại các khu vực đang “hot” trên thị trường
         </p>
      </div>   
   </div>   
   <div class="row">
    <?php for($i = 0; $i < ceil(count($view_data['productsHOT'])) / 2; $i++) { ?> 
      <?php $item = $view_data['productsHOT'][$i]; if($i == 0) { ?>
      <div class="col-md-6">
         <a href="<?= base_url ?>/<?= $item['CategoryAlias'] ?>/<?= $item['Alias'] ?>.html">
            <div class="banner-bg" style="background-image: url(<?= base_url ?>/images/products/<?= $item['Image'] ?>)">
               <a href="<?= base_url ?>/<?= $item['CategoryAlias'] ?>/<?= $item['Alias'] ?>.html" data-toggle="tooltip" title="<?= $item['Name'] ?>">
                  <?= $item['Name'] ?>
               </a>
            </div>
         </a>
      </div>
      <?php } else { ?>
      <div class="col-md-3">
         <a href="<?= base_url ?>/<?= $item['CategoryAlias'] ?>/<?= $item['Alias'] ?>.html">
            <div class="banner-bg" style="background-image: url(https://canho247.vn/wp-content/uploads/2019/10/lexington-residence.jpg)">
               <a href="<?= base_url ?>/<?= $item['CategoryAlias'] ?>/<?= $item['Alias'] ?>.html" data-toggle="tooltip" title="<?= $item['Name'] ?>">
                   <?= $item['Name'] ?>
               </a>
            </div>
         </a>
      </div>
    <?php }} ?>
   </div>
   <div class="row">
    <?php for($i = ceil(count($view_data['productsHOT']) / 2); $i < count($view_data['productsHOT']); $i++) { ?> 
      <?php $item = $view_data['productsHOT'][$i]; if($i < ceil(count($view_data['productsHOT']) - 1 )) { ?>
      <div class="col-md-3">
         <a href="<?= base_url ?>/<?= $item['CategoryAlias'] ?>/<?= $item['Alias'] ?>.html">
            <div class="banner-bg" style="background-image: url(https://canho247.vn/wp-content/uploads/2019/10/lexington-residence.jpg)">
               <a href="<?= base_url ?>/<?= $item['CategoryAlias'] ?>/<?= $item['Alias'] ?>.html" data-toggle="tooltip" title="<?= $item['Name'] ?>">
                   <?= $item['Name'] ?>
               </a>
            </div>
         </a>
      </div>
    <?php } else { ?>
      <div class="col-md-6">
         <a href="<?= base_url ?>/<?= $item['CategoryAlias'] ?>/<?= $item['Alias'] ?>.html">
            <div class="banner-bg" style="background-image: url(<?= base_url ?>/images/products/<?= $item['Image'] ?>)">
               <a href="<?= base_url ?>/<?= $item['CategoryAlias'] ?>/<?= $item['Alias'] ?>.html" data-toggle="tooltip" title="<?= $item['Name'] ?>">
                  <?= $item['Name'] ?>
               </a>
            </div>
         </a>
      </div>
    <?php }} ?>
   </div>
</section>
<main>
    <div class="top-offices py-5 bg-home" style="margin-top:-70px">
        <div class="container">
          <h2 class="section-title section-title-center">
            <b></b>
            <span class="section-title-main">Các dự án vị trí tốt nhất</span>
            <b></b>
          </h2>
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
                              <p class="address text-muted">
                                Đường
                                  <?= $item['Street'] ?>,
                                      <?= $item['WardName'] ?>,
                                          <?= $item['DistrictName'] ?>
                              </p>
                              <ul class="list-group list-group-minimal">
                                  <li class="list-group-item d-flex align-items-center">
                                      <i class="fas fa-th mr-2 text-warning fa-lg"></i>
                                      <?= $item['Area'] ?>
                                  </li>
                                  <li class="list-group-item d-flex align-items-center">
                                      <i class="fas fa-compass mr-2 text-warning fa-lg"></i>
                                      <?= $item['DirectionName'] ?>
                                  </li>
                              </ul>
                          </div>
                          <div class="card-footer p-1">

                              <a href="<?= base_url ?>/product/select/<?= $item['Id'] ?>" data-toggle="modal" data-target="#global"><i class="fa fa-check"></i> Chọn đi xem</a></a>
                          </div>
                      </div>
                  </div>
             <?php } ?>
          </div>
        </div>
    </div>

    <div class="py-5 bg-home" id="chudautu" style="margin-top:-70px">
      <div class="container">
        <h2 class="section-title section-title-center">
          <b></b>
          <span class="section-title-main">Chủ Đầu Tư Nổi Bật</span>
          <b></b>
        </h2>
        <div class="row">
        <?php foreach($view_data['investors'] as $item) { ?>
          <div class="col-md-2 col-sm-3 col-xs-6 text-center">
            <p>
              <img src="<?= base_url ?>/images/investors/<?= $item['Logo'] ?>" width="150" height="150" />
            </p>
          </div>
        <?php } ?>
        </div>
      </div>
    </div>

    <div class="latest-news py-5 bg-home" style="margin-top:-70px">
      <div class="container">
        <h2 class="section-title section-title-center">
          <b></b>
          <span class="section-title-main">Tin Tức Mới Nhất</span>
          <b></b>
        </h2>
        <div class="row"  >
        <?php if(isset($view_data['firstNew'])) { ?>
          <div class="col-md-6 firstNew" >
            <div style="max-height: 300px;overflow: hidden;">
              <img src="<?= base_url ?>/images/news/<?= $view_data['firstNew']['Image'] ?>" class="img-responsive" />
            </div>
            <div class="box-text">
              <h6 style="line-height: 1.3;margin-top:.1em;margin-bottom: .1em"><a href="<?= base_url ?>/tin-tuc/<?= $view_data['firstNew']['Alias'] ?>.html"><?= $view_data['firstNew']['Title'] ?></a></h6>
              <div class="is-divider"></div>
              <p class="from_the_blog_excerpt "><?= $view_data['firstNew']['Description'] ?></p>
            </div>
            
          </div>
          <div class="col-md-6">
            <?php for($i = 1; $i < count($view_data['news']); $i++) { $item = $view_data['news'][$i]; ?>
              <div class="col-md-4 pull-left clearfix margin-bottom-20 text-center">
                <a href="<?= base_url ?>/tin-tuc/<?= $item['Alias'] ?>.html"><img src="<?= base_url ?>/images/news/<?= $item['Image'] ?>" alt="<?= $item['Title'] ?>" class="img-responsive" /></a>
              </div>
              <div class="col-md-8 pull-right margin-bottom-20 text-left">
                <h6><a href="<?= base_url ?>/tin-tuc/<?= $item['Alias'] ?>.html"><?= $item['Title'] ?></a></h6>
                <div class="is-divider"></div>
              </div>
            <?php } ?>
          </div>
        <?php } ?>
        </div>
        <div class="row">
          <div class="col-sm-12 text-center">
            <a href="<?= base_url ?>/tin-tuc.html" class="btn btn-primary">Xem Tất Cả</a>
          </div>
        </div>
      </div>
    </div>
</main>