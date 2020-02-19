<?php 
   $pageCurrent = isset($_GET['page']) ? (int)$_GET['page'] : 1;
?>

<!-- <section id="search" class="overlay pb-0">
    
</section> -->
<nav aria-label="breadcrumb" class="pt-2">
   <div class="container">
      <a class="breadcrumb-back" href="<?= base_url ?>"></a>					
      <ol class="breadcrumb">
         <li class='breadcrumb-item'><a href="<?= base_url ?>">Trang chủ</a></li>
         <li class='breadcrumb-item active'><?= $view_data['title'] ?></li>
      </ol>
   </div>
</nav>

<div class="container my-3">
   <section class="post-listing">
      <div class="row">
         <div class="col-md-9">
           <?php foreach($view_data['model'] as $item) { ?>
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
            <ul class="pagination">
              <?php for($i = 1; $i <= $view_data['totalPage']; $i++) { ?>
                 <li class="page-item <?= $i == $pageCurrent ? "active" : "" ?>"><a class="page-link" href="<?= $view_data['urlCurrent'] ?>&page=<?= $i ?>"><?= $i ?></a>
                 </li>
              <?php } ?>       
            </ul>
         </div>
         <div class="col-md-3" id="filter-container">
               
          </div>
      </div>
   </section>
</div>