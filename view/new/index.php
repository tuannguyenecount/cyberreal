<?php 
   $pageCurrent = isset($_GET['page']) ? (int)$_GET['page'] : 1;
?>
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
      <a class="breadcrumb-back" href="<?= base_url ?>"></a>					
      <ol class="breadcrumb">
         <li class='breadcrumb-item'><a href="<?= base_url ?>">Trang chủ</a></li>
         <li class='breadcrumb-item active'>Tin tức</li>
      </ol>
   </div>
</nav>

<div class="container my-3">
   <section class="post-listing">
      <div class="row">
         <div class="col-md-9">
         <?php foreach($view_data['model'] as $item) { ?>
            <div class="card stacked my-4">
               <div class="card-body p-2">
                  <div class="row post no-gutters">
                     <div class="col">
                        <h5 class="card-title"><a href="<?=base_url?>/tin-tuc/<?= $item['Alias'] ?>.html">​​​​​​​<?= $item['Title'] ?></a></h5>
                        <div class="intro mb-2"><?= $item['Description'] ?></div>
                        <a class="action" href="<?=base_url?>/tin-tuc/<?= $item['Alias'] ?>.html">Chi tiết</a>                                
                     </div>
                  </div>
               </div>
            </div>
         <?php } ?>
           
            <ul class="pagination">
              <!--  <?php if($pageCurrent > 1) { ?>
               <li class="page-item"><a class="page-link" href="/tin-tuc?page=6" data-page="5">&laquo;</a></li>
               <?php } ?> -->

                  <?php for($i = 1; $i <= $view_data['totalPage']; $i++) { ?>
                     <li class="page-item <?= $i == $pageCurrent ? "active" : "" ?>"><a class="page-link" href="<?= $view_data['urlCurrent'] ?>&page=<?= $i ?>"><?= $i ?></a>
                     </li>
                  <?php } ?>       
            </ul>
         </div>
         <div class="col-lg-3" id="filter-container">
               
          </div>
      </div>
   </section>
</div>