
<!-- <section id="search" class="overlay pb-0">
    
</section> -->
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
               <h1 class="h3 heading mb-2">
                  <?= $view_data['model']['Title'] ?>
               </h1>
               <h5 style="margin-bottom:1em">
                  <?= $view_data['model']['Description'] ?>
               </h5>
               <div class="content">
                  <?= $view_data['model']['Content'] ?>
               </div>
            </section>
            <?php if(count($view_data['articleSameTag']) > 0) { ?>
            <div class="latest-video py-5">
               <h3 class="heading pb-2">Tin tức
                  <strong class="text-blue">liên quan</strong>
               </h3>
               <section class="post-listing">
                  <div class="row">
                     <div class="col-md-12">
                       <?php foreach($view_data['articleSameTag'] as $item) { ?>
                        <div class="card stacked my-4" style="margin-top:unset !important">
                           <div class="card-body p-2">
                              <div class="row post">
                                 <div class="col-md-4 col-sm-6" style="padding-bottom: 10px">
                                   <img src="<?= base_url ?>/images/news/<?= $item['Image'] ?>" class="img-responsive" />
                                 </div>
                                 <div class="col-md-8 col-sm-6">
                                    <h5><a href="<?=base_url?>/tin-tuc/<?= $item['Alias'] ?>.html">​​​​​​​<?= $item['Title'] ?></a></h5>
                                    <div class="intro mb-2"><?= $item['Description'] ?></div>
                                    <a class="action" href="<?=base_url?>/tin-tuc/<?= $item['Alias'] ?>.html">Chi tiết</a>                                
                                 </div>
                              </div>
                           </div>
                        </div>
                       <?php } ?>
                       
                     </div>
                  </div>
               </section>
            </div>
            <?php } ?>
         </div>
         <div class="col-md-3"  >
            <aside class="filters">
               
               <div class="bordered stacked mb-3 p-0">
                  <h3 class="title m-0"  style="color:#333">Tin Mới Nhất</h3>
                  <?php for($i = 0; $i < count($view_data['news']); $i++) { $item = $view_data['news'][$i]; ?>
                  <div class="col-md-12 clearfix margin-bottom-20 text-center">
                     <a href="<?= base_url ?>/tin-tuc/<?= $item['Alias'] ?>.html"><img src="<?= base_url ?>/images/news/<?= $item['Image'] ?>" alt="<?= $item['Title'] ?>" class="img-responsive" /></a>
                  </div> 
                  <div class="col-md-12 margin-bottom-20 text-left">
                     <h6><a href="<?= base_url ?>/tin-tuc/<?= $item['Alias'] ?>.html"><?= $item['Title'] ?></a></h6>
                     <div class="is-divider"></div>
                  </div>

               <?php } ?>
               </div>
               <div class="bordered stacked mb-3 p-0">
                  <h3 class="title m-0"  style="color:#333">Dự Án Mới Nhất</h3>
                  <?php for($i = 0; $i < count($view_data['products']); $i++) { $item = $view_data['products'][$i]; if($item['HOT'] == true) { continue; } ?>
                  <div class="col-md-12 clearfix margin-bottom-20 text-center">
                     <a href="<?= base_url ?>/<?= $item['CategoryAlias'] ?>/<?= $item['Alias'] ?>.html"><img src="<?= base_url ?>/images/products/<?= $item['Image'] ?>" alt="<?= $item['Title'] ?>" class="img-responsive" /></a>
                  </div> 
                  <div class="col-md-12 margin-bottom-20 text-left">
                     <h6><a href="<?= base_url ?>/<?= $item['CategoryAlias'] ?>/<?= $item['Alias'] ?>.html"><?= $item['Name'] ?></a></h6>
                     <div class="is-divider"></div>
                  </div>

               <?php } ?>
               </div>
               <div class="bordered stacked mb-3 p-0" style="overflow:hidden;padding-bottom:20px !important">
                  <h3 class="title m-0" style="color:#333">Tags</h3>
                  <span class="label-tags"><i class="fa fa-hashtag" aria-hidden="true"></i> Tags</span>
                  <?php foreach(explode(",", $view_data['model']['Tags']) as $tag) { ?>
                  <div class="label-info">
                     <a class="label-block" href="<?= base_url ?>/tin-tuc/tin-theo-tag/<?= $tag ?>" rel="tag">
                     <?= $tag ?></a>
                  </div>
                  <?php } ?>
               </div>
            </aside>
         </div>
      </div>
   </section>
</div>