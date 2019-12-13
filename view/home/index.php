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
<main>
   <div class="top-offices py-5 bg-home">
      <div class="container container-product">
         <h3 class="heading pb-2">Căn hộ cho thuê                   
            <strong class="text-green">vị trí tốt nhất</strong>
         </h3>
         <div class="row">
         <?php foreach($view_data['products'] as $item) { ?>
            <div class="col-md-4  office mb-4">
               <div class="card stacked">
                  <div class="image-tools top right show-on-hover">
                           <div class="div_khu_vuc_small"><a title="Bất động sản <?= $item['DistrictName'] ?>" href="<?= base_url ?>/can-ho/<?= strtolower(vn_to_str($item['DistrictName'])) ?>">TP.HCM <i class="fa fa-angle-right" aria-hidden="true"></i> <?= $item['DistrictName'] ?></a></div>
                  </div>
                  <div class="card-header p-0 lift">
                     <figure class="figure mb-0">
                        <a class="figure-img img-fluid" href="<?= base_url ?>/<?= $item['CategoryAlias'] ?>/<?= $item['Alias'] ?>.html"><img class="rounded-top" src="<?= base_url ?>/images/products/<?= $item['Image'] ?>" alt="<?= $item['Name'] ?>"></a>            
                        <figcaption class="figure-caption"><?= $item['Price'] ?></figcaption>
                     </figure>
                  </div>
                  <div class="card-body p-1 pt-3">
                     <h5 class="card-title mb-0"><a href="<?= base_url ?>/<?= $item['CategoryAlias'] ?>/<?= $item['Alias'] ?>.html"><?= $item['Name'] ?></a></h5>
                     <p class="address text-muted small"><?= $item['Street'] ?>, <?= $item['WardName'] ?>, <?= $item['DistrictName'] ?></p>
                     <ul class="list-group list-group-minimal">
                        <li class="list-group-item d-flex align-items-center">
                           <i class="fas fa-th mr-2 text-success fa-lg"></i><?= $item['Area'] ?>           
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                           <i class="fas fa-compass mr-2 text-success fa-lg"></i>
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

  <!--  <div class="top-offices py-5 bg-home">
      <div class="container">
         <h3 class="heading pb-2">Căn hộ giá rẻ                    
            <strong class="text-green">vị trí tốt nhất</strong></h3>
         <div class="row">
         <?php foreach($view_data['products'] as $item) { ?>
            <div class="col-md-4  office mb-4">
               <div class="card stacked">
                  <div class="card-header p-0 lift">
                     <figure class="figure mb-0">
                        <a class="figure-img img-fluid" href="<?= base_url ?>/<?= $item['CategoryAlias'] ?>/<?= $item['Alias'] ?>.html"><img class="rounded-top" src="<?= base_url ?>/images/products/<?= $item['Image'] ?>" alt="<?= $item['Name'] ?>"></a>            
                        <figcaption class="figure-caption"><?= $item['Price'] ?></figcaption>
                     </figure>
                  </div>
                  <div class="card-body p-1 pt-3">
                     <h5 class="card-title mb-0"><a href="<?= base_url ?>/<?= $item['CategoryAlias'] ?>/<?= $item['Alias'] ?>.html"><?= $item['Name'] ?></a></h5>
                     <p class="address text-muted small"><?= $item['Street'] ?>, <?= $item['WardName'] ?>, <?= $item['DistrictName'] ?></p>
                     <ul class="list-group list-group-minimal">
                        <li class="list-group-item d-flex align-items-center">
                           <i class="fas fa-th mr-2 text-success fa-lg"></i><?= $item['Area'] ?>         
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                           <i class="fas fa-compass mr-2 text-success fa-lg"></i>
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
   </div> -->
   
   <div class="latest-news py-5 bg-home">
      <div class="container">
         <h3 class="heading pb-2">Tin tức
            <strong class="text-green">mới nhất</strong>
         </h3>
         <div class="posts owl-carousel" data-margin="30" data-nav="true" >
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
                     <div class="intro"><?= $item['Description'] ?>. </div>
                  </div>
               </div>
            </div>
         <?php } ?>
         </div>
      </div>
   </div>
</main>